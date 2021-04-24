@extends('layouts.app')

@section('content')
<section class="cover-user bg-white" style="margin-top: -1.29%">
    <div class="container-fluid px-0">
        <div class="row g-0 position-relative">
            <div class="col-lg-4 cover-my-30 order-2" style="margin-left: 66.66666666%">
                <div class="cover-user-img d-lg-flex align-items-center" style="height: 87vh">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0" style="z-index: 1">
                                <div class="card-body p-0">
                                    <h4 class="card-title text-center">Înregistrare</h4>
                                    <form class="login-form mt-4" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Prenumele <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                                        @error('firstname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Numele de familie <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                                        @error('lastname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                 <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Parolă <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Confirmă Parola <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                                        <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Accept <a href="#" class="text-primary">Termenii și condițiile</a></label>
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="d-grid">
                                                    <button type="submit"  class="btn btn-primary">Înregistrare</button>
                                                </div>
                                            </div><!--end col-->

                                            <div class="mx-auto text-center">
                                                <p class="mb-0 mt-3"><small class="text-dark me-2">Ai deja un account ?</small> <a href="{{ route('login') }}" class="text-dark fw-bold">Loghează-te</a></p>
                                            </div>
                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div> <!-- end about detail -->
            </div> <!-- end col -->

            <div class="col-lg-8 padding-less img order-1" style="background-image:url('images/user/pexels-nataliya-vaitkevich-4945056.jpg'); height: 114.3%!important; -webkit-mask-image: -webkit-gradient(linear, left bottom, right bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0)));" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
        </div><!--end row-->
    </div><!--end container fluid-->
</section><!--end section-->
@endsection
