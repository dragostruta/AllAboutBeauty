@extends('layouts.app')

@section('content')
    <!-- Hero Start -->
    <section class="home-slider position-relative">
        <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <div class="bg-home bg-animation-left d-flex align-items-center" style="background-image:url('images/salon/salon1.jpg')">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <div class="title-heading position-relative mt-4" style="z-index: 1;">
                                        <h1 class="heading mb-3">Enjoy Better Holidays With Landrick Resort</h1>
                                        <p class="para-desc">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="3000">
                    <div class="bg-home bg-animation-left d-flex align-items-center" style="background-image:url('images/salon/salon5.jpg')">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <div class="title-heading position-relative mt-4" style="z-index: 1;">
                                        <h1 class="heading mb-3">Enjoy The World of Relaxation</h1>
                                        <p class="para-desc">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="3000">
                    <div class="bg-home bg-animation-left d-flex align-items-center" style="background-image:url('images/salon/salon7.jpg')">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <div class="title-heading position-relative mt-4" style="z-index: 1;">
                                        <h1 class="heading mb-3">Welcome Landrick <br> A Stunning Hotel</h1>
                                        <p class="para-desc">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Partners start -->
    <section class="section-two bg-light" id="bookroom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form class="p-4 shadow bg-white rounded">
                        <h4 class="mb-3">Rezervă acum !</h4>
                        <div class="row text-start">
                            <div class="col-lg-3 col-md-6">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label"> Data: </label>
                                    <input name="date" type="date" class="form-control start" placeholder="Selectează data :">
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-3 col-md-6">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label"> Salon: </label>
                                    <input name="date" type="text" class="form-control end" placeholder="Selectează salonul :">
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-6">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-lg-0">
                                            <label class="form-label">Service : </label>
                                            <input type="number" min="0" autocomplete="off" id="adult" required="" class="form-control" placeholder="Selectează serviciul :">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-4">
                                        <div class="mb-3 mb-lg-0">
                                            <label class="form-label">Employee : </label>
                                            <input type="number" min="0" autocomplete="off" id="children" class="form-control" placeholder="Selectează angajatul :">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-4 mt-lg-4 pt-2 pt-lg-1">
                                        <div class="d-grid">
                                            <input type="submit" id="search" name="search" class="searchbtn btn btn-primary" value="Search">
                                        </div>
                                    </div><!--end col-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Partners End -->

    <!-- Rooms Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">Saloane</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($salons as $salon)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card work-container work-modern rounded border-0 overflow-hidden">
                            <div class="card-body p-0">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".{{str_replace(' ', '', $salon['name'])}}">{{$salon['name']}}</button>
                                @include('customer.customerAppointmentsModal', ['salon' => $salon])
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->

        </div><!--end container-->
    </section><!--end section-->
    <!-- Rooms End -->


    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        {{--                        <h4 class="title mb-4">Rooms & Suits</h4>--}}
                        {{--                        <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card work-container work-modern rounded border-0 overflow-hidden">
                        <div class="card-body p-0">
                            <img src="images/salon/salon2.jpg" class="img-fluid rounded" alt="work-image">
                            <div class="overlay-work"></div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card work-container work-modern rounded border-0 overflow-hidden">
                        <div class="card-body p-0">
                            <img src="images/salon/salon3.jpg" class="img-fluid rounded" alt="work-image">
                            <div class="overlay-work"></div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card work-container work-modern rounded border-0 overflow-hidden">
                        <div class="card-body p-0">
                            <img src="images/salon/salon4.jpg" class="img-fluid rounded" alt="work-image">
                            <div class="overlay-work"></div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card work-container work-modern rounded border-0 overflow-hidden">
                        <div class="card-body p-0">
                            <img src="images/salon/salon6.jpg" class="img-fluid rounded" alt="work-image">
                            <div class="overlay-work"></div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card work-container work-modern rounded border-0 overflow-hidden">
                        <div class="card-body p-0">
                            <img src="images/salon/salon8.jpg" class="img-fluid rounded" alt="work-image">
                            <div class="overlay-work"></div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card work-container work-modern rounded border-0 overflow-hidden">
                        <div class="card-body p-0">
                            <img src="images/salon/salon9.jpg" class="img-fluid rounded" alt="work-image">
                            <div class="overlay-work"></div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

        </div><!--end container-->
    </section><!--end section-->

    <!-- Client Start -->
    <section class="section" style="background: url('images/salon/salon1.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="tiny-single-item">
                        <div class="tiny-slider text-center client-testi">
                            <p class="text-light para-dark h6 fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Thomas Israel </h6>
                            <img src="images/client/01.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        </div>

                        <div class="tiny-slider text-center client-testi">
                            <p class="text-light para-dark h6 fst-italic">" The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout. "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Carl Oliver </h6>
                            <img src="images/client/02.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        </div>

                        <div class="tiny-slider text-center client-testi">
                            <p class="text-light para-dark h6 fst-italic">" There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories. "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Barbara McIntosh </h6>
                            <img src="images/client/03.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        </div>

                        <div class="tiny-slider text-center client-testi">
                            <p class="text-light para-dark h6 fst-italic">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero in 45 BC. Allegedly, a Latin scholar established the origin of the text by compiling all the instances of the unusual word 'consectetur' he could find "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Christa Smith </h6>
                            <img src="images/client/04.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        </div>

                        <div class="tiny-slider text-center client-testi">
                            <p class="text-light para-dark h6 fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Dean Tolle </h6>
                            <img src="images/client/05.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        </div>

                        <div class="tiny-slider text-center client-testi">
                            <p class="text-light para-dark h6 fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text. "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Jill Webb </h6>
                            <img src="images/client/06.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                        </div>
                    </div><!--end owl carousel-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- Client End -->
    </section>
    <!-- Client End -->

    <!-- Contact Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 p-0 ps-md-3 pe-md-3">
                    <div class="card map map-height-two rounded map-gray border-0">
                        <iframe src="https://www.google.com/maps/embed/v1/place?q=Baia+Mare&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" style="border:0" class="rounded" allowfullscreen></iframe>
                    </div>
                </div><!--end col-->
                <div class="col-lg-4 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card rounded shadow border-0">
                        <div class="card-body py-5">
                            <h5 class="card-title">Get In Touch !</h5>

                            <div class="custom-form mt-4">
                                <div id="message"></div>
                                <form method="post" name="contact-form" id="contact-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name" type="text" class="form-control ps-5" placeholder="First Name :">
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Your email :">
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Comments</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                                    <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Your Message :"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <div class="d-grid">
                                                <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Send Message">
                                                <div id="simple-msg"></div>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div><!--end custom-form-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- Contact End -->
    </section><!--end section-->
    <!-- News End -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <a href="#" class="logo-footer">
                        <img src="images/logo/logo.png" height="68" alt="">
                    </a>
                    <p class="mt-4">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                    </ul><!--end icon-->
                </div><!--end col-->

                <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <h5 class="text-light footer-head">Company</h5>
                    <ul class="list-unstyled footer-list mt-4">
                        <li><a href="page-aboutus.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> About us</a></li>
                        <li><a href="page-services.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>
                        <li><a href="page-team.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Team</a></li>
                        <li><a href="page-pricing.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Pricing</a></li>
                        <li><a href="page-portfolio-modern.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Project</a></li>
                        <li><a href="page-jobs.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Careers</a></li>
                        <li><a href="page-blog-grid.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Blog</a></li>
                        <li><a href="auth-cover-login.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Login</a></li>
                    </ul>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <h5 class="text-light footer-head">Usefull Links</h5>
                    <ul class="list-unstyled footer-list mt-4">
                        <li><a href="page-terms.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                        <li><a href="page-privacy.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>
                        <li><a href="documentation.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Documentation</a></li>
                        <li><a href="changelog.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Changelog</a></li>
                        <li><a href="components.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Components</a></li>
                    </ul>
                </div><!--end col-->

            </div><!--end row-->
        </div><!--end container-->
    </footer><!--end footer-->
    <footer class="footer footer-bar">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-start">
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Landrick. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="http://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </footer><!--end footer-->
    <!-- Footer End -->
@endsection
