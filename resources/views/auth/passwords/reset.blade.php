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
                    <h3 class=" ftco-animate fadeIn ftco-animated" data-animate-effect="fadeIn">Reset Password</h3>
                    <form class="login_form"  method="POST" action="{{ route('password.update') }}">
                        <div class="logo_pane">
                            <a title="Toplad" class="login_logo" href="/"><img src="{{ asset('images/toplad-logo.svg') }}" alt="logo"></a>
                        </div>
                        <div class="wrap_fcontent">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="inputs_data">

                            <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Enter your email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Enter New Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter new password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm New Password</label>
                                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm new password" autofocus>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group btn_fgroup">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @endsection
