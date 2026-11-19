# Fase 2 — Organización y arquitectura

## 1. Enfoque arquitectónico

El sitio web de PcSaurios se concibe como una aplicación **One Page** estructurada en un único `index.html`. Este modelo permite una navegación fluida, centralizada y directa a través de enlaces ancla internos, ideal para que los visitantes conozcan el catálogo y las políticas comerciales de manera inmediata sin recargas de página.

---

## 2. Mapa de secciones y anclas

1. **Header / Navbar:** Barra superior persistente con el logotipo oficial y menú de navegación responsivo.
2. **Inicio (`#inicio`):** Presentación del proyecto PcSaurios, propuesta de valor y llamadas a la acción principales.
3. **Nosotros (`#nosotros`):** Contexto del emprendimiento, dedicación al coleccionismo, tipos de artículos y fotografía representativa.
4. **Productos (`#productos`):** Módulo central interactivo con buscador de texto, filtros de categorías, contador dinámico y tarjetas del catálogo inicial.
5. **Galería (`#galeria`):** Exhibición en cuadrícula con fotografías reales optimizadas de `img/galeria/`, segmentadas en Productos, Pedidos y Empaquetado, con modal de ampliación.
6. **Promociones (`#promociones`):** Espacio informativo neutral sobre anuncios y dinámicas futuras.
7. **EMS / Aduana (`#ems-aduana`):** Sección especializada solicitada por el cliente sobre logística de envíos internacionales, proceso de 5 pasos, glosario de estados y plazo de resguardo de 30 días.
8. **Contacto (`#contacto`):** Guía de pasos para iniciar una solicitud y preparación visual de los canales de comunicación.
9. **Footer:** Cierre semántico con enlaces rápidos, créditos y avisos informativos.

---

## 3. Navegación y componentes

* **Navbar en escritorio:** Disposición horizontal con enlaces espaciados, logo de marca visible y estados visuales `:hover` y `.active`.
* **Navbar en móviles/tabletas (`< lg`):** Menú colapsable tipo hamburguesa (`navbar-toggler`) con cierre automático al seleccionar cualquier sección implementado mediante JavaScript.
* **Scroll fluido:** Configuración CSS de `scroll-behavior: smooth` y compensación de altura del navbar con `scroll-padding-top`.

---

## 4. Estructura física de archivos

```text
PcSaurios/
├── index.html
├── css/
│   └── styles.css
├── js/
│   └── main.js
├── img/
│   ├── identidad/
│   │   └── logo-pcsaurios.webp
│   ├── galeria/
│   │   ├── galeria-01.webp ... galeria-17.webp
│   └── productos/
│       └── producto-*.webp
├── docs/
│   ├── datos_proyecto.md
│   ├── fase1_analisis_requerimientos.md
│   ├── fase2_organizacion_arquitectura.md
│   ├── fase3_experiencia_usuario_ux.md
│   ├── fase4_diseno_interfaz_ui_usabilidad.md
│   └── fase5_desarrollo_implementacion.md
├── agente.md
└── README.md
```
