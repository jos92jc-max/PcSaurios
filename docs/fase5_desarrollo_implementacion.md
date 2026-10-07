# Fase 5 — Desarrollo e implementación

**Estado:** Completada y verificada (Front-End comercial funcional).

Este documento registra de manera formal, transparente y comprobable el desarrollo técnico, la estructura de código, los recursos reales utilizados, las decisiones del cliente integradas y los resultados de las pruebas realizadas en la plataforma web de **PcSaurios**.

---

## 1. Tecnologías utilizadas

* **HTML5:**
  * Marcado semántico estructurado: `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`.
  * Accesibilidad web: atributos ARIA (`aria-label`, `aria-controls`, `aria-expanded`, `aria-labelledby`, `aria-live`, `role="region"`).
  * Metadatos completos (charset UTF-8, viewport responsive, meta-description comercial).
* **CSS3 (`css/styles.css`):**
  * Variables de diseño (`:root`) con la paleta oficial solicitada por el cliente (`--pcs-primary: #4B0082`).
  * Desplazamiento suave (`scroll-behavior: smooth`) y compensación del Navbar (`scroll-padding-top: 76px`).
  * Accesibilidad en foco para teclado (`:focus-visible` con contorno de 2 px en `#4B0082`).
  * Diseño responsivo por breakpoints y transiciones estandarizadas sin saturación visual.
* **Bootstrap 5.3.3 (CDN):**
  * Sistema de rejilla fluida (Grid System) con clases responsivas (`col-12`, `col-md-6`, `col-lg-3`, `row-cols-*`).
  * Componentes interactivos: Navbar colapsable y Modales (solicitud de producto y lightbox de galería).
* **JavaScript Nativo (`js/main.js`):**
  * Lógica Vanilla JS estructurada sobre el evento `DOMContentLoaded`.
  * Buscador de productos en tiempo real con normalización de caracteres diacríticos (sin acentos).
  * Filtrado dinámico por categorías con recuento reactivo de resultados.
  * Control del Navbar (cierre automático en móviles y scrollspy dinámico).
  * Control de modales y visor Lightbox para galería.
* **Tipografía:** Familia **Inter** de Google Fonts para títulos y lectura corrida.

---

## 2. Estructura del código

La arquitectura física y lógica del proyecto mantiene una separación estricta entre estructura, presentación y comportamiento:

```text
PcSaurios/
├── index.html                           # Estructura HTML5 One Page con 8 secciones principales
├── css/
│   └── styles.css                       # Variables CSS (:root), layout, componentes y media queries
├── js/
│   └── main.js                          # Lógica Front-End modular (búsqueda, filtros, eventos)
├── img/
│   ├── identidad/
│   │   └── logo-pcsaurios.png           # Logotipo oficial de alta resolución
│   ├── galeria/
│   │   └── galeria-01.webp a 12.webp    # 12 fotografías reales para la sección Galería
│   └── productos/
│       └── producto-01.webp a 35.webp   # 35 fotografías reales neutrales
├── docs/
│   ├── datos_proyecto.md                # Datos comerciales consolidados
│   ├── fase1_analisis_requerimientos.md # Requerimientos funcionales y no funcionales
│   ├── fase2_organizacion_arquitectura.md # Arquitectura del sitio y mapa de navegación
│   ├── fase3_experiencia_usuario_ux.md  # User Journey y experiencia de usuario
│   ├── fase4_diseno_interfaz_ui_usabilidad.md # Guía de estilos, color y componentes
│   └── fase5_desarrollo_implementacion.md # Este documento
├── agente.md                            # Guía de directrices del agente
└── README.md                            # Guía general de uso y despliegue local
```

---

## 3. Funcionalidades implementadas

1. **Barra de navegación principal (`header > nav.navbar`):**
   * Integración del logotipo oficial de PcSaurios.
   * 7 enlaces ancla funcionales: `#inicio`, `#nosotros`, `#productos`, `#galeria`, `#promociones`, `#ems-aduana` y `#contacto`.
   * Menú hamburguesa colapsable para dispositivos móviles con cierre automático al seleccionar un enlace.
   * Detección activa de sección visible al desplazarse (`scrollspy`).

