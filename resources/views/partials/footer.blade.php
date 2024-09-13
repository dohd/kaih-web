<footer id="footer" class="footer dark-background">
  <div class="container">
    <h3 class="sitename">{{ @$headerFooter['name'] ?: config('app.name') }}</h3>
    <p>{{ @$headerFooter['slogan'] }}</p>
    <div class="social-links d-flex justify-content-center">
      <a href="{{ @$headerFooter['twitterUrl'] ?: '#contact' }}"><i class="bi bi-twitter-x"></i></a>
      <a href="{{ @$headerFooter['facebookUrl'] ?: '#contact' }}"><i class="bi bi-facebook"></i></a>
      <a href="{{ @$headerFooter['instagramUrl'] ?: '#contact' }}"><i class="bi bi-instagram"></i></a>
      <a href="{{ @$headerFooter['skypeUrl'] ?: '#contact' }}"><i class="bi bi-skype"></i></a>
      <a href="{{ @$headerFooter['linkedInUrl'] ?: '#contact' }}"><i class="bi bi-linkedin"></i></a>
    </div>
    <div class="container">
      <div class="copyright">
        <span>Copyright © 2024 | </span><strong class="px-1 sitename">{{ @$headerFooter['shortName'] ?: config('app.name') }}</strong><span> | All Rights Reserved</span>
      </div>
      <div class="credits">
        Designed by <a href="#contact">Proffer Systems</a>
      </div>
    </div>
  </div>
</footer>
