<section id="about" class="about section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>About Us</h2>
    <p>Who we are</p>
  </div>
  <!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-8 content descr" data-aos="fade-up" data-aos-delay="100"></div>
      <div class="col-lg-4 seg2" data-aos="fade-up" data-aos-delay="200">
        @if (@$aboutUs['videoUrl'])
          <iframe width="100%" height="315" src="{{ $aboutUs['videoUrl'] }}"></iframe>
        @endif
      </div>      
    </div>
  </div>
</section>

<script>
  const aboutUs = @json(@$aboutUs);
  if (aboutUs && Object.keys(aboutUs).length) {
    if (aboutUs.description) {
      const div = document.getElementsByClassName('descr')[0];
      div.innerHTML = documentToHtmlString(aboutUs.description);
    }
  }
</script>
