@extends('layouts.app')

@section('content')
<section class="cover-user bg-white" style="margin-top: -1.29%">
    <div class="container-fluid px-0">
        <div class="row g-0 position-relative">
            <div class="col-lg-4 cover-my-30 order-2">
                <div class="cover-user-img d-flex align-items-center" style="height: 87vh">
                    <div class="row">
                        <div class="col-12">
                            <div class="card login-page border-0" style="z-index: 1">
                                <div class="card-body p-0">
                                    <h4 class="card-title text-center">Autentificare</h4>
                                    <form class="login-form mt-4" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Parolă <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="remember">
                                                            <label class="form-check-label" for="flexCheckDefault">Ține-mă minte</label>
                                                        </div>
                                                    </div>
                                                    @if (Route::has('password.request'))
                                                        <p class="forgot-pass mb-0"><a href="{{ route('password.request') }}" class="text-dark fw-bold">Ți-ai uitat parola?</a></p>
                                                    @endif
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit"  class="btn btn-primary">  Logare</button>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12 text-center">
                                                <p class="mb-0 mt-3"><small class="text-dark me-2">Nu ai un account ?</small> <a href="{{ route('register') }}" class="text-dark fw-bold">Înregistrează-te</a></p>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div> <!-- end about detail -->
            </div> <!-- end col -->

            <div class="col-lg-8 offset-lg-4 padding-less img order-1" style="background-image:url('images/user/pexels-lucas-da-miranda-1967902.jpg'); height: 114.3%!important; -webkit-mask-image: -webkit-gradient(linear, right bottom, left bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0)));" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
        </div><!--end row-->
    </div><!--end container fluid-->
</section><!--end section-->
@endsection
