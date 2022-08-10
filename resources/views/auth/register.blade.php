@extends('layouts.layout')
@prepend('head-data')
<title>Register - CMA | CS | CA | Students | Online classes</title>
<meta name="description" content="Learn from India's top CMA, CS & CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA, CS & CA.">
<meta name="keywords" content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend
@section('content')

<style>
    footer.ftco-footer.ftco-section {
        display: none;
    }
</style>



<section class="login_page register_pane">
    <div class="container">
        <div class="login_pane">
            <div class="wrap_flex">
                <h3 class=" ftco-animate fadeIn ftco-animated" data-animate-effect="fadeIn">Student Registration !</h3>
                <form class="login_form" method="POST" action="{{ route('register') }}">
                    <div class="logo_pane">
                        <a title="Toplad" class="login_logo" href="/"><img src="{{ asset('images/toplad-logo.svg') }}" alt="logo"></a>
                    </div>
                    <div class="wrap_fcontent">
                        <!-- <a href="/" class="home_jump"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>  Go Back Home</a> -->
                        @csrf
                        <input type="hidden" name="recaptcha" id="recaptcha">

                        <div class="inputs_data">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="new-password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input id="confirm-password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password" autofocus>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="request_type" value="{{ $_GET['type'] ?? 'normal' }}" placeholder="Confirm your password" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group btn_fgroup">
                            <button type="submit" class="btn btn-primary">Register</button>
                            <div class="new_account">
                                @if(isset($_GET['type']) && $_GET['type'] == 'checkout')
                                <p class="link_text">Already have an Account</p> <a title="Login" href="/student/checkout-login" class="ancher_link">Sign-in</a></p>
                                @else
                                <p class="link_text">Already have an Account</p> <a title="Login" href="/login" class="ancher_link">Sign-in</a></p>
                                @endif
                            </div>
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
    grecaptcha.ready(function() {grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'register'}).then(function(token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
            }
        });
    });
</script> -->
@endpush