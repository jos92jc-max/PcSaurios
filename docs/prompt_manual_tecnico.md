# Prompt para generar el manual técnico en DOCX/PDF

```text
Actúa como redactor técnico y diseñador documental. Genera un documento profesional en español, listo para exportar a DOCX editable y PDF final, titulado:

"Manual técnico breve de los principales componentes — PcSaurios"

Extensión objetivo: 2 a 3 páginas. Tono técnico, claro y ejecutivo. No uses emojis.

Contexto:
PcSaurios tiene dos piezas bien diferenciadas. La portada pública es estática: index.html, css/styles.css, js/main.js e img/ usan rutas relativas y viven fuera de public/. Laravel sirve "/" con resources/views/welcome.blade.php, que es la vista por defecto y NO la portada comercial; la portada se publica en public/ con pcsaurios:sync-landing y se sirve en /portada. En modo Laravel consume la API pública GET /api/catalogo; si se abre con doble clic, mantiene el catálogo hardcodeado como fallback. El panel administrativo usa Blade, autenticación propia, MySQL/XAMPP, roles y CRUD de catálogo/pedidos. No se usa Breeze, Jetstream, Fortify ni SPA.

Estructura obligatoria:
1. Portada del documento: título, subtítulo "Documentación técnica interna", fecha y nombre del proyecto.
2. Resumen ejecutivo: 1 párrafo.
3. Arquitectura general: portada estática vs panel Laravel.
4. Tabla "Componente | Archivo(s) principal(es) | Responsabilidad".
5. Rutas y control de acceso: tabla con portada, login, logout, home, admin.dashboard, /api/catalogo y los recursos admin.categorias.*, admin.productos.*, admin.pedidos.*, admin.empresa.*. Indica middleware auth, role:Administrador,Editor y role:Administrador, y que la API es pública de solo lectura.
6. Autenticación y roles: AuthController, LoginRequest, RoleMiddleware, User::roles(), User::hasRole(), Gates de AuthServiceProvider. Incluye matriz: Administrador, Editor, Cliente.
7. Modelo de datos: tablas rol, rol_usuario, empresa, categorias, productos, pedidos y users. Menciona claves foráneas, unicidad y estados EMS.
8. Datos sembrados: 3 roles, 5 categorías, 14 productos, 1 registro de empresa, 3 usuarios. Aclara que 4 productos tienen "Precio por confirmar", que solo 4 fotos de img/productos/ están vinculadas por confirmación (RAKIDORO JK.webp, GIGI POLAROID1.jpeg, GIGI CAMISA NEGRA 5.jpeg y VINYL POLAROID ARIRANG VINYL 01.jpeg) y que el resto permanece sin asociar.
9. Operación: comandos php artisan migrate, db:seed, pcsaurios:sync-landing, serve, pcsaurios:update-passwords, vendor/bin/pint y php artisan test. Indica que NO debe ejecutarse migrate:fresh sin confirmación.
10. Puntos de atención: archivos fuera de public/, sincronización a public/, estilos separados (css/styles.css y public/css/admin.css), documentos históricos obsoletos, pasarelas de pago fuera de alcance.

Contenido técnico exacto que debes respetar:
- Rutas: GET /portada (portada), GET /api/catalogo (API pública), GET /login (login), POST /login (login.store), POST /logout (logout), GET /home (home), GET /admin (admin.dashboard).
- Logout: POST /logout cierra la sesión y redirige a /portada; tanto /portada como / muestran el enlace "Acceso administrativo" a /login.
- Recursos: categorias, productos y pedidos son Route::resource excepto show; empresa solo edit/update.
- Roles: Administrador = todo incluida empresa; Editor = catálogo y pedidos; Cliente = sin panel.
- Estados EMS: EN JPN, PAGAR EMS / ADUANA, EMS PAGADO / VIENE A MX, YA EN TERRITORIO MX, EN PROCESO DE ENTREGA.
- Color corporativo: #4B0082.
- Logo confirmado: img/identidad/logo-pcsaurios.webp.
- Identidad visual: 17 fotos de galería (16 WebP + 1 PNG) y 34 archivos de nombres neutrales en img/productos/.
- Tests: AuthTest, RoleAccessTest, CatalogoCrudTest, CatalogoApiTest y PortadaTest; PHPUnit usa SQLite :memory: y fija SEED_PASSWORD=password solo para tests.
- Comandos: app/Console/Commands/UpdateSeededPasswords.php, firma pcsaurios:update-passwords, lee SEED_PASSWORD, rechaza valores débiles y actualiza los 3 usuarios sembrados; app/Console/Commands/SyncLandingAssets.php, firma pcsaurios:sync-landing, publica index.html, css/styles.css, js/main.js e img/ en public/ sin tocar public/css/admin.css.

Reglas de redacción:
- No inventes correos, teléfonos, direcciones, promociones ni datos de clientes.
- No incluyas contraseñas reales ni valores secretos de .env.
- Usa el color #4B0082 en títulos, tablas y elementos de acento.
- Incluye tablas y una matriz de roles.
- Si algún dato no está confirmado, indícalo explícitamente como "pendiente de confirmación".
- No recomiendes Breeze, Jetstream, Fortify, SPA ni migrar la portada a Blade.
- Entrega un documento listo para imprimir, con encabezados y pies de página sobrios.

Entregable final:
- Versión DOCX editable.
- Versión PDF para distribución.
```
