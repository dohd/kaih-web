<section id="features" class="features section">
  <div class="container">
    <!-- Tab Nav -->
    <ul class="nav nav-tabs row  d-flex" data-aos="fade-up" data-aos-delay="100">
      @php
        $iconClasses = ['bi bi-binoculars', 'bi bi-box-seam', 'bi bi-brightness-high', 'bi bi-command'];
      @endphp
      @foreach ($pillars as $i => $item)
        <li class="nav-item col-3">
          <a class="nav-link {{ !$i? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#features-tab-{{ $i }}">
            <i class="{{ @$iconClasses[$i] }}"></i>
            <h4 class="d-none d-lg-block">{{ $item['name'] }}</h4>
          </a>
        </li>
      @endforeach
    </ul>
    <!-- End Tab Nav -->

    <!-- Tab Content Item -->
    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
      @foreach ($pillars as $i => $item)
        <div class="tab-pane fade {{ !$i? 'active show' : '' }}" id="features-tab-{{ $i }}">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <div class="pillar-{{ $i }}"></div>
            </div>
          </div>
          {{-- <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3></h3>
              <p class="fst-italic"></p>
              <p></p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="asset('img/working-1.jpg')" alt="" class="img-fluid">
            </div>
          </div> --}}
        </div> 
      @endforeach
      <!-- End Tab Content Item -->
    </div>
  </div>  
</section>

<script>
  const pillars = @json(@$pillars);
  if (pillars.length) {
    pillars.forEach((v,i) => {
      const div = document.getElementsByClassName('pillar-' + i)[0];
      div.innerHTML = documentToHtmlString(v.description);
    });
  }
</script>
