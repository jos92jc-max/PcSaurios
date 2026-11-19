# AGENTS.md — PcSaurios

- El alcance vigente combina dos piezas: la portada pública estática (`index.html`, `css/styles.css`, `js/main.js`, `img/`) y un panel Laravel en `resources/views/`. Los documentos históricos pueden conservar redacciones antiguas; prevalece este archivo y `README.md`.
- La portada real es `index.html`; Laravel sirve `/` con `resources/views/welcome.blade.php`. Si cambias contenido comercial, cambia primero `index.html` y luego los seeders de `categorias`/`productos`.
- No migres la portada a Blade ni el panel a SPA. No instales Breeze, Jetstream ni Fortify: la autenticación es propia con `Auth::attempt`, `Hash::make` y `FormRequest`.
- No elimines las rutas `login`, `logout` ni `home`: `app/Http/Middleware/Authenticate.php` y `app/Providers/RouteServiceProvider.php` dependen de sus nombres/rutas.
- Base de datos MySQL/XAMPP configurada en `.env` (`DB_DATABASE=pcsaurios`). La tabla `users` ya existía: no la recrees. Usa migraciones `create_*` para `rol`, `rol_usuario`, `empresa`, `categorias`, `productos`, `pedidos` y seeders idempotentes con `firstOrCreate`.
- Nombres exactos requeridos: `rol`, `rol_usuario`, `empresa` (singular). No crear `roles` ni `role_user`.
- Roles: `Administrador`, `Editor`, `Cliente`. Administrador gestiona todo incluida `empresa`; Editor gestiona catálogo y pedidos; Cliente no entra al panel. Mantén el middleware `role` y los Gates de `AuthServiceProvider`.
- Datos confirmados: color `#4B0082`, logo `img/identidad/logo-pcsaurios.webp`, 14 productos, categorías `photocard|polaroid|figura|album|otros` y estados EMS de `index.html`. No inventes correos, teléfonos, direcciones, promociones ni datos de clientes; deja `empresa` vacía donde no hay información confirmada.
- No expongas nombres/usuarios/saldos/multas de hojas internas. Las fotos de `img/productos/` tienen nombres neutrales: no las asocies a productos sin confirmación.
- `css/styles.css` e `img/` están fuera de `public/`. El panel usa `public/css/admin.css` con `asset()`; la portada usa rutas relativas. Para compartir estilos, sincroniza ambos archivos o expón los recursos a `public/`.
- HTML/CSS/JS usan 2 espacios aunque `.editorconfig` indique 4; el código PHP Laravel usa 4. Respeta el estilo del archivo.
- Verificación: `vendor/bin/pint` → `php artisan migrate` → `php artisan db:seed` → `php artisan test` → revisar login, roles, CRUD y responsive en navegador. No ejecutes `migrate:fresh` sin confirmación: `.env` apunta a la BD de desarrollo.
- `phpunit.xml` usa SQLite `:memory:`; los tests usan `RefreshDatabase`. Si agregas migraciones con funciones específicas de MySQL, revísalas también en SQLite.
