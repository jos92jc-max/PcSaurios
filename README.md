# PcSaurios — Plataforma Web Comercial

Bienvenido al repositorio del proyecto web de **PcSaurios**, una plataforma orientada a centralizar y exhibir el catálogo de photocards, sleeves, polaroids, postales, figuras coleccionables y artículos personalizados.

---

## 1. Descripción del proyecto

**PcSaurios** es un emprendimiento enfocado en la comunidad de coleccionistas y fans (principalmente de K-pop y artículos afines). Este sitio web comercial surge para resolver la dispersión de información que comúnmente ocurre en redes sociales y mensajería directa, proporcionando a los visitantes un espacio ordenado, accesible y transparente para explorar productos disponibles, verificar especificaciones y conocer los procedimientos de envíos internacionales y solicitudes.

> [!NOTE]
> **Alcance de esta entrega:** La portada pública es el sitio estático de `index.html`. El panel administrativo Laravel incluye autenticación propia, roles, CRUD de productos/categorías/pedidos y edición de datos generales. Las pasarelas automáticas de pago siguen siendo evolución futura.

---

## 2. Tecnologías utilizadas

* **HTML5:** Estructura semántica (`<header>`, `<nav>`, `<main>`, `<section>`, `<footer>`), jerarquía clara de encabezados y atributos de accesibilidad ARIA.
* **CSS3:** Hoja de estilos personalizada (`css/styles.css`) basada en variables CSS (`:root`), diseño responsivo fluido y soporte para navegación accesible por teclado (`:focus-visible`).
* **Bootstrap 5.3.3:** Sistema de rejilla responsiva (Grid), componentes interactivos colapsables y modales.
* **JavaScript (Vanilla JS):** Lógica nativa (`js/main.js`) para búsqueda en tiempo real, filtrado por categorías, modales y lightbox de galería.
* **WebP / PNG:** Recursos gráficos reales optimizados para web alojados en `img/`.

---

## 3. Identidad visual

* **Color principal corporativo:** `#4B0082` (Índigo / Púrpura profundo, RGB: 75, 0, 130), seleccionado en la revisión oficial con el cliente.
* **Colores de soporte:** Fondos limpios en blanco (`#FFFFFF`) y gris muy claro (`#F8FAFC`), texto en tonos oscuros de alto contraste (`#0F172A` / `#475569`) y acentos en lavanda suave (`#F3E8FF`).
* **Tipografía:** Familia **Inter** de Google Fonts para garantizar máxima legibilidad y jerarquía equilibrada.

---

## 4. Estructura de carpetas

```text
PcSaurios/
├── index.html                           # Estructura principal de la aplicación (One Page)
├── css/
│   └── styles.css                       # Estilos personalizados, variables y responsividad
├── js/
│   └── main.js                          # Lógica Front-End interactiva (buscador, filtros, modales)
├── img/
│   ├── identidad/
│   │   └── logo-pcsaurios.webp          # Logotipo oficial de PcSaurios
│   ├── galeria/
│   │   └── galeria-01..17 (16 WebP + 1 PNG) # Fotografías reales de colecciones, pedidos y empaquetado
│   └── productos/
│       └── 34 archivos de nombres neutrales # Recursos fotográficos sin asociación confirmada
├── docs/
│   ├── datos_proyecto.md                # Datos consolidados y confirmados del proyecto
│   ├── fase1_analisis_requerimientos.md # Requerimientos funcionales y no funcionales
│   ├── fase2_organizacion_arquitectura.md # Arquitectura del sitio y mapa de navegación
│   ├── fase3_experiencia_usuario_ux.md  # User Journey, UX y principios de interacción
│   ├── fase4_diseno_interfaz_ui_usabilidad.md # Sistema de diseño, paleta y componentes
│   └── fase5_desarrollo_implementacion.md # Registro técnico y verificación de implementación
├── agente.md                            # Guía y lineamientos de trabajo del agente
└── README.md                            # Documentación general del repositorio
```

---

## 5. Funcionalidades implementadas

1. **Barra de navegación responsiva (Navbar):**
   * Logotipo oficial con enlace a inicio.
   * Menú colapsable con 7 enlaces internos ancla (`#inicio`, `#nosotros`, `#productos`, `#galeria`, `#promociones`, `#ems-aduana`, `#contacto`).
   * Cierre automático en móviles al pulsar un enlace.
   * Detección dinámica de sección activa durante el desplazamiento (scroll).

2. **Sección Inicio / Hero:**
   * Mensaje de apertura claro y descriptivo.
   * Llamadas a la acción ("Ver productos" y "Conocer más").
   * Tarjeta con fotografía auténtica destacada.

