@extends(front_route_path('layouts.default'))

<x-administrable::seotags :model="$page" />

@section('hero')
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Centre Virtuel d'Arbitrage (CVA)</h1>
          <h2>Votre centre disponible 24/24 et 7j/7 pour abitrer vos litiges</h2>
          <div class="d-lg-flex">
            <a href="#about" class="btn-get-started scrollto">Commencer</a>
            <a href="https://www.youtube.com/watch?v=C44eYVsOskM" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true">
                 Regarder la vidéo de présentation <i class="icofont-play-alt-2"></i>
                </a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="/vendor/template/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endsection

@section('content')
    @include('front.home.partials._partners')
    @include('front.home.partials._about')
    @include('front.home.partials._whyus')
    @include('front.home.partials._skills')
    @include('front.home.partials._services')
    @include('front.home.partials._cta')
    {{-- @include('front.home.partials._portfolio') --}}
    @include('front.home.partials._teams')
    {{-- @include('front.home.partials._pricing') --}}
    @include('front.home.partials._faq')
    @include('front.home.partials._contact')
@endsection



