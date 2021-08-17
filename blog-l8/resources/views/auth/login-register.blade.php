@extends('template.sign_in')
@section('content')
<section>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                    @csrf
                    <h2 class="title">Sign in</h2>
                    <div class="input-field validate-input @error('username') alert-validate @enderror"
                        data-validate="@error('username')  {{ $message }} @enderror">
                        <span class="icon_focus">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" placeholder="Username" name="username"
                            value="{{ old('username') }}" />
                        <span class="focus-input100"></span>
                    </div>
                    <div class="input-field validate-input @error('password') alert-validate @enderror"
                        data-validate="@error('password')  {{ $message }} @enderror">
                        <span class="icon_focus">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" placeholder="Password" />
                        <span class="focus-input100"></span>
                    </div>
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    <input type="submit" class="btn solid" value="LOGIN">
                </form>

                <form action="/register" method="POST" enctype="multipart/form-data" class="sign-up-form">
                    @csrf
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <span class="icon_focus">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="username" placeholder="Enter Username" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="input-field">
                        <span class="icon_focus">
                            <i class="fas fa-address-card"></i>
                        </span>
                        <input type="text" name="name" placeholder="Enter Full Name" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="input-field">
                        <span class="icon_focus">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" placeholder="Enter Email" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="input-field">
                        <span class="icon_focus">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" placeholder="Enter Password" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="input-field">
                        <span class="icon_focus">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password_confirmation" placeholder="Enter Confirm Password"
                            required autocomplete="new-password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="input-field">
                        <span class="icon_focus">
                            <i class="fas fa-image"></i>
                        </span>
                        <input type="file" class="input-custom" name="photo" lang="es" required>
                        <span class="focus-input100"></span>
                    </div>
                    <input type="submit" class="btn" value="Register" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>CREATORS LOGIN BLOG</h3>
                    <p>Don't Have An Account Yet ? Click Sign Up Below To Create Account</p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign Up
                    </button>
                </div>
                <img src="{{ asset('signin_signup/img/log.svg') }}" class="image"
                    alt="Image Login" />
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>ONE OF US ?</h3>
                    <p>
                        Click Sign In Below To Log In As A Creator
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign In
                    </button>
                </div>
                <img src="{{ asset('signin_signup/img/register.svg') }}" class="image"
                    alt="Image Register" />
            </div>
        </div>
    </div>
</section>
@endsection