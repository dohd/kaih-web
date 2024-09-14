<style>
  /** 
  * Initial background image
  */
  .image-bg {
    background-color: #2a2c39;
    transition:  2s ease; /* Transition for background color */
    overflow: hidden; /* Ensure pseudo-element stays inside the container */
  }
  .image-bg::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    /* background-image: url("img/working-1.jpg"); */
    width: 100%;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0; /* Initially hidden */
    transition: opacity 2s ease;
    z-index: 0;
  }
  .image-bg:hover { 
    background-color: transparent; /* Remove the background color */
  }
  .image-bg:hover::before {
    opacity: 1; /* Reveal the background image */
  }

  /** 
  * Transitional background images
  */
  .ts-background {
    /* background-image: url("img/working-1.jpg"); */
    width: 100%;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 1; /* Initially hidden */
    transition: background-image 3s ease; /* Smooth transition */
    transition: opacity 3s ease; /* Fade effect */
  }
  .fade-out {
    opacity: 0; /* Fades out */
  }
  .fade-in {
    opacity: 1; /* Fades in */
  }
</style>

<section id="hero" class="hero section dark-background image-bg">
  <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
    <!-- Slides -->
    @foreach ($headerSliderTexts as $i => $item)
      <div class="carousel-item {{ !$i ? 'active' : '' }}">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">{{ $item['title'] }}</h2>
          <p class="animate__animated animate__fadeInUp">{{ $item['body'] }}</p>
        </div>
      </div>
    @endforeach
    
    @if ($headerSliderTexts)
      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
    @endif
  </div>

  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
    </defs>
    <g class="wave1"><use xlink:href="#wave-path" x="50" y="3"></use></g>
    <g class="wave2"><use xlink:href="#wave-path" x="50" y="0"></use></g>
    <g class="wave3"><use xlink:href="#wave-path" x="50" y="9"></use></g>
  </svg>
</section>

@section('extra-scripts')
<script>
  const headerImages = @json(@$headerImages);
  if (headerImages.length) {
    const images = headerImages.map(v => v.url);
    const hero = document.getElementById('hero');

    // Set the first image as default
    hero.style.backgroundImage = `url(${images[0]})`;
    hero.style.backgroundRepeat = 'no-repeat';
    hero.style.backgroundSize = 'cover';
    hero.style.backgroundPosition = 'center';

    let i = 0;
    const duration = 1000; // 1 second fade duration
    const interval = 6000; // 6 seconds before switching images
    function changeBackgroundImage() {
      // Add fade-out effect
      hero.classList.add('fade-out');
      setTimeout(() => {
        // Change background image
        i = (i + 1) % images.length;
        hero.style.backgroundImage = `url(${images[i]})`;
        // Add fade-in effect after changing the image
        hero.classList.remove('fade-out');
        hero.classList.add('fade-in');
      }, duration); // Wait for fade-out to complete
    }
  
    function mouseOver() {
      setTimeout(() => {
        hero.removeEventListener('mouseover', mouseOver);
        // Remove initial image-background with transitional
        hero.classList.remove('image-bg');
        hero.classList.add('ts-background');
        // Automatically change the background every few seconds
        setInterval(changeBackgroundImage, interval + duration);
      }, 1000);
    }
    hero.addEventListener('mouseover', mouseOver);
  }
</script>
@endsection