2. **Sección Inicio (`#inicio`):**
   * Encabezado principal (H1) y propuesta de valor clara y neutral (sin eslóganes inventados).
   * Botones de acción directa: "Ver productos" y "Conocer más".
   * Recurso gráfico destacado utilizando fotografía auténtica (`galeria-01.webp`).

3. **Sección Nosotros (`#nosotros`):**
   * Presentación del proyecto PcSaurios y tipos de coleccionables que comercializa.
   * 3 tarjetas destacadas: "Catálogo Variado", "Cuidado Seguro" y "Claridad Total".
   * Fotografía real de empaquetado (`galeria-02.webp`) con pie explicativo.

4. **Sección Productos (`#productos`):**
   * Buscador de texto en tiempo real (`#productSearchInput`): filtra simultáneamente por nombre de artículo, integrante/variante y categoría.
   * Filtros por categoría: Todos, Photocards, Polaroids, Figuras, Álbumes y Otros.
   * Contador reactivo de productos visibles (`#catalogCountText`).
   * Panel de alerta y botón de restauración cuando no hay coincidencias de búsqueda.
   * Despliegue de los 14 productos del catálogo inicial:
     * 10 con precio confirmado ($35 a $185 MXN).
     * 4 con la leyenda exacta "Precio por confirmar".
   * Tarjetas con presentación visual neutral y aviso explícito de fotografía en confirmación para respetar la integridad del catálogo.
   * Botón interactivo "Solicitar producto" que abre el modal informativo correspondiente.

5. **Modal de Solicitud de Producto (`#productRequestModal`):**
   * Carga dinámica de los datos del producto seleccionado (nombre, categoría y precio).
   * Instrucciones claras para continuar la compra mediante los canales de contacto, evitando simular un carrito de compras con cobro automático.

6. **Sección Galería (`#galeria`):**
   * Cuadrícula con las 12 fotografías reales en formato WebP (`galeria-01.webp` a `galeria-12.webp`).
   * Filtros por etiquetas: Todas, Productos, Pedidos y Empaquetado.
   * Visor Lightbox accesible (`#galleryLightboxModal`) con soporte para teclado (Enter / Espacio).
   * Nota aclaratoria de que las fotos corresponden a entregas con fines ilustrativos.

7. **Sección Promociones (`#promociones`):**
   * Presentación honesta indicando que actualmente no hay promociones activas y que se anunciarán en canales oficiales.
   * Tarjeta con recomendaciones para realizar solicitudes seguras.

8. **Sección EMS / ADUANA (`#ems-aduana`):**
   * Bloque de condiciones clave: cobro por separado (EMS, aduana y nacional), no existencia de tarifa fija universal y variación de tiempos.
   * Diagrama secuencial en 5 pasos del envío internacional (1. En Japón, 2. EMS, 3. En México, 4. Aduana, 5. Entrega).
   * Glosario interactivo de los 5 estados oficiales: `EN JPN`, `PAGAR EMS / ADUANA`, `EMS PAGADO / VIENE A MX`, `YA EN TERRITORIO MX` y `EN PROCESO DE ENTREGA`.
   * Notificación clara del plazo de resguardo de 30 días naturales.

9. **Sección Contacto (`#contacto`):**
   * Guía en 3 pasos para solicitar artículos de manera asistida.
   * Aviso transparente de canales oficiales en preparación, sin teléfonos ni correos inventados.
   * Formulario de consulta de muestra (Front-End) debidamente rotulado.

10. **Pie de página (`footer`):**
    * Logotipo oficial, enlaces rápidos, aviso de alcance Front-End y derechos reservados 2026.

---

## 4. Recursos visuales utilizados

* **Logotipo oficial:** `img/identidad/logo-pcsaurios.png`.
* **Fotografías de galería:**
  * `img/galeria/galeria-01.webp` (Hero y Galería - Productos)
  * `img/galeria/galeria-02.webp` (Nosotros y Galería - Empaquetado)
  * `img/galeria/galeria-03.webp` a `galeria-12.webp` (Galería - Pedidos, Productos y Empaquetado)
