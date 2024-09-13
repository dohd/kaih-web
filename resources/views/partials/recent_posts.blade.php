<section id="recent-posts" class="recent-posts section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Recent News</h2>
    <p>Recent News Posts<br></p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <!-- Post list item -->
      @foreach ($blogPosts as $item)
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <article>
            <div class="post-img">
              @if ($item['image'])
                <img src="{{ $item['image']['url'] }}" alt="{{ explode('.', $item['image']['fileName'])[0] }}" class="img-fluid">
              @endif
            </div>
            <p class="post-category">{{ $item['tag'] }}</p>
            <h2 class="title">
              <a href="{{ route('news.show', $item['id']) }}">{{ $item['shortTitle'] }}</a>
            </h2>
            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="{{ $item['date'] }}">{{ dateFormat($item['date'], 'M d, Y') }}</time>
                </p>
              </div>
            </div>
            <a href="{{ route('news.show', $item['id']) }}" class="btn btn-outline-danger mt-2">Read More</a>
          </article>
        </div>
      @endforeach
      <!-- End post list item -->
    </div>
    <!-- End recent posts list -->
  </div>
</section>
