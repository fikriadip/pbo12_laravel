@extends('template.sign_in')
@section('content')
<section>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login') }}">
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
                        <input type="password" name="password" placeholder="Password" autocomplete="on" />
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
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>LOGIN BLOG FIKRIES</h3>
                    <p>Information System And Articles</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <img src="{{ asset('Signin/img/log.svg') }}" class="image" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
@include('sweetalert::alert')
@endsection