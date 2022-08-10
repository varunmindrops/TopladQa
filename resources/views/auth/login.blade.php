@extends('layouts.layout')

@prepend('head-data')
<title>Login - CMA | CS | CA | Classes | Top Institute</title>
<meta name="description" content="Login to Toplad now to unclock the top quality education and study material prepared by India's best Faculties. Login process is very simple, just enter your mail or contact number, create a password and enter to experience the top quality education">
<meta name="keywords" content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend

@section('content')

<style>
    footer.ftco-footer.ftco-section {
        display: none;
    }

    /* .grecaptcha-badge {
visibility: hidden;
} */
</style>


<section class="login_page">
    <div class="container">
        <div class="login_pane">
            <div class="wrap_flex">
                <h3 class=" ftco-animate fadeIn ftco-animated" data-animate-effect="fadeIn">Welcome</h3>
                <form class="login_form" method="POST" action="{{ route('login') }}">
                    <div class="logo_pane">
                        <a title="Toplad" class="login_logo" href="/"><img src="{{ asset('images/toplad-logo.svg') }}" alt="logo"></a>
                    </div>
                    <div class="wrap_fcontent">

                        <!-- <a href="/" class="home_jump"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>  Go Back Home</a> -->
                        @csrf
                        <input type="hidden" name="recaptcha" id="recaptcha">

                        <div class="inputs_data">
                            <div class="form-group">
                                <label for="login">Email or Contact</label>
                                <input type="text" class="form-control  {{ $errors->has('email') || $errors->has('phone') ? 'is-invalid' : '' }}" name="login" id="login" value="{{ old('email') ?: old('phone') }}" placeholder="Enter your email or contact" required autofocus>
                                @if( $errors->has('email') || $errors->has('phone') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') ?: $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Enter your password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group btn_fgroup">
                            <button type="submit" class="btn btn-primary">Login</button>
                            @if (Route::has('password.request'))
                            <div class="new_account"><a href="{{ route('password.request') }}" class="ancher_link">Forgot Password?</a></div>
                            @endif
                            <!-- <div class="new_account">
                                <p class="link_text">Don't have an Account? </p> <a title="Register" href="/register" class="ancher_link">Sign-up</a></p>
                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<!-- <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
    grecaptcha.ready(function() { grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', { action: 'login'}).then(function(token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
            }
        });
    });
</script> -->
@endpush