# PcSaurios — Plataforma Web Comercial (Front-End)

Bienvenido al repositorio del proyecto web de **PcSaurios**, una plataforma orientada a centralizar y exhibir el catálogo de photocards, sleeves, polaroids, postales, figuras coleccionables y artículos personalizados.

---

## 1. Descripción del proyecto

**PcSaurios** es un emprendimiento enfocado en la comunidad de coleccionistas y fans (principalmente de K-pop y artículos afines). Este sitio web comercial surge para resolver la dispersión de información que comúnmente ocurre en redes sociales y mensajería directa, proporcionando a los visitantes un espacio ordenado, accesible y transparente para explorar productos disponibles, verificar especificaciones y conocer los procedimientos de envíos internacionales y solicitudes.

> [!NOTE]
> **Alcance de esta entrega:** La implementación actual corresponde al **Front-End**. Las funciones avanzadas de servidor como bases de datos relacionales (MySQL), autenticación de usuarios, panel administrativo interno y pasarelas automáticas de pago corresponden a una posible evolución futura.

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
│   │   └── logo-pcsaurios.png           # Logotipo oficial de PcSaurios
│   ├── galeria/
│   │   └── galeria-01.webp a 12.webp    # Fotografías reales de colecciones, pedidos y empaquetado
│   └── productos/
│       └── producto-01.webp a 35.webp   # Recursos fotográficos clasificados
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
   * Cuadrícula con 12 fotografías reales en formato WebP.
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

