<?php

   ////////////////////////////////////////////////////////////////////////////
   // Template from: https://www.tutorialspoint.com/php/php_login_example.htm//
   ////////////////////////////////////////////////////////////////////////////

   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang="en">

<head>

    <!--
    BOOTSTRAP TEMPLATE FROM: https://startbootstrap.com/template-overviews/business-casual/
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BOOTSTRAP TEMPLATE FROM: https://startbootstrap.com/template-overviews/business-casual/">
    <meta name="author" content="">

    <title>MML</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>

</head>

<body>

    <div class="brand">MyMovieList</div>

    <br></br>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Login Page</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">

                    <div class = "container form-signin">

                     <?php

                     if (isset($_POST['login']) && !empty($_POST['username']) 
                        && !empty($_POST['password'])) {

                        if ($_POST['username'] == 'donald' && 
                           $_POST['password'] == '123') {
                           $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        // http://stackoverflow.com/questions/13266294
                        $str = $_POST['username'];

                        header("Location: index.php?user=".$str);
                        exit;
                     }
                  }
                  ?>
                    </div>

                    <form class = "form-signin" role = "form" 
                    action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                    ?>" method = "post">
                    <input type = "text" class = "form-control" 
                    name = "username" placeholder = "username" 
                    required autofocus></br>
                    <input type = "password" class = "form-control"
                    name = "password" placeholder = "password" required>
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                    name = "login">Login</button>
                 </form>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
