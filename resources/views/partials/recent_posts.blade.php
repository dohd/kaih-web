<section id="recent-posts" class="recent-posts section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Recent News</h2>
      <p>Recent News Posts<br></p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">

        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Access to Justice</p>

            <h2 class="title">
              <a href="{{ route('news_details', ['id' => 1]) }}">Dolorum optio tempore voluptas dignissimos</a>
            </h2>

            <div class="d-flex align-items-center">
              <!-- <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0"> -->
              <div class="post-meta">
                <!-- <p class="post-author">Maria Doe</p> -->
                <p class="post-date">
                  <time datetime="2022-01-01">Jan 1, 2022</time>
                </p>
              </div>
            </div>
            <a href="{{ route('news_details', ['id' => 1]) }}" class="btn btn-outline-danger mt-2">Read More</a>

          </article>
        </div><!-- End post list item -->

        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Self Advocacy</p>

            <h2 class="title">
              <a href="{{ route('news_details', ['id' => 2]) }}">Nisi magni odit consequatur autem nulla dolorem</a>
            </h2>

            <div class="d-flex align-items-center">
              <!-- <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0"> -->
              <div class="post-meta">
                <!-- <p class="post-author">Allisa Mayer</p> -->
                <p class="post-date">
                  <time datetime="2022-01-01">Jun 5, 2022</time>
                </p>
              </div>
            </div>
            <a href="{{ route('news_details', ['id' => 2]) }}" class="btn btn-outline-danger mt-2">Read More</a>
          </article>
        </div><!-- End post list item -->

        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Vocational Training</p>

            <h2 class="title">
              <a href="{{ route('news_details', ['id' => 3]) }}">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
            </h2>

            <div class="d-flex align-items-center">
              <!-- <img src="assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0"> -->
              <div class="post-meta">
                <!-- <p class="post-author">Mark Dower</p> -->
                <p class="post-date">
                  <time datetime="2022-01-01">Jun 22, 2022</time>
                </p>
              </div>
            </div>
            <a href="{{ route('news_details', ['id' => 3]) }}" class="btn btn-outline-danger mt-2">Read More</a>
          </article>
        </div><!-- End post list item -->

      </div><!-- End recent posts list -->

    </div>

  </section>