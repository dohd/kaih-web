<section id="about" class="about section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>About Us</h2>
    <p>Who we are</p>
  </div>
  <!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 content seg1" data-aos="fade-up" data-aos-delay="100"></div>
      <div class="col-lg-6 seg2" data-aos="fade-up" data-aos-delay="200"></div>      
    </div>
  </div>
</section>

<script>
  const aboutUs = @json(@$aboutUs);
  if (aboutUs && Object.keys(aboutUs).length) {
    if (aboutUs.segment1) {
      const div = document.getElementsByClassName('seg1')[0];
      div.innerHTML = documentToHtmlString(aboutUs.segment1);
    }
    if (aboutUs.segment2) {
      const div = document.getElementsByClassName('seg2')[0];
      div.innerHTML = documentToHtmlString(aboutUs.segment2);
    }
  }
</script>
