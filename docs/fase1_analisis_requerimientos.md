# Fase 1 — Análisis y requerimientos

## 1. Problemática

La información comercial de PcSaurios (catálogo, precios, condiciones de compra y estatus de envíos internacionales) solía estar dispersa en publicaciones de redes sociales y mensajes directos. Esto complicaba que los clientes consultaran el inventario disponible y comprendieran la logística de importación.

---

## 2. Necesidad y objetivo

* **Necesidad:** Proporcionar un canal centralizado, confiable y accesible para consultar productos, entender el proceso de importación y solicitar artículos sin fricciones.
* **Objetivo:** Diseñar y desarrollar una plataforma web comercial Front-End moderna, responsiva y accesible para PcSaurios, utilizando recursos visuales auténticos y garantizando total veracidad comercial.

---

## 3. Usuarios

1. **Coleccionistas y fans (Visitantes / Clientes potenciales):** Buscan photocards, polaroids, figuras o artículos específicos; necesitan filtrar con rapidez, conocer precios claros o saber si un precio está por confirmar, y entender el proceso de envío.
2. **Responsables de PcSaurios:** Requieren una plataforma ordenada donde referenciar su catálogo a sus seguidores, reduciendo consultas repetitivas de precios y reglas de paquetería.

---

## 4. Requisitos funcionales

* **RF01 — Catálogo de productos:** Mostrar los productos disponibles identificados en la masterlist, indicando categoría, nombre, integrante/variante, precio confirmado o leyenda exacta "Precio por confirmar", y disponibilidad.
* **RF02 — Búsqueda en tiempo real:** Permitir la localización de artículos mediante un buscador que filtre por nombre, tipo o integrante/variante con JavaScript.
* **RF03 — Filtrado por categoría:** Botones de filtrado interactivo (Todos, Photocards, Polaroids, Álbumes, Figuras, Otros) con actualización dinámica del contador de resultados.
* **RF04 — Solicitud de producto:** Mecanismo Front-End accesible (modal informativo) que guíe al usuario sobre cómo solicitar el producto seleccionado sin simular transacciones de pago inexistentes.
* **RF05 — Galería visual clasificada:** Despliegue de fotografías reales (`img/galeria/`) con filtros temáticos (Productos, Pedidos, Empaquetado) y vista previa ampliada (lightbox).
* **RF06 — Módulo informativo EMS / Aduana:** Explicar con claridad los cargos independientes (EMS, aduana, nacional), el diagrama del proceso de 5 etapas, el glosario de estados oficiales y el plazo límite de resguardo de 30 días.
* **RF07 — Sección Promociones:** Espacio neutral que informe sobre futuras dinámicas comerciales sin inventar promociones falsas.
* **RF08 — Estructura de Contacto:** Presentar las pautas de solicitud de compra y dejar preparada la estructura para incorporar los canales oficiales verificados.
* **RF09 — Navegación One Page:** Barra de navegación fija con enlaces ancla `#inicio`, `#nosotros`, `#productos`, `#galeria`, `#promociones`, `#ems-aduana` y `#contacto`.

---

## 5. Requisitos no funcionales

* **RNF01 — Diseño responsivo:** Adaptación completa a dispositivos móviles (1 columna), tabletas (2 columnas) y computadoras de escritorio (3-4 columnas).
* **RNF02 — Identidad visual y contraste:** Aplicación estricta del color corporativo `#4B0082`, fondos limpios y contrastes legibles que cumplan pautas de accesibilidad.
* **RNF03 — Accesibilidad web:** Uso de HTML5 semántico (`<header>`, `<nav>`, `<main>`, `<section>`, `<footer>`), estructura jerárquica de encabezados (`h1` a `h3`), atributos `alt` descriptivos en imágenes y foco visible en controles interactivos (`:focus-visible`).
* **RNF04 — Privacidad de datos:** Protección total de la información de clientes; ninguna hoja de control interno o dato personal de compradores debe exponerse.
* **RNF05 — Veracidad comercial:** Prohibición absoluta de inventar precios, inventar promociones o asignar fotografías de productos específicos sin certeza absoluta.
* **RNF06 — Rendimiento:** Carga optimizada de imágenes WebP y ejecución de scripts nativos sin dependencias innecesarias.
