<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/login.styles.css" rel="stylesheet" />
  <link rel="icon" type="image/png" href="./assets/Gtour_fav.png" />
  <script src="https://kit.fontawesome.com/0439b6ee0f.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="login-wrapper">
    <img class="auth-back-logo" src="./assets/Gtour_logo.png" alt="logo" />
    <div class="login-container">
      <div class="left register-sideImg"></div>
      <div class="right">
        <div class="login-header">Sign UP</div>
        <form class="login-body" method="post" action="./auth_loading.php">
          <input hidden name="type" value="register" />
          <div class="input-wrapper">
            <i class="fa-solid fa-signature input-wrapper-icon "></i>
            <input placeholder="Name" type="text" name="name" required />
          </div>
          <div class="input-wrapper">
            <i class="fa-solid fa-envelope input-wrapper-icon "></i>
            <input placeholder="Email" type="email" name="email" required />
          </div>
          <div class="input-wrapper">
            <i class="fa-sharp fa-solid fa-key input-wrapper-icon"></i>
            <input placeholder="Password" type="password" id="login-password" name="password" />
            <i class="fa-sharp fa-solid fa-eye Password-visiblity" id="login-password-btn"></i>
          </div>
          <button type="submit">CREATE ACCOUNT</button>
        </form>
        <footer>
          <p>Already have an Account?</p>
          <a href="./login.php">LOG IN</a>
        </footer>
      </div>
    </div>
  </div>
  <script src="./scripts/login.js"></script>
</body>

</html>