@extends('layout')
@section('title', 'Recent News - KAIH')
@section('body-class', 'class=blog-page')

@section('content')
  <main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>News & Blog Posts</h1>
        <p>Recent articles, news pieces and guides</p>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">
      <div class="container">
        <div class="row gy-4">
          @foreach ($blogPosts as $blog)
            <!-- Post list item -->
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <article>
                <div class="post-img">
                  @if ($blog['image'])
                    <img src="{{ $blog['image']['url'] }}" alt="{{ explode('.', $blog['image']['fileName'])[0] }}" class="img-fluid">
                  @endif
                </div>
                <p class="post-category">{{ $blog['tag'] }}</p>
                <h2 class="title">
                  <a href="{{ route('news.show', ['id' => $blog['id']]) }}">{{ $blog['shortTitle'] }}</a>
                </h2>
                <div class="d-flex align-items-center">
                  <div class="post-meta">
                    <p class="post-date">
                      <time datetime="{{ $blog['date'] }}">{{ dateFormat($blog['date'], 'M d, Y') }}</time>
                    </p>
                  </div>
                </div>
              </article>
            </div>
            <!-- End post list item -->
          @endforeach
        </div>
        <!-- End recent posts list -->
      </div>
    </section>
    <!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    {{-- <section id="blog-pagination" class="blog-pagination section">
      <div class="container">
        <div class="d-flex justify-content-center">
            <ul>
              <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
              <li><a href="#" class="active">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>...</li>
              <li><a href="#">10</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
        </div>
      </div>
    </section> --}}
    <!-- /Blog Pagination Section -->
  </main>
@endsection

@section('extra-scripts')
  <script>
    let menulink = document.querySelectorAll('[data-link="news"]')[0];
    if (menulink) menulink.classList.add('active');
  </script>
@endsection