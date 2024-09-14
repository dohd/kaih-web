<section id="testimonials" class="testimonials section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Testimonials</h2>
    <p>What they are saying about us</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="swiper init-swiper">
      @if ($testimonials)
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
              },
              "1200": {
                "slidesPerView": 3,
                "spaceBetween": 10
              }
            }
          }
        </script>
      @endif

      <div class="swiper-wrapper">
        @foreach ($testimonials as $i => $item)
          <!-- Testimonial item --> 
          <div class="swiper-slide">
            <div class="testimonial-item">
              <h3>{{ $item['name'] }}</h3>
              <h4>{{ $item['occupation'] }}</h4>
              <div class="stars">
                @for ($j = 0; $j < $item['rating']; $j++)
                  <i class="bi bi-star-fill"></i>
                @endfor
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>{{ $item['testimony'] }}</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
          <!-- End testimonial item -->
        @endforeach
      </div>

      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