3. **Sección Nosotros:**
   * Presentación del proyecto PcSaurios y su compromiso con el coleccionismo.
   * Tarjetas de valor (Catálogo Variado, Cuidado Seguro, Claridad Total).
   * Fotografía real de empaquetado.

4. **Sección Productos (Catálogo interactivo):**
   * Buscador de texto en tiempo real (busca por nombre, categoría o integrante/variante con normalización de acentos).
   * Filtros dinámicos por categorías (Todos, Photocards, Polaroids, Figuras, Álbumes, Otros).
   * Contador en tiempo real de artículos encontrados.
   * Mensaje de ayuda y botón para restablecer filtros cuando no hay coincidencias.
   * 14 productos iniciales (10 con precio confirmado y 4 con "Precio por confirmar").
   * Solución visual neutral y honesta para artículos cuya foto específica está en proceso de validación.
   * Modal informativo accesible de "Solicitud de Producto" con resumen de datos y pautas de compra.

5. **Sección Galería:**
   * Cuadrícula con 17 fotografías reales (16 WebP y 1 PNG).
   * Filtros rápidos por etiquetas: Todos, Productos, Pedidos, Empaquetado.
   * Visor Lightbox accesible para ampliar la fotografía con su pie informativo.

6. **Sección Promociones:**
   * Espacio neutral que notifica que no existen promociones activas actualmente y comparte buenas prácticas para solicitudes seguras.

7. **Sección EMS / ADUANA:**
   * Explicación de cargos independientes (EMS, aduana y nacional).
   * Diagrama secuencial en 5 fases (En Japón ➔ EMS ➔ En México ➔ Aduana ➔ Entrega).
   * Glosario de 5 estados oficiales de pedidos (`EN JPN`, `PAGAR EMS / ADUANA`, `EMS PAGADO / VIENE A MX`, `YA EN TERRITORIO MX`, `EN PROCESO DE ENTREGA`).
   * Políticas sobre variabilidad de costos y periodo máximo de resguardo de 30 días.

8. **Sección Contacto:**
   * Instrucciones en 3 pasos para coordinar solicitudes.
   * Preparación visual de canales oficiales sin números telefónicos ni redes sociales inventadas.
   * Formulario Front-End de consulta de muestra claramente rotulado.

9. **Pie de página (Footer):**
   * Logotipo oficial, resumen informativo, enlaces directos y créditos.

---

## 6. Instrucciones para visualizar el proyecto

Para visualizar y probar la página web en cualquier equipo:

1. Clona o descarga la carpeta completa del proyecto `PcSaurios`.
2. Abre el archivo `index.html` en cualquier navegador web moderno (Google Chrome, Mozilla Firefox, Microsoft Edge, Safari o Brave) haciendo doble clic sobre él.
3. También puedes utilizar un servidor local de desarrollo si lo prefieres (por ejemplo, la extensión **Live Server** de Visual Studio Code o ejecutando `python -m http.server 8000` en la terminal).
4. Para probar la visualización en dispositivos móviles o tabletas, puedes redimensionar la ventana del navegador o presionar `F12` para abrir las Herramientas de Desarrollador e ingresar al modo de emulación de dispositivos responsivos.

---

## 7. Panel administrativo Laravel

El panel usa autenticación propia, roles y MySQL/XAMPP (`DB_DATABASE=pcsaurios`).

```bash
php artisan migrate
php artisan db:seed
php artisan pcsaurios:sync-landing
php artisan serve
```

La portada estática se sirve en `/portada`; si se abre `index.html` con doble clic, funciona con su catálogo hardcodeado. En Laravel, `js/main.js` consume la API pública `GET /api/catalogo`.

Usuarios de prueba del seeder: `admin@pcsaurios.test`, `editor@pcsaurios.test` y `cliente@pcsaurios.test`. La contraseña se toma de `SEED_PASSWORD` (en local, `password` si la variable no existe). Cambia ese valor en `.env` antes de sembrar en un entorno compartido.

Verificación: `vendor/bin/pint` y `php artisan test`.

---

## 8. Manual técnico breve de los principales componentes

### 8.1 Arquitectura general

PcSaurios se organiza en dos piezas independientes pero complementarias:

* **Portada pública estática:** `index.html`, `css/styles.css`, `js/main.js` y `img/`. Usa rutas relativas, Bootstrap 5.3.3 por CDN y JavaScript nativo. No está dentro de `public/`, por lo que se abre directamente en el navegador o mediante un servidor estático.
* **Panel administrativo Laravel:** Blade, MySQL/XAMPP, autenticación propia y roles. Laravel sirve `/` con `resources/views/welcome.blade.php`, que es una vista por defecto y no sustituye a la portada comercial.

