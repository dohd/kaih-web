<section id="services" class="services section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Programs</h2>
    <p>What we do</p>
  </div>
  <!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <!-- Service Item -->
      @php
        $iconAttr = [
          ['bi bi-cash-stack', 'color: #0dcaf0;'],
          ['bi bi-calendar4-week', 'color: #fd7e14;'],
          ['bi bi-chat-text', 'color: #20c997;'],
          ['bi bi-credit-card-2-front', 'color: #df1529;'],
          ['bi bi-globe', 'color: #6610f2;'],
          ['bi bi-clock', 'color: #f3268c;'],
        ];
      @endphp
      @foreach ($programs as $i => $item)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item  position-relative pt-5 pb-3">
            <div class="icon"><i class="{{ @$iconAttr[$i][0] }}" style="{{ @$iconAttr[$i][1] }}"></i></div>
            <a href="{{ route('programs.show', ['id' => $item['id']]) }}" class="stretched-link">
              <h3>{{ $item['name'] }}</h3>
            </a>
            <p>{{ $item['shortDescription'] }}</p>
            <a href="{{ route('programs.show', ['id' => $item['id']]) }}" class="btn btn-outline-danger mt-3">Read More</a>
          </div>
        </div>
      @endforeach
      <!-- End Service Item -->
    </div>
  </div>
</section>
