@extends('layouts.site')
@section('content')
    <!-- Breadcrumbs -->
    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-46">
          <div class="container">
            <h2 class="breadcrumbs-custom-title">Lakshanaa's Legals</h2>
            
          </div>
          <div class="box-position" style="background-image: url({{ asset('landing/images/bg-breadcrumbs.jpg') }});"></div>
        </div>
    </section>
	  <section class="section section-md bg-default">
        <div class="container">
          <div class="oh">
            <h2 class="wow slideInUp" data-wow-delay="0s">Our Achievements </h2>
          </div>
          <div class="row row-30 justify-content-center">
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay="0s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="{{ asset('landing/images/c1.jpeg') }}" alt="" width="370" height="406"/></a>
          
              </article>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay=".1s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="{{ asset('landing/images/c2.jpg') }}" alt="" width="370" height="406"/></a>
              
              </article>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay=".2s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="{{ asset('landing/images/c3.jpg') }}" alt="" width="370" height="406"/></a>
               
              </article>
            </div>
          </div>
        </div>
    </section>
      <!-- What people say-->
    <section class="section context-dark">
        <div class="parallax-container" data-parallax-img="{{ asset('landing/images/bg-parallax-2.jpg') }}">
          <div class="parallax-content section-md bg-overlay-2-21">
            <div class="container">
              <div class="oh">
                <h2 class="wow slideInUp" data-wow-delay="0s">What People Say</h2>
              </div>
              <!-- Owl Carousel-->
              <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="{{ asset('landing/images/user-16-100x100.jpg') }}" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">I picked up a head of your lettuce at a local grocery store today. What an amazing and beautiful lettuce it is! I???ve never seen another so full and green and tempting.</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">Samantha Peterson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="{{ asset('landing/images/user-17-100x100.jpg') }}" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">I wanted to tell you how amazing it was to see the farm and how much we love the food. Your apples and carrots are just wonderful and their taste is great.</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">John Wilson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="{{ asset('landing/images/user-18-100x100.jpg') }}" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">The food from your farm is wonderful. So many nights when we sit down to dinner we can say everything on this plate is locally grown and delicious. Thank you!</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">Kate Anderson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
    </section>    
@endsection