* **Fotografías de productos (`img/productos/`):**
  * Se conservaron intactas las 35 imágenes en `img/productos/`.
  * Siguiendo la regla de no asumir asociaciones arbitrarias entre archivos neutrales (`producto-01.webp` a `producto-35.webp`) e ítems del catálogo, las tarjetas exhiben iconos vectoriales de categoría y la leyenda "Fotografía en confirmación".

---

## 5. Cambios solicitados por el cliente

1. **Adopción de paleta oficial:** Sustitución de cualquier color previo por el color corporativo oficial **`#4B0082`** (RGB: 75, 0, 130).
2. **Incorporación de la sección "EMS / ADUANA":** Diseño e integración de una sección dedicada con proceso logístico, glosario de estados y política de resguardo de 30 días.
3. **Catálogo base inicial:** Integración de los 10 productos con precio confirmado y 4 productos con "Precio por confirmar".
4. **Política de privacidad estricta:** Omisión total de datos privados de clientes presentes en hojas internas (nombres, usuarios, saldos, multas).
5. **Alineación de recursos reales:** Integración del logotipo oficial y las fotografías reales WebP optimizadas.

---

## 6. Pruebas realizadas

Se realizaron las siguientes validaciones técnicas:

* [x] **Comprobación de recursos gráficos:** Verificación automática de existencia de las 13 rutas de imágenes vinculadas (todas retornaron `True`).
* [x] **Comprobación de enlaces ancla:** Verificación de las 7 anclas (`#inicio`, `#nosotros`, `#productos`, `#galeria`, `#promociones`, `#ems-aduana`, `#contacto`) contra los identificadores correspondientes en el DOM (todas retornaron `TargetExists = True`).
* [x] **Comprobación sintáctica y de marcado:** Inspección exhaustiva de cierre de etiquetas HTML5, validez de selectores CSS y ausencia de errores de sintaxis en `js/main.js`.
* [x] **Pruebas de búsqueda y filtrado:**
  * Búsqueda por nombre (ej. "RAKIDORO", "BT21", "Fake Love").
  * Búsqueda por integrante (ej. "Namjoon", "Yoongi", "Jin", "JK", "Jimin").
  * Búsqueda con y sin acentos ("Álbum", "album").
  * Filtrado por botones de categoría (Photocards, Polaroids, Figuras, Álbumes, Otros).
  * Funcionamiento del contador reactivo y botón de restablecimiento.
* [x] **Pruebas de modales:**
  * Apertura del modal de solicitud con inyección correcta de nombre, precio y categoría del producto pulsado.
  * Apertura del visor Lightbox en galería con imagen y pie descriptivo correspondiente.
* [x] **Pruebas de responsividad:**
  * Rejilla adaptativa en pantallas de 320px (1 columna), 768px (2 columnas) y ≥ 1200px (3-4 columnas).
  * Menú hamburguesa colapsable y cierre automático en móviles.
* [x] **Pruebas de accesibilidad:**
  * Contraste de color superior a 4.5:1 con fondo blanco.
  * Navegación por teclado con contorno visible `:focus-visible`.
  * Acceso por teclado al lightbox de galería mediante tecla Enter / Espacio.
  * Atributos `alt` descriptivos en todas las imágenes informativas.

---

## 7. Resultados de las pruebas

* **Navegación:** 100% funcional y fluida entre todas las secciones.
* **Catálogo:** Búsqueda instantánea y precisa sin retrasos ni fallos en mayúsculas/minúsculas/acentos.
* **Galería:** Filtros y visor modal responsivos sin desbordamientos de pantalla.
* **Integridad comercial:** Cero datos privados expuestos, cero precios inventados, cero promociones falsas y recursos provisionales claramente rotulados.

---

## 8. Funcionalidades pendientes o futuras (Fase posterior)

* Conexión con un Back-End (PHP / Node.js) y base de datos relacional (MySQL).
* Carrito de compras persistente con cálculo automático de envíos.
* Integración de pasarela de pago segura (Stripe / PayPal / Mercado Pago).
* Panel administrativo para alta, baja y modificación de productos en tiempo real.
* Sistema de autenticación de clientes y seguimiento dinámico de guías de rastreo.
