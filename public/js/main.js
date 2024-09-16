(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Toggle Accessibility Tools sidebar
   */
  const acccesibilityToolSidebar = document.querySelector('#at-sidebar');
  const acccesibilityToolToggle = document.querySelector('#at-sidebar-toggle');
  acccesibilityToolToggle.addEventListener('click', function() {
    acccesibilityToolSidebar.classList.toggle('active'); // Show or hide sidebar
  });

  /**
   * Toggle Zoom-In and Zoom-Out
   */
  let zoomLevel = 1; // Default zoom level
  // Function to apply zoom
  function applyZoom() {
    document.body.style.transform = `scale(${zoomLevel})`;
    document.body.style.transformOrigin = '0 0'; // Ensures zoom is applied from the top-left
    document.body.style.width = `${100 / zoomLevel}%`; // Adjust the width to prevent content overflow
  }
  const zoomInToggleButton = document.querySelector('.at-zoom-in');
  zoomInToggleButton.addEventListener('click', function() {
    zoomLevel += 0.1;
    applyZoom();
  });
  const zoomOutToggleButton = document.querySelector('.at-zoom-out');
  zoomOutToggleButton.addEventListener('click', function() {
    // Prevent zooming out too much
    if (zoomLevel > 0.5) { 
      zoomLevel -= 0.1; // Decrease zoom level
      applyZoom();
    }
  });


  /**
   * Toggle Grayscale filter
  */
  const grayscaleToggle = document.querySelector('.at-grayscale');
  grayscaleToggle.addEventListener('click', function () {
    document.body.style.filter = 'grayscale(100%)'; // 100% grayscale
  });

  /**
   * Toggle Contrast
  */
  const highContrastToggle = document.querySelector('.at-high-contrast');
  highContrastToggle.addEventListener('click', function () {
    document.body.classList.add('high-contrast'); 
    document.querySelector('.main').classList.add('high-contrast'); 
    document.querySelector('.footer').classList.add('high-contrast'); 
    document.querySelector('.header').classList.add('high-contrast'); 
    document.querySelectorAll('.section').forEach(el => el.classList.add('high-contrast')); 
    document.querySelectorAll('.sidebar').forEach(el => el.classList.add('high-contrast')); 
    document.querySelectorAll('p').forEach(el => el.classList.add('high-contrast')); 
    document.querySelectorAll('li').forEach(el => el.classList.add('high-contrast')); 
  });
  const negativeContrastToggle = document.querySelector('.at-negative-contrast');
  negativeContrastToggle.addEventListener('click', function () {
    document.body.classList.add('negative-contrast'); 
    document.querySelector('.main').classList.add('negative-contrast'); 
    document.querySelector('.footer').classList.add('negative-contrast'); 
    document.querySelector('.header').classList.add('negative-contrast'); 
    document.querySelectorAll('.section').forEach(el => el.classList.add('negative-contrast')); 
    document.querySelectorAll('.sidebar').forEach(el => el.classList.add('negative-contrast')); 
    document.querySelectorAll('p').forEach(el => el.classList.add('negative-contrast')); 
    document.querySelectorAll('li').forEach(el => el.classList.add('negative-contrast')); 
  });

  /**
   * Toggle Link Underline
  */
  const linkUnderlineToggle = document.querySelector('.at-link-underline');
  linkUnderlineToggle.addEventListener('click', function () {
    document.querySelectorAll('a').forEach(el => {el.style.textDecoration = 'underline'}); 
  });

  /**
   * Reset Accessibility Tool Features
   */
  const acccesibilityToolReset = document.querySelector('.at-reset');
  acccesibilityToolReset.addEventListener('click', function() {
    // Reset zoom to default
    zoomLevel = 1; 
    applyZoom();
    // Cancel speech synthesis
    window.speechSynthesis.cancel();
    // Remove grayscale filter
    document.body.style.filter = 'none';
    // Remove high contrast class
    document.body.classList.remove('high-contrast'); 
    document.querySelector('.main').classList.remove('high-contrast'); 
    document.querySelector('.footer').classList.remove('high-contrast'); 
    document.querySelector('.header').classList.remove('high-contrast'); 
    document.querySelectorAll('.section').forEach(el => el.classList.remove('high-contrast')); 
    document.querySelectorAll('p').forEach(el => el.classList.remove('high-contrast'));
    document.querySelectorAll('li').forEach(el => el.classList.remove('high-contrast'));
    // Remove negative contrast class
    document.body.classList.remove('negative-contrast'); 
    document.querySelector('.main').classList.remove('negative-contrast'); 
    document.querySelector('.footer').classList.remove('negative-contrast'); 
    document.querySelector('.header').classList.remove('negative-contrast'); 
    document.querySelectorAll('.section').forEach(el => el.classList.remove('negative-contrast')); 
    document.querySelectorAll('p').forEach(el => el.classList.remove('negative-contrast'));
    document.querySelectorAll('li').forEach(el => el.classList.remove('negative-contrast'));
    // Remove link underline
    document.querySelectorAll('a').forEach(el => {el.style.textDecoration = 'none'}); 
  });




  /**
   * Toggle Text to Speech
   */
  let voices = [];
  function loadVoices() {
    voices = window.speechSynthesis.getVoices();
    if (voices.length === 0) {
      // If voices are not loaded yet, wait for the 'voiceschanged' event
      window.speechSynthesis.addEventListener('voiceschanged', () => {
        voices = window.speechSynthesis.getVoices();
      });
    }
  }
  loadVoices(); // Load voices immediately when the page is loaded

  function getSelectedText() {
    if (window.getSelection) {
      return window.getSelection().toString();
    } else if (document.selection && document.selection.type !== "Control") {
      return document.selection.createRange().text;
    }
    return '';
  }
  // Convert text to speech using the Web Speech API
  function speakText(text) {
    window.speechSynthesis.cancel();
    if (!text) return alert("Please highlight some text to read aloud.");
    const synth = window.speechSynthesis;
    const utterance = new SpeechSynthesisUtterance(text);

    // Make sure we have voices loaded
    if (voices.length === 0) loadVoices();
    // Optional: Set a specific voice if available
    utterance.voice = voices.find(voice => voice.lang === 'en-US') || voices[0]; // Default to first voice
    utterance.pitch = 1; // Default pitch
    utterance.rate = 1;  // Default speed
    synth.speak(utterance);
  }

  let soundWave = document.querySelector('.at-soundwave');
  soundWave.addEventListener('click', (e) => {
    e.preventDefault();
    speakText(getSelectedText());
  });

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    });
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);


  /**
   * Custom Scrollspy
   */
  function customScrollspy() {
    let sections = document.querySelectorAll('.features, .testimonials, .recent-posts');
    sections.forEach(section => {
      let menulink;
      let sectionId = section.getAttribute('id')
      if (sectionId == 'features') {
        menulink = document.querySelectorAll('[href="/#about"]')[0];
      } else if (sectionId == 'testimonials') {
        menulink = document.querySelectorAll('[href="/#services"]')[0];
      } else if (sectionId == 'recent-posts') {
        menulink = document.querySelectorAll('[data-link="news"]')[0];
      }
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        if (menulink) menulink.classList.add('active');
      }
    });
  }
  window.addEventListener('load', customScrollspy);
  document.addEventListener('scroll', customScrollspy);

})();