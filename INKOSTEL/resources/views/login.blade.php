<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login.css">
  <title>Inkostel | Login</title>
</head>
<body>
  <div class="container">
    <!-- Login Start-->
    <div class="forms-container">
      <div class="signin-signup">
        <form action="{{route('loginPost')}}" method="POST" class="sign-in-form">
            @csrf 
          <img src="../img/logo_inkostel.png" alt="" class="logo">
          <h2 class="title">Log In</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" id="username" name="username" autofocus required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="password" name="password" required>
          </div>
          @if(session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
          @endif
          <input type="submit" value="Login" class="btn solid" id="loginButton">
        </form>
        <!-- Login End , Registration Start-->
        <form action="{{route('registration.post')}}" method="POST" class="sign-up-form">
        @csrf 
          <img src="../img/logo_inkostel.png" alt="" class="logo">
          <h2 class="title">Sign Up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" id="username" name="usernameReg" autofocus required>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" id="email" name="email" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="password" name="passwordReg" required>
          </div>
          <input type="submit" value="Sign up" class="btn solid">        
        </form>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Baru mengenal InKosTel?</h3>
          <p>Klik Sign Up dibawah ini untuk membuat akun dan bergabung dengan InKosTel</p>
          <button class="btn transparent" id="sign-up-btn">Sign up</button>
        </div>
        <img src="../img/signin.svg" class="image" alt="">
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>Udah punya akun?</h3>
          <p>Klik Log In dibawah dengan akun yang pernah dibuat sebelumnya</p>
          <button class="btn transparent" id="sign-in-btn">Sign in</button>
        </div>
        <img src="../img/signup.svg" class="image" alt="">
    </div>
  </div>
  <script src="../js/login.js"></script>
</body>
</html>