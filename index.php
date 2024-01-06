<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PIGS&PIGGIES BANKING LIMITED</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link
      rel="icon"
      type="image/png"
      href="./loginStuff/images/icons/favicon.ico"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./loginStuff/vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./loginStuff/fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./loginStuff/vendor/animate/animate.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./loginStuff/vendor/css-hamburgers/hamburgers.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./loginStuff/vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./loginStuff/css/util.css" />
    <link rel="stylesheet" type="text/css" href="./loginStuff/css/main.css" />
    <link rel="stylesheet" type="text/css" href="./css/msg.css" />
    <!--===============================================================================================-->
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
            <img src="./assets/pigs.png" alt="IMG" />
          </div>
          <form class="login100-form validate-form" action="<?= "./logic/login.php" ?>" method="post">
            <span class="login100-form-title"> Member Login </span>
            <?php require __DIR__."/logic/msg.php";  ?>
            <div
              class="wrap-input100 validate-input"
              data-validate="Valid email is required: ex@abc.xyz"
            >
              <input
                class="input100"
                type="text"
                name="user"
                placeholder="User Name"
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>

            <div
              class="wrap-input100 validate-input"
              data-validate="Password is required"
            >
              <input
                class="input100"
                type="pass"
                name="pass"
                placeholder="Password"
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn" type="submit">Login</button>
            </div>

            <div class="text-center p-t-136"></div>
          </form>
        </div>
      </div>
    </div>

    <!--===============================================================================================-->
    <script src="./loginStuff/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="./loginStuff/vendor/bootstrap/js/popper.js"></script>
    <script src="./loginStuff/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="./loginStuff/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="./loginStuff/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
      $(".js-tilt").tilt({
        scale: 1.1,
      });
    </script>
    <!--===============================================================================================-->
    <script src="./loginStuff/js/main.js"></script>
    <script src="./loginStuff/js/my.js"></script>
  </body>
</html>