El panel usa CSS propio en `public/css/admin.css`, cargado con `asset()` desde los layouts. No se usa Breeze, Jetstream, Fortify ni una SPA.

La portada también se publica en `public/` mediante `php artisan pcsaurios:sync-landing` y se sirve en `/portada`. En ese modo, `js/main.js` consume `GET /api/catalogo`; si la apertura es `file://`, mantiene el catálogo hardcodeado como fallback.

### 8.2 Mapa de componentes

| Componente | Archivos principales | Responsabilidad |
|---|---|---|
| Portada pública | `index.html`, `css/styles.css`, `js/main.js`, `img/` | Catálogo interactivo, galería, procesos EMS y contacto informativo. |
| Enrutamiento | `routes/web.php`, `app/Providers/RouteServiceProvider.php` | Rutas públicas, autenticación, panel `/admin` y redirección `home`. |
| Autenticación | `app/Http/Controllers/AuthController.php`, `app/Http/Requests/LoginRequest.php` | Login, logout, validación y regeneración de sesión. |
| Roles | `RoleMiddleware.php`, `AuthServiceProvider.php`, `User.php`, `Rol.php` | Permisos por rol y gates de autorización. |
| Modelo de datos | `app/Models/*.php`, `database/migrations/2026_*.php` | Tablas, relaciones, casts y reglas de integridad. |
| Datos base | `database/seeders/*.php` | Roles, empresa, catálogo y usuarios de prueba de forma idempotente. |
| Panel admin | `app/Http/Controllers/Admin/*.php` | CRUD de categorías, productos y pedidos; edición de empresa. |
| Interfaz del panel | `resources/views/layouts/`, `resources/views/admin/`, `public/css/admin.css` | Layout común, dashboard, formularios, tablas y diseño responsivo. |
| Operación de contraseñas | `app/Console/Commands/UpdateSeededPasswords.php` | Actualiza los hashes de los usuarios sembrados desde `SEED_PASSWORD`. |
| API pública | `routes/api.php`, `app/Http/Controllers/Api/CatalogoController.php` | Expone categorías, productos y estados EMS en `GET /api/catalogo`. |
| Publicación de portada | `app/Console/Commands/SyncLandingAssets.php`, `routes/web.php` | Sincroniza la portada a `public/` y la sirve en `/portada`. |
| Pruebas | `tests/Feature/*.php`, `phpunit.xml` | Auth, roles, CRUD, API, portada e integridad de la BD de prueba en SQLite. |

### 8.3 Rutas y control de acceso

Todas las rutas del panel pasan por el grupo `web`, más `auth` y `role:Administrador,Editor`:

| Ámbito | Rutas nombradas | Acceso |
|---|---|---|
| Público | `/` | Vista Laravel por defecto; la portada comercial es `index.html`. |
| Portada | `portada` | `GET /portada` sirve la portada estática publicada. |
| API | `/api/catalogo` | `GET` público de solo lectura con catálogo y estados EMS. |
| Autenticación | `login`, `login.store`, `logout`, `home` | `logout` y `home` requieren sesión; `logout` vuelve a `portada` y `home` redirige a `admin.dashboard`. |
| Panel | `admin.dashboard` | `Administrador` o `Editor`. |
| Catálogo | `admin.categorias.*`, `admin.productos.*` | CRUD; no existe ruta `show`. |
| Pedidos | `admin.pedidos.*` | CRUD; no existe ruta `show`. |
| Empresa | `admin.empresa.edit`, `admin.empresa.update` | Solo `Administrador`. |

`RoleMiddleware` acepta varios roles separados por coma o pipe y devuelve `403` cuando el usuario autenticado no cumple. `Cliente` queda fuera del panel por diseño.

### 8.4 Autenticación y roles

`AuthController::login()` usa `Auth::attempt()` con `email` y `password`, aplica `remember` cuando viene en la petición, regenera el ID de sesión y redirige a `admin.dashboard`. `LoginRequest` valida ambos campos y muestra mensajes en español. `AuthController::logout()` cierra la sesión, invalida la sesión, regenera el token CSRF y devuelve a `/portada`.

`User::roles()` resuelve la relación muchos a muchos con `rol_usuario`; `User::hasRole()` acepta un string o un array. Los gates de `AuthServiceProvider` son `administrar-empresa`, `gestionar-catalogo` y `gestionar-pedidos`.

