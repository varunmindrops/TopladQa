
    @extends('layouts.layout')
@section('content')

<style>
footer.ftco-footer.ftco-section
{
    display:none;
}
</style>

<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
    <section class="login_page">
        <div class="container">
            <div class="login_pane">
                <div class="wrap_flex">
                    <h3 class=" ftco-animate fadeIn ftco-animated" data-animate-effect="fadeIn">Forgot Password</h3>
                    <form class="login_form"  method="POST" action="{{ route('login') }}">
                        <div class="logo_pane">
                            <a class="login_logo" href="/"><img src="https://demo.mindrops.com/raghav-academy/img/logo.png" alt="logo"></a>
                        </div>
                        <div class="wrap_fcontent">

                 
                            @csrf
                            <div class="inputs_data">
                                <div class="form-group">
                                    <label for="identify">Email or Contact</label>
                                    <input type="text" class="form-control  {{ $errors->has('email') || $errors->has('phone') ? 'is-invalid' : '' }}" name="login" id="login" value="{{ old('email') ?: old('phone') }}" placeholder="Enter your email or contact" required autofocus>
                                    @if( $errors->has('email') || $errors->has('phone') )
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') ?: $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!-- <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Enter your password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> -->
                            </div>
                            <div class="form-group btn_fgroup">
                                <button type="submit" class="btn btn-primary">Send</button>
                                <div class="new_account">
                                <p class="link_text">Don't have an Account </p> <a href="/register" class="ancher_link">Sign-up</a></p></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @endsection
