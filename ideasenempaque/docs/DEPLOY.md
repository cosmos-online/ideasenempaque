# Instrucciones de Deploy — Ideas Empaque e Impresión
> Paso a paso para hacer deploy. Cualquier dev del equipo debe poder seguir esto.

## Requisitos previos
- Acceso SSH o terminal cPanel
- Acceso a phpMyAdmin o terminal MySQL en cPanel
- Credenciales de GitHub (para el clone inicial)

---

## PRIMERA VEZ — Setup completo del servidor

### 1. Configurar Deploy Key en GitHub

Esto permite que el servidor haga `git pull` sin contraseña.

```bash
# En la terminal de cPanel, generar llave SSH
ssh-keygen -t ed25519 -C "deploy@ideasenempaque.com.mx"
# Dejar el passphrase vacío (Enter x2)
# La llave pública queda en: ~/.ssh/id_ed25519.pub

# Copiar el contenido de la llave pública
cat ~/.ssh/id_ed25519.pub
```

Luego en GitHub:
1. Ir a `https://github.com/cosmos-online/ideasenempaque`
2. Settings → Deploy keys → Add deploy key
3. Pegar el contenido de `id_ed25519.pub`
4. Marcar solo lectura (Allow write access: NO)
5. Guardar

Verificar desde el servidor:
```bash
ssh -T git@github.com
# Debe responder: "Hi cosmos-online/ideasenempaque! You've successfully authenticated..."
```

### 2. Clonar el repositorio

```bash
# Desde la terminal de cPanel, en el home del usuario
cd ~

# Hacer backup del public_html actual si existe
mv public_html public_html_backup_$(date +%Y%m%d)

# Clonar el repo como public_html
git clone git@github.com:cosmos-online/ideasenempaque.git public_html

# Crear la carpeta de credenciales fuera del web root
mkdir -p ~/ideasenempaque
```

### 3. Crear el .env en el servidor

```bash
cd ~/ideasenempaque
cp ~/public_html/ideasenempaque/.env.example .env
nano .env
# Llenar TODOS los valores reales de producción
```

Variables críticas a llenar:
- `DB_NAME`, `DB_USER`, `DB_PASS` → obtener de cPanel → MySQL Databases
- `MAIL_PASS` → contraseña del correo formulario@ideasenempaque.com.mx
- `APP_SECRET_KEY` → generar con: `php -r "echo bin2hex(random_bytes(32));"`
- `RECAPTCHA_SITE_KEY` y `RECAPTCHA_SECRET_KEY` → generar en Google reCAPTCHA Console

### 4. Crear la base de datos en cPanel

1. cPanel → MySQL Databases
2. Crear base de datos (anotar el nombre exacto)
3. Crear usuario MySQL (anotar usuario y contraseña)
4. Asignar todos los privilegios al usuario sobre la BD

Correr el schema inicial:
```bash
mysql -u [db_user] -p [db_name] < ~/public_html/database/schema.sql
```

O desde phpMyAdmin: Seleccionar la BD → Importar → `database/schema.sql`

### 5. Verificar permisos

```bash
chmod 755 ~/public_html
chmod 644 ~/public_html/.htaccess
chmod -R 755 ~/public_html/assets/
chmod -R 777 ~/public_html/assets/uploads/
chmod 750 ~/public_html/admin/
```

### 6. Verificar el sitio

Abrir `https://ideasenempaque.com.mx` en el navegador.
Abrir `https://ideasenempaque.com.mx/admin/login.php` y hacer login con el usuario seed.

---

## DEPLOY REGULAR (actualizaciones)

```bash
# 1. Traer cambios del repo
cd ~/public_html
git pull origin main

# 2. Correr migraciones pendientes (Claude indica cuáles en el commit)
mysql -u [db_user] -p [db_name] < ~/public_html/database/migrations/NNN_descripcion.sql

# 3. Verificar el sitio en vivo
```

---

## Variables de entorno — referencia rápida

Ver `~/public_html/ideasenempaque/.env.example` para la lista completa.
Pedir valores reales al project manager de Cosmos Online.

---

## Troubleshooting común

| Error | Causa probable | Solución |
|-------|---------------|----------|
| Pantalla blanca | `APP_DEBUG=false` oculta errores | Revisar `error_log` en cPanel |
| "Error de conexión" | .env mal configurado | Verificar `DB_*` en `.env` |
| Assets no cargan | `APP_URL` mal configurado | Verificar URL sin barra final |
| 403 en /admin/ | Permisos de carpeta | `chmod 755 ~/public_html/admin/` |
| Deploy key no funciona | SSH no configurado | Repetir paso 1 de Setup |
