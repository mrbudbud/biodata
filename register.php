<?php

require 'Functions.php';

if (isset($_POST["register"]))
{

  if (register($_POST) > 0 )
  {
    echo "<script>
            alert('User Added!');
          </script>
    ";
  } else
    {
      echo mysqli_error($conn);
    }

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
                  Register
                </div>

                <div class="links">
                  <form action="" method="post">
                    <div class="form-group">
                      <input type="email" name="email" id="email1" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group ">
                      <input type="password" name="password1" id="password1" class="form-control"  placeholder="Password">
                    </div>
                    <div class="form-group ">
                      <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password">
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </body>
</html>
