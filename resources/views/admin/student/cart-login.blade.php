
    @extends('layouts.layout')
    @prepend('head-data')
<title>Cart Login - CMA Students | CS Students | CA Students | Online classes</title>
<meta name="description" content="Learn from India's top CMA, CS & CA faculty at toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA, CS & CA.">
<meta name="keywords" content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend
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

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <section class="login_page">
        <div class="container">
            <div class="login_pane">
                <div class="wrap_flex">
                    <h3 class=" ftco-animate fadeIn ftco-animated" data-animate-effect="fadeIn">Welcome</h3>
                    <form class="login_form" method="POST" action="/student/checkout-login">
                        <div class="logo_pane">
                            <a title="Toplad" class="login_logo" href="/"><img src="{{ asset('images/toplad-logo.svg') }}" alt="logo"></a>
                        </div>
                        <div class="wrap_fcontent">
                        <!-- <a href="/" class="home_jump"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>  Go Back Home</a> -->
                            @csrf
                            <div class="inputs_data">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <!-- <div class="new_account">
                                    <p class="link_text">Don't have an Account? </p> <a href="/register?type=checkout" class="ancher_link">Sign-up</a></p>
                                </div> -->
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @endsection

