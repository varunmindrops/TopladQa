
    @extends('layouts.layout')
@section('content')

<style>
footer.ftco-footer.ftco-section
{
    display:none;
}
</style>


    <section class="login_page">
        <div class="container">
            <div class="login_pane">
                <div class="wrap_flex">
                    <h3 class=" ftco-animate fadeIn ftco-animated" data-animate-effect="fadeIn">Forgot Password</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="login_form"  method="POST" action="{{ route('password.email') }}">
                        <div class="logo_pane">
                            <a title="Toplad" class="login_logo" href="/"><img src="{{ asset('images/toplad-logo.svg') }}" alt="logo"></a>
                        </div>
                        <div class="wrap_fcontent">

                            @csrf
                            <div class="inputs_data">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group btn_fgroup">
                                <button type="submit" class="btn btn-primary">Click to Reset Password</button>
                                <!-- <div class="new_account">
                                <p class="link_text">Don't have an Account? </p> <a href="/register" class="ancher_link">Sign-up</a></p></div>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @endsection
