<!DOCTYPE html>
<html lang="en">

<head>
  <title>login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/login.styles.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/0439b6ee0f.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="login-wrapper">
    <img class="auth-back-logo" src="./assets/Gtour_logo.png" alt="logo" />


    <div class="login-container">
      <div class="left">
        <a href="index.php" class="login-home-btn">
          <i class="fa-solid fa-house"></i>
          <p>HOME</p>
        </a>
      </div>
      <div class="right">
        <div class="login-header">Login</div>
        <form class="login-body" method="post" action="./auth_loading.php">
          <input hidden name="type" value="login" />
          <input hidden name="name" value="" />

          <div class="input-wrapper">
            <i class="fa-solid fa-envelope input-wrapper-icon "></i>
            <input placeholder="Email" name="email" type="email" />
          </div>

          <div class="input-wrapper">
            <i class="fa-sharp fa-solid fa-key input-wrapper-icon"></i>
            <input name="password" placeholder="Password" type="password" id="login-password" />
            <i class="fa-sharp fa-solid fa-eye Password-visiblity" id="login-password-btn"></i>
          </div>

          <a href="./forgotPassword.php" class="forgot-pass-link">Forgot Password ?</a>

          <button type="submit">SUBMIT</button>

        </form>


        <footer>
          <p>don't have an Account?</p>
          <a href="./register.php">SIGN UP</a>
        </footer>
      </div>
    </div>
  </div>
  <script src="./scripts//login.js"></script>
</body>

</html>