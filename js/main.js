/**
 * PcSaurios — Lógica Front-End Principal
 * Tecnologías: JavaScript nativo (Vanilla JS) y Bootstrap 5.3 API.
 * Funcionalidades:
 * 1. Control de navegación responsiva (cierre automático y enlace activo).
 * 2. Catálogo: Buscador interactivo en tiempo real con normalización de acentos.
 * 3. Catálogo: Filtrado por categorías con contador dinámico.
 * 4. Catálogo: Modal accesible para solicitud de producto.
 * 5. Galería: Filtrado por categorías (Productos, Pedidos, Empaquetado).
 * 6. Galería: Visor Lightbox para ampliación de fotografías reales.
 */

document.addEventListener('DOMContentLoaded', () => {

  // ==========================================================================
  // 1. Navegación: Cierre automático y enlace activo
  // ==========================================================================
  const navbarCollapse = document.getElementById('navbarPcSaurios');
  const navLinks = document.querySelectorAll('.navbar-pcsaurios .nav-link');

  if (navbarCollapse) {
    navLinks.forEach((link) => {
      link.addEventListener('click', () => {
        if (navbarCollapse.classList.contains('show')) {
          const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse) || new bootstrap.Collapse(navbarCollapse);
          bsCollapse.hide();
        }
      });
    });
  }

  // Actualizar enlace activo en el menú según el scroll
  const sections = document.querySelectorAll('main > section[id]');
  window.addEventListener('scroll', () => {
    const scrollY = window.pageYOffset;
    sections.forEach((current) => {
      const sectionHeight = current.offsetHeight;
      const sectionTop = current.offsetTop - 120;
      const sectionId = current.getAttribute('id');
      const activeLink = document.querySelector(`.navbar-pcsaurios .nav-link[href*="${sectionId}"]`);

      if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
        navLinks.forEach((link) => link.classList.remove('active'));
        if (activeLink) activeLink.classList.add('active');
      }
    });
  });

  // ==========================================================================
  // 2. Catálogo de Productos: Buscador y Filtrado
  // ==========================================================================
  const searchInput = document.getElementById('productSearchInput');
  const categoryButtons = document.querySelectorAll('.filter-pills-container .btn-filter-pill');
  const productItems = document.querySelectorAll('.product-item');
  const catalogCountText = document.getElementById('catalogCountText');
  const noProductsAlert = document.getElementById('noProductsAlert');
  const resetFiltersBtn = document.getElementById('resetFiltersBtn');
  const clearSearchAlertBtn = document.getElementById('clearSearchAlertBtn');

  let activeCategory = 'all';

  // Función auxiliar para normalizar texto (sin acentos, minúsculas)
  const normalizeText = (text) => {
    return (text || '')
      .toLowerCase()
      .normalize('NFD')
      .replace(/[\u0300-\u036f]/g, '')
      .trim();
  };

  const filterProducts = () => {
    const query = normalizeText(searchInput ? searchInput.value : '');
    let visibleCount = 0;

    productItems.forEach((item) => {
      const itemCategory = item.getAttribute('data-category') || '';
      const itemName = normalizeText(item.getAttribute('data-name'));
      const itemMember = normalizeText(item.getAttribute('data-member'));

      // Comprobar coincidencia con la categoría
      const matchesCategory = (activeCategory === 'all' || itemCategory === activeCategory);

      // Comprobar coincidencia con el término de búsqueda
      const matchesQuery = !query || 
                           itemName.includes(query) || 
                           itemMember.includes(query) || 
                           itemCategory.includes(query);

      if (matchesCategory && matchesQuery) {
        item.style.display = '';
        visibleCount++;
      } else {
        item.style.display = 'none';
      }
    });

    // Actualizar contador
    if (catalogCountText) {
      if (visibleCount === 1) {
        catalogCountText.textContent = 'Mostrando 1 producto';
      } else {
        catalogCountText.textContent = `Mostrando ${visibleCount} productos`;
      }
    }

    // Mostrar/ocultar mensaje de no coincidencias
    if (noProductsAlert) {
      noProductsAlert.style.display = (visibleCount === 0) ? 'block' : 'none';
    }

    // Mostrar botón de reset si hay filtros activos o búsqueda
    if (resetFiltersBtn) {
      const hasActiveFilters = (activeCategory !== 'all' || (query && query.length > 0));
      resetFiltersBtn.style.display = hasActiveFilters ? 'inline-block' : 'none';
    }
  };

  // Evento de búsqueda por texto
  if (searchInput) {
    searchInput.addEventListener('input', filterProducts);
  }

  // Evento de clic en botones de categoría
  categoryButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      categoryButtons.forEach((b) => b.classList.remove('active'));
      btn.classList.add('active');
      activeCategory = btn.getAttribute('data-category') || 'all';
      filterProducts();
    });
  });

  // Función para restablecer filtros
  const resetAllFilters = () => {
    if (searchInput) searchInput.value = '';
    activeCategory = 'all';
    categoryButtons.forEach((b) => {
      if (b.getAttribute('data-category') === 'all') {
        b.classList.add('active');
      } else {
        b.classList.remove('active');
      }
    });
    filterProducts();
  };

  if (resetFiltersBtn) {
    resetFiltersBtn.addEventListener('click', resetAllFilters);
  }

  if (clearSearchAlertBtn) {
    clearSearchAlertBtn.addEventListener('click', () => {
      resetAllFilters();
      if (searchInput) searchInput.focus();
    });
  }

  // ==========================================================================
  // 3. Modal de Solicitud de Producto
  // ==========================================================================
  const requestButtons = document.querySelectorAll('.btn-request-product');
  const modalProductName = document.getElementById('modalProductName');
  const modalProductPrice = document.getElementById('modalProductPrice');
  const modalProductType = document.getElementById('modalProductType');
  const modalProductCopyName = document.getElementById('modalProductCopyName');
  const requestModalElement = document.getElementById('productRequestModal');

  if (requestModalElement && requestButtons.length > 0) {
    const requestModal = new bootstrap.Modal(requestModalElement);

    requestButtons.forEach((btn) => {
      btn.addEventListener('click', () => {
        const name = btn.getAttribute('data-product-name') || 'Producto';
        const price = btn.getAttribute('data-product-price') || 'Precio por confirmar';
        const type = btn.getAttribute('data-product-type') || 'Coleccionable';

        if (modalProductName) modalProductName.textContent = name;
        if (modalProductPrice) modalProductPrice.textContent = price;
        if (modalProductType) modalProductType.textContent = type;
        if (modalProductCopyName) modalProductCopyName.textContent = name;

        requestModal.show();
      });
    });
  }

  // ==========================================================================
  // 4. Galería: Filtrado por Etiquetas
  // ==========================================================================
  const galleryFilterButtons = document.querySelectorAll('[data-gallery-filter]');
  const galleryItems = document.querySelectorAll('.gallery-item');

  galleryFilterButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      galleryFilterButtons.forEach((b) => b.classList.remove('active'));
      btn.classList.add('active');

      const filterValue = btn.getAttribute('data-gallery-filter');

      galleryItems.forEach((item) => {
        const itemCat = item.getAttribute('data-gallery-cat');
        if (filterValue === 'all' || itemCat === filterValue) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });

  // ==========================================================================
  // 5. Galería: Visor Modal Lightbox
  // ==========================================================================
  const galleryGridItems = document.querySelectorAll('.gallery-grid-item');
  const lightboxImage = document.getElementById('lightboxImage');
  const lightboxCaption = document.getElementById('lightboxCaption');

  galleryGridItems.forEach((item) => {
    const openLightbox = () => {
      const src = item.getAttribute('data-img-src');
      const alt = item.getAttribute('data-img-alt');
      const title = item.getAttribute('data-img-title');

      if (lightboxImage && src) {
        lightboxImage.src = src;
        lightboxImage.alt = alt || 'Fotografía de PcSaurios';
      }
      if (lightboxCaption) {
        lightboxCaption.textContent = title ? `${title} — PcSaurios` : (alt || '');
      }
    };

    item.addEventListener('click', openLightbox);

    // Soporte de accesibilidad para teclado (Enter o Espacio)
    item.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        openLightbox();
        const galleryModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('galleryLightboxModal'));
        galleryModal.show();
      }
    });
  });

});
