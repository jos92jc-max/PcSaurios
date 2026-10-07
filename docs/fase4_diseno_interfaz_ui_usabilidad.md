# Fase 4 — Diseño de interfaz (UI) y usabilidad

## 1. Concepto visual y dirección de diseño

El diseño visual de PcSaurios proyecta una estética **limpia, minimalista, moderna, juvenil y ordenada**, diseñada para que el protagonismo recaiga en las fotografías auténticas de los productos y colecciones.

---

## 2. Paleta cromática oficial

> **Decisión del cliente:** En la revisión visual del proyecto, el cliente solicitó expresamente utilizar como color corporativo principal el tono índigo/púrpura profundo **`#4B0082`** (RGB: 75, 0, 130), sustituyendo cualquier color principal previo.

| Variable CSS | Valor HEX | Uso principal |
| :--- | :--- | :--- |
| `--pcs-primary` | `#4B0082` | Color principal corporativo (Navbar, botones primarios, acentos) |
| `--pcs-primary-dark` | `#380062` | Estado hover y foco en botones y enlaces activos |
| `--pcs-primary-light` | `#F3E8FF` | Fondos de badges, etiquetas suaves y elementos seleccionados |
| `--pcs-primary-subtle` | `#FAF5FF` | Fondos destacados ultraligeros |
| `--pcs-bg` | `#FFFFFF` | Fondo predominante de la aplicación |
| `--pcs-bg-alt` | `#F8FAFC` | Fondo alterno para contraste de secciones secundarias |
| `--pcs-text` | `#0F172A` | Texto principal de alto contraste y legibilidad óptima |
| `--pcs-text-muted` | `#475569` | Texto secundario, subtítulos y descripciones |
| `--pcs-border` | `#E2E8F0` | Bordes sutiles de tarjetas y contenedores |

---

## 3. Tipografía

Familia tipográfica principal: **Inter**, complementada con pilas de fuentes del sistema (`system-ui, -apple-system, sans-serif`).

* **Hero / H1:** Peso 700 (2.25rem - 3rem).
* **Títulos de sección (H2):** Peso 600–700 (1.75rem - 2.25rem).
* **Subtítulos y nombres de producto (H3 / H4):** Peso 600 (1.1rem - 1.25rem).
* **Menú de navegación y botones:** Peso 500–600 (0.9rem - 1rem).
* **Texto de lectura general:** Peso 400 (0.95rem - 1rem, interlineado 1.6).
* **Texto secundario y metadatos:** Peso 400 (0.85rem).

---

## 4. Componentes principales

### A. Botones
* **Botón principal (`.btn-pcsaurios-primary`):** Fondo sólido `#4B0082`, texto blanco, bordes redondeados con radio de 8 px, transición sutil. Elevación mínima al hover (`translateY(-1px)`) sin sombras exageradas ni efectos 3D.
* **Botón secundario (`.btn-pcsaurios-outline`):** Fondo blanco o transparente, borde sólido `#4B0082` de 1px, texto `#4B0082`. Al hover, fondo suave `#F3E8FF`.
* **Botones de filtro (`.btn-pcsaurios-filter`):** Botones tipo píldora/radio con borde suave; cuando están activos adquieren fondo `#4B0082` y texto blanco.

### B. Tarjetas de producto (`.product-card`)
* Fondo blanco, bordes sutiles `#E2E8F0`, radio de 12 px y sombra casi imperceptible.
* Cabecera visual neutral elegante con badge de categoría y rotulación explícita de "Fotografía específica en confirmación", respetando la regla estricta de no vincular erróneamente fotos de la carpeta `img/productos/` sin confirmación oficial.
* Cuerpo de tarjeta con tipografía clara: nombre destacado, variante/integrante, precio o etiqueta "Precio por confirmar", disponibilidad en verde sutil y botón de solicitud.

### C. Sección EMS / Aduana
* Diagrama del proceso logístico de 5 fases (En Japón ➔ EMS ➔ En México ➔ Aduana ➔ Entrega) con diseño secuencial claro.
* Tarjetas para los 5 estados oficiales con sus respectivas descripciones.

### D. Galería fotográfica
* Cuadrícula fluida con imágenes WebP reales provenientes de `img/galeria/`.
* Etiquetas de categoría (Productos, Pedidos, Empaquetado) y visor modal con fondo oscuro translúcido.

---

## 5. Pautas de usabilidad y accesibilidad

* **Contraste:** Relación de contraste superior a 4.5:1 para texto normal con fondo blanco.
* **Foco visible:** Contorno visible de 2 px en color `#4B0082` con desplazamiento para elementos navegables por teclado (`:focus-visible`).
* **Marcado accesible:** Atributos ARIA en modales, acordeones, controles colapsables y botones de filtro (`aria-pressed`, `aria-expanded`).
