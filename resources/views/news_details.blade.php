@extends('layout')
@section('title', 'News - KAIH')
@section('body-class', 'class=blog-details-page')

@section('content')
  <main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>{{ $blogPost['tag']  }}</h1>
        <p>{{ $blogPost['shortDescription'] }}</p>
      </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">
              <article class="article">
                <div class="post-img">
                  @if ($blogPost['image'])
                    <img src="{{ $blogPost['image']['url'] }}" alt="{{ explode('.', $blogPost['image']['fileName'])[0] }}" class="img-fluid">
                  @endif
                </div>
                <h2 class="title">{{ $blogPost['shortTitle'] }}</h2>

                <!-- Meta top -->
                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $blogPost['author'] }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{ $blogPost['date'] }}">{{ dateFormat($blogPost['date'], 'M d, Y') }}</time></a></li>
                    {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li> --}}
                  </ul>
                </div>
                <!-- End meta top -->

                <!-- Post content -->
                <div class="content blog-post"></div>
                <!-- End post content -->
              </article>
            </div>
          </section><!-- /Blog Details Section -->
        </div>

        <div class="col-lg-4 sidebar">
          <div class="widgets-container">
            <!-- Categories Widget -->
            <div class="categories-widget widget-item">
              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                @foreach ($postTagsCount as $tag => $count)
                  <li><a href="{{ route('news', ['tag' => $tag]) }}">{{ $tag }} @if ($count) <span>({{ $count }})</span> @endif</a></li>
                @endforeach
              </ul>
            </div>
            <!--/Categories Widget -->
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('extra-scripts')
  <script>
    let menulink = document.querySelectorAll('[data-link="news"]')[0];
    if (menulink) menulink.classList.add('active');

    // set news content
    const blogPost = @json($blogPost);
    if (blogPost && blogPost.id) {
      const div = document.getElementsByClassName('blog-post')[0];
      div.innerHTML = documentToHtmlString(blogPost.article);
    } 
  </script>
@endsection