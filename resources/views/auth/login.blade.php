@extends('auth.layout')
@section('title', 'Login')
@section('content')
<style>
.card{

    margin-bottom:0px;
}
</style>
<section class="row flexbox-container">
	<div class="col-xl-8 col-11 d-flex justify-content-center">
		<div class="card bg-authentication rounded-0 mb-0">
			<div class="row m-0">
				<div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
				  <img src="/admin/login.png" alt="{{ config('app.name') }}" />
				</div>
				<div class="col-lg-6 col-12 p-0">
					<div class="card rounded-0 mb-20 px-2">
						<div class="card-header pb-1">
							<div class="card-title">
								<h4 class="mb-0">{{ __('Library Admin Login') }}</h4>
							</div>
						</div>
						<p class="px-2">Welcome back, please login to your account.</p>
						<div class="card-content" style="padding-bottom:10px;">
							<div class="card-body pt-1">
								<form method="POST" action="{{ route('login') }}">
                  @csrf
                  <fieldset class="form-label-group form-group position-relative has-icon-left">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      <div class="form-control-position">
                          <i class="feather icon-mail"></i>
                      </div>
                      <label for="email">{{ __('E-Mail Address') }}</label>
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </fieldset>
									<fieldset class="form-label-group position-relative has-icon-left">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
                      <div class="form-control-position">
                          <i class="feather icon-lock"></i>
                      </div>
                      <label for="password">{{ __('Password') }}</label>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </fieldset>
				<!-- <div class="form-group d-flex justify-content-between align-items-center">
                      <div class="text-left">
                          <fieldset class="checkbox">
                              <div class="vs-checkbox-con vs-checkbox-primary">
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                  <span class="vs-checkbox">
                                      <span class="vs-checkbox--check">
                                          <i class="vs-icon feather icon-check"></i>
                                      </span>
                                  </span>
                                  <span class="" for="remember">{{ __('Remember Me') }}</span>
                              </div>
                          </fieldset>
                      </div>
                      <div class="text-right">
                          @if (Route::has('password.request'))
                          <a class="card-link" href="{{ route('password.request') }}">
                              {{ __('Forgot Your Password?') }}
                          </a> 
                          @endif
                      </div>
                  </div> -->
              
                  <button type="submit" class="btn btn-primary float-right btn-inline">{{ __('Login') }}</button>
								</form>
							</div>
            </div>
           
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection