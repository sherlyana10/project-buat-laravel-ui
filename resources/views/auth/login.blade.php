@extends('layouts.app')

@section('content')
<style>
* {
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    margin: 0;
}

/* BACKGROUND */
.login-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #f1f5f9, #e5e7eb);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* CARD */
.login-card {
    width: 380px;
    background: #ffffff;
    border-radius: 16px;
    padding: 36px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

/* TITLE */
.login-card h2 {
    text-align: center;
    margin-bottom: 25px;
    font-weight: 600;
    color: #111827;
}

/* FORM */
.login-card label {
    font-size: 14px;
    margin-bottom: 6px;
    display: block;
    color: #374151;
}

.login-card input {
    width: 100%;
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    margin-bottom: 14px;
    outline: none;
}

.login-card input:focus {
    border-color: #6366f1;
}

.remember {
    display: inline-flex;
    align-items: center;
    gap: 3px;          /* super rapet */
    margin-bottom: 20px;
    font-size: 14px;
    color: #374151;
}

.remember input[type="checkbox"] {
    margin: 0;
    width: 14px;
    height: 14px;
    flex-shrink: 0;
}

.remember span {
    margin: 0;
    padding: 0;
    line-height: 1;
}



/* BUTTON */
.btn-login {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 10px;
    background: #111827;
    color: #ffffff;
    font-weight: 600;
    cursor: pointer;
}

.btn-login:hover {
    background: #000000;
}

/* LINK */
.forgot {
    display: block;
    text-align: center;
    margin-top: 14px;
    font-size: 13px;
    color: #6b7280;
    text-decoration: none;
}

/* ERROR */
.error {
    font-size: 12px;
    color: #dc2626;
    margin-bottom: 10px;
    display: block;
}
</style>

<div class="login-page">
    <div class="login-card">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label>Email</label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   placeholder="Email">

            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror

            <label>Password</label>
            <input type="password"
                   name="password"
                   required
                   placeholder="Password">

            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror

<div class="remember">
    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
    <span>Remember me</span>
</div>



            <button type="submit" class="btn-login">
                Login
            </button>

            @if (Route::has('password.request'))
                <a class="forgot" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            @endif
        </form>
    </div>
</div>
@endsection
