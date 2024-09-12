<section id="pricing" class="pricing section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Partners</h2>
    <p>Our Partners</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-3">
      @foreach ($partners as $item)
        <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="pricing-item">
            <div class="mx-auto" style="width: 150px; height: 150px">
              <img src="{{ $item['url'] }}" alt="{{ explode('.',$item['fileName'])[0] }}" style='height: 100%; width: 100%; object-fit:fill'>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
