<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('template/login/login_style.css') }}">
</head>
<body>

    @if (session('errors'))
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @endif

    <div id="logo"> 
        <h1><i>LOGIN</i></h1>
    </div> 

    <section class="stark-login">
        <form action="{{ route('LoginProcessRoute') }}" method="POST" class="login100-form validate-form">
            @csrf    
            <div id="fade-box">
                <label for="username" style="margin-right: 300px; font-size: 20px;">Username</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password" style="margin-right: 300px; font-size: 20px;">Password</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit" style="width: 90px;">Login</button> 
            </div>
        </form>

        <div class="hexagons">
            <img src="http://i34.photobucket.com/albums/d133/RavenLionheart/NX-Desktop-BG.png" height="768px" width="1366px" alt="Background Image"/>
        </div>      
    </section> 

    <div id="circle1">
        <div id="inner-circle1">
            <h2></h2>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('template/login/main.js') }}"></script>
</body>
</html>
