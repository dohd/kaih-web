@extends('layout')
@section('title', 'Program - KAIH')
@section('body-class', 'class=service-details-page')

@section('content')
  <main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>{{ @$program['name'] }}</h1>
        <p>{{ @$program['shortDescription'] }}</p>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-8 ps-lg-5 mx-auto" data-aos="fade-up" data-aos-delay="200">
            {{-- <img src="asset('img/services.jpg')" alt="" class="img-fluid services-img"> --}}
            {{-- <h3></h3> --}}
            <div class="program"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Service Details Section -->
  </main>    
@endsection

@section('extra-scripts')
  <script>
    let menulink = document.querySelectorAll('[href="/#services"]')[0];
    if (menulink) menulink.classList.add('active');

    // set program content
    const program = @json(@$program);
    if (program && program.id) {
      const div = document.getElementsByClassName('program')[0];
      div.innerHTML = documentToHtmlString(program.description);
    } 
  </script>
@endsection
