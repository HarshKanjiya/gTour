<!DOCTYPE html>
<html lang="en">

<head>
  <title>forgot password</title>
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
      <div class="right">
        <div class="login-header">Password Recovery</div>
        <form class="login-body">
          <p>Enter your Email</p>
          <div class="input-wrapper">
            <i class="fa-solid fa-envelope input-wrapper-icon "></i>
            <input placeholder="Email" type="email" />
          </div>
          <button type="submit">SUBMIT</button>
        </form>
        <footer style="justify-content: start">
          <a href="./login.php">Login</a>
        </footer>
      </div>
      <div class="left forgot-password-sideImg"></div>
    </div>
  </div>
  <script src="./scripts//login.js"></script>
</body>

</html>