| Rol | Panel | Catálogo | Pedidos | Empresa |
|---|---|---|---|---|
| `Administrador` | Sí | Sí | Sí | Sí |
| `Editor` | Sí | Sí | Sí | No |
| `Cliente` | No | No | No | No |

### 8.5 Modelo de datos

| Tabla | Campos y reglas principales | Relaciones / detalle |
|---|---|---|
| `users` | `name`, `email` único, `password`, `email_verified_at` | Relación `roles()` mediante `rol_usuario`. |
| `rol` | `nombre` único, `descripcion` | `usuarios()` muchos a muchos. |
| `rol_usuario` | `user_id`, `rol_id`, unique `(user_id, rol_id)` | Claves foráneas con `cascadeOnDelete()`. |
| `empresa` | `nombre`, `descripcion`, `correo`, `telefono`, `direccion`, `logo` | Un solo registro editable; solo datos confirmados. |
| `categorias` | `nombre` único, `slug` único, `descripcion` | `productos()` uno a muchos. |
| `productos` | `categoria_id`, `nombre`, `integrante`, `precio decimal(10,2)`, `precio_etiqueta`, `disponible`, `imagen` | `precio_mostrado` usa la etiqueta si existe; si no, formatea `precio`. |
| `pedidos` | `codigo` único, `user_id`, `producto_id`, `cliente_nombre`, `cliente_email`, `cantidad`, `estado`, `total`, `notas` | Índice en `estado`; `user_id` nullable y `producto_id` con cascada. |

Los estados EMS confirmados son `EN JPN`, `PAGAR EMS / ADUANA`, `EMS PAGADO / VIENE A MX`, `YA EN TERRITORIO MX` y `EN PROCESO DE ENTREGA`.

### 8.6 Datos sembrados

`DatabaseSeeder` ejecuta cuatro seeders idempotentes con `firstOrCreate()` y `syncWithoutDetaching()`:

* `RolSeeder`: `Administrador`, `Editor` y `Cliente`.
* `EmpresaSeeder`: nombre `PcSaurios`, descripción institucional y logo `img/identidad/logo-pcsaurios.webp`; no inventa correo, teléfono ni dirección.
* `CatalogoSeeder`: categorías `photocard`, `polaroid`, `figura`, `album`, `otros` y 14 productos; 10 tienen precio confirmado y 4 muestran `Precio por confirmar`.
* `UsuarioSeeder`: `admin@pcsaurios.test`, `editor@pcsaurios.test` y `cliente@pcsaurios.test`, con la contraseña tomada de `SEED_PASSWORD`.

Las fotos de `img/productos/` tienen nombres neutrales; solo están confirmadas y vinculadas `RAKIDORO JK.webp` → `RAKIDORO JK`, `GIGI POLAROID1.jpeg` → `Gigi Polaroid 1`, `GIGI CAMISA NEGRA 5.jpeg` → `Gigi camisa negra 5` y `VINYL POLAROID ARIRANG VINYL 01.jpeg` → `ARIRANG POLAROID VINYLO1`. El resto sigue sin asociarse.

### 8.7 Operación y verificación

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan pcsaurios:sync-landing
php artisan serve
php artisan pcsaurios:update-passwords
vendor/bin/pint
php artisan test
```

Acceso: `/login`. Para cambiar la contraseña de los usuarios sembrados, edita `SEED_PASSWORD` en `.env` y ejecuta `php artisan pcsaurios:update-passwords`. El comando rechaza valores vacíos, `password` y `change-me`, valida una longitud mínima de 8 caracteres e imprime cuántos usuarios se actualizaron.

No ejecutar `migrate:fresh` sin confirmación: `.env` apunta a la base de datos de desarrollo `pcsaurios`.

### 8.8 Puntos de atención

* `css/`, `js/` e `img/` están fuera de `public/`; la portada usa rutas relativas y el panel usa `asset()`.
* Existen dos hojas de estilo separadas: `css/styles.css` para la portada y `public/css/admin.css` para el panel.
* `resources/views/welcome.blade.php` no es la portada comercial; si cambia el contenido público, modificar primero `index.html` y luego los seeders.
* Algunos documentos históricos conservan redacciones antiguas; prevalecen este README y `AGENTS.md`.
* Las pasarelas automáticas de pago, el cálculo automático de envíos y el seguimiento de guías siguen fuera de alcance.
* No documentar contraseñas reales ni datos personales no confirmados.
* La portada servida por Laravel depende de `public/`; ejecuta `pcsaurios:sync-landing` después de cambiar `index.html`, CSS, JS o imágenes.

> El prompt para generar este manual en DOCX/PDF está en `docs/prompt_manual_tecnico.md`.

