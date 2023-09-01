<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      background: url('admin_image/blood-cells.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      height: 100%;
    }

    .container {
      position: relative;
      margin-top: 200px;
    }

    .form-container {
      position: inherit;
	  width: 80%;
      background: rgba(255, 255, 255, 0.5);
      padding: 20px;
      border-radius: 10px;
    }

    .font-italic {
      font-weight: bold;
    }
  </style>
</head>

<body>

  <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="container">
      <div class="row justify-content-center justify-content-mb-center">
      
        <div class="form-container">
          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-6 mb-6">
              <div class="font-italic">Username<span style="color:red">*</span></div>
              <div><input type="text" name="username" placeholder="Enter your username" class="form-control" value="" required></div>
            </div>
          </div>
          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-6 mb-6 "><br>
              <div class="font-italic">Password<span style="color:red">*</span></div>
              <div><input type="password" name="password" placeholder="Enter your Password" class="form-control" value="" required></div>
            </div>
          </div>

          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-4 mb-4 " style="text-align:center"><br>
              <div><input type="submit" name="login" class="btn btn-primary" value="LOGIN" style="cursor:pointer"></div>
            </div>
          </div>
			</div>
		</div>
          <br>
          <?php
          include 'conn.php';

          if (isset($_POST["login"])) {

            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);

            $sql = "SELECT * from admin_info where admin_username='$username' and admin_password='$password'";
            $result = mysqli_query($conn, $sql) or die("query failed.");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION["username"] = $username;
                header("Location: dashboard.php");
              }
            } else {
              echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </form>
</body>

</html>
