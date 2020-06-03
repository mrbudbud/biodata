<?php

session_start();

require 'Functions.php';

// cek cookie
// if(isset($_COOKIE['id']) && isset($_COOKIE['key']) )
// {
//   $id = $_COOKIE['id'];
//   $key = $_COOKIE['key'];

//   $result = mysqli_query($conn, "SELECT email FROM users WHERE id = $id");
//   $row    = mysqli_fetch_assoc ($result);

//   // cek cookie and email
//   if($key === hash('sha256', $row['email']) )
//   {
//     $_SESSION['login'] = true;
//   }

// }

// cek session
if (isset($_SESSION["login"]))
{
  header("Location: index.php");
  exit;
}


if (isset($_POST["login"]))
{

  $email = $_POST["email"];
  $password = $_POST["password"];

  $result =  mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' and password = '$password' ");

  // cek email
  if(mysqli_num_rows($result) === 1 )
  {
    // cek password
    $row = mysqli_fetch_assoc($result);

    if( $row['email'] == $email && $row['password'] == $password)
    {
      // set session 
      $_SESSION["login"] = true;

      //  cek remember me
      if( isset($_POST['remember']))
      {
        // make cookie
        setcookie('id', $row['id'], time() + 60 );
        setcookie('key', hash('sha256', $row['id']), time() + 60 );
      }

      header("location: index.php");
    }else
    {
      echo "Filed login";
    }


  }
  $error = true;

}

?>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="app.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                  Login
                </div>

                <?php if(isset($error)): ?>
                  <h5 class="text-danger font-italic">Wrong Password / Email </h5>
                <?php endif; ?>

                <div class="links">
                  <form action="" method="post">
                    <div class="form-group">
                      <input type="email" name="email" id="email1" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group ">
                      <input type="password" name="password" id="password" class="form-control"  placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="remember" id="remember" class="form-check-input">
                      <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <button type="submit" id="login" name="login" class="btn btn-primary">Login</button>
                  </form>
                </div>
            </div>
        </div>
    </body>
</html>
