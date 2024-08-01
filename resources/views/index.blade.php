@extends('layout')
@section('title', 'Home - KAIH')
@section('body-class', 'class=index-page')

@section('content')
  <main class="main">
    <!-- Hero Section -->
    @include('partials.hero')
    <!-- /Hero Section -->

    <!-- About Section -->
    @include('partials.about')
    <!-- /About Section -->

    <!-- Features Section -->
    @include('partials.features')
    <!-- /Features Section -->

    <!-- Programs Section -->
    @include('partials.programs')
    <!-- /Programs Section -->

    <!-- Testimonials Section -->
    @include('partials.testimonials')
    <!-- /Testimonials Section -->

    <!-- Partner Section -->
    @include('partials.partners')
    <!-- /Partner Section -->

    <!-- Recent Posts Section -->
    @include('partials.recent_posts')
    <!-- /Recent Posts Section -->

    <!-- Contact Section -->
    @include('partials.contact')
    <!-- /Contact Section -->
  </main>
@endsection