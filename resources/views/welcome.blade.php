@extends('layouts.app')

@section('content')

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
      <div class="container">
        <div
          class="row gy-4 justify-content-center justify-content-lg-between"
        >
          <div
            class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center"
          >
            <h1 data-aos="fade-up">Enjoy Your Healthy<br />Delicious Food</h1>
            <p data-aos="fade-up" data-aos-delay="100">
              We are team of talented designers making websites with Bootstrap
            </p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#book-a-table" class="btn-get-started"
                >Order Now</a
              >
            
            </div>
          </div>
          <div
            class="col-lg-5 order-1 order-lg-2 hero-img"
            data-aos="zoom-out"
          >
            <img
              src="{{ asset('user/assets/img/hero-img.png') }}"
              class="img-fluid animated"
              alt=""
            />
          </div>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br /></h2>
        <p>
          <span>Learn More</span>
          <span class="description-title">About Us</span>
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('user/assets/img/about.jpg') }}" class="img-fluid mb-4" alt="" />
           
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <ul>
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  <span
                    >Ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</span
                  >
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  <span
                    >Duis aute irure dolor in reprehenderit in voluptate
                    velit.</span
                  >
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  <span
                    >Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate
                    trideta storacalaperda mastiro dolore eu fugiat nulla
                    pariatur.</span
                  >
                </li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint
                occaecat cupidatat non proident
              </p>

              <div class="position-relative mt-4">
                <img src="{{ asset('user/assets/img/about.jpg') }}" class="img-fluid" alt="" />
                <a
                  href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                  class="glightbox pulsating-play-btn"
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->

    <!-- Why Us Section -->
   
    <!-- /Why Us Section -->

    <!-- Stats Section -->
  
    <!-- /Stats Section -->

    <!-- Menu Section -->
    
    <!-- /Menu Section -->

    <!-- Testimonials Section -->
    {{-- <section id="testimonials" class="testimonials section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>TESTIMONIALS</h2>
        <p>
          What Are They <span class="description-title">Saying About Us</span>
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span
                          >Proin iaculis purus consequat sem cure digni ssim
                          donec porttitora entum suscipit rhoncus. Accusantium
                          quam, ultricies eget id, aliquam eget nibh et.
                          Maecen aliquam, risus at semper.</span
                        >
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Saul Goodman</h3>
                      <h4>Ceo &amp; Founder</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img
                      src="assets/img/testimonials/testimonials-1.jpg"
                      class="img-fluid testimonial-img"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span
                          >Export tempor illum tamen malis malis eram quae
                          irure esse labore quem cillum quid cillum eram malis
                          quorum velit fore eram velit sunt aliqua noster
                          fugiat irure amet legam anim culpa.</span
                        >
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img
                      src="assets/img/testimonials/testimonials-2.jpg"
                      class="img-fluid testimonial-img"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span
                          >Enim nisi quem export duis labore cillum quae magna
                          enim sint quorum nulla quem veniam duis minim tempor
                          labore quem eram duis noster aute amet eram fore
                          quis sint minim.</span
                        >
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img
                      src="assets/img/testimonials/testimonials-3.jpg"
                      class="img-fluid testimonial-img"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span
                          >Fugiat enim eram quae cillum dolore dolor amet
                          nulla culpa multos export minim fugiat minim velit
                          minim dolor enim duis veniam ipsum anim magna sunt
                          elit fore quem dolore labore illum veniam.</span
                        >
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>John Larson</h3>
                      <h4>Entrepreneur</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i
                        ><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img
                      src="assets/img/testimonials/testimonials-4.jpg"
                      class="img-fluid testimonial-img"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section> --}}
    <!-- /Testimonials Section -->

    <!-- Events Section -->

    <!-- Chefs Section -->

    <!-- /Chefs Section -->

    <!-- Book A Table Section -->
    <!-- <section id="book-a-table" class="book-a-table section">
      <!-- Section Title -->

    <!-- /Book A Table Section -->

    <!-- Gallery Section -->

    <!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>
          <span>Need Help?</span>
          <span class="description-title">Contact Us</span>
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="mb-5">
          <iframe
            style="width: 100%; height: 400px"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
            frameborder="0"
            allowfullscreen=""
          ></iframe>
        </div>
        <!-- End Google Maps -->

        <div class="row gy-4">
          <div class="col-md-6">
            <div
              class="info-item d-flex align-items-center"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
          </div>
          <!-- End Info Item -->

          <div class="col-md-6">
            <div
              class="info-item d-flex align-items-center"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div>
          </div>
          <!-- End Info Item -->

          <div class="col-md-6">
            <div
              class="info-item d-flex align-items-center"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>info@example.com</p>
              </div>
            </div>
          </div>
          <!-- End Info Item -->

          <div class="col-md-6">
            <div
              class="info-item d-flex align-items-center"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <i class="icon bi bi-clock flex-shrink-0"></i>
              <div>
                <h3>Opening Hours<br /></h3>
                <p>
                  <strong>Mon-Sat:</strong> 11AM - 23PM;
                  <strong>Sunday:</strong> Closed
                </p>
              </div>
            </div>
          </div>
          <!-- End Info Item -->
        </div>

        <!-- End Contact Form -->
      </div>
    </section>
    <!-- /Contact Section -->
  </main>
@endsection