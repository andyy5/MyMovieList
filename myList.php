<!DOCTYPE html>
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

</head>

<body>

    <div class="brand">MyMovieList</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">MyMovieList</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="myList.php">My List</a>
                    </li>
                    <li>
                        <a href="reviews.php">Reviews</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Edit my list</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <center><p>Movie Name&nbsp;&nbsp;&nbsp;&nbsp;Rating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status
                    </p></center>
                    <form method="POST" action="myList.php">
                    <center><p>Add a movie: 
                        <input type="text" name="AddMovieName" size="12" placeholder="Movie Name" required>
                        <select name="AddMovieRating" required>
                          <option value=""></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                        <select name="AddMovieStatus" required>
                          <option value=""></option>
                          <option value="completed">Completed</option>
                          <option value="plan to watch">Plan to Watch</option>
                          <option value="dropped">Dropped</option>
                        </select>
                        <input type="submit" value="add" name="btnAdd">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p></center>
                </form>
                <form method="POST" action="myList.php">
                    <center><p>Update a movie: 
                        <input type="text" name="UpdateMovieName" size="12" placeholder="Movie Name" required>
                        <select name="UpdateMovieRating" required>
                          <option value=""></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                        <select name="UpdateMovieStatus" required>
                          <option value=""></option>
                          <option value="completed">Completed</option>
                          <option value="plan to watch">Plan to Watch</option>
                          <option value="dropped">Dropped</option>
                        </select>
                        <input type="submit" value="update" name="btnUpdate">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p></center>
                </form>
                <form method="POST" action="myList.php">
                    <center><p>Remove a movie: 
                        <input type="text" name="RemoveMovieName" size="12" placeholder="Movie Name" required>
                        <input type="submit" value="remove" name="btnRemove">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p></center>
                </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Filter</strong>
                    </h2>
                    <hr>
                    <center><p>Rating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Column&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center>
                    <form method="POST" action="myList.php">
                        <center><p>
                        <select name="FilterListRating">
                          <option value=""></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                        <select name="FilterListStatus">
                          <option value=""></option>
                          <option value="completed">Completed</option>
                          <option value="plan to watch">Plan to Watch</option>
                          <option value="dropped">Dropped</option>
                        </select>
                        <select name="FilterListColumn">
                          <option value=""></option>
                          <option value="name">Movie</option>
                          <option value="Rating">Rating</option>
                          <option value="Status">Status</option>
                        </select>
                        <input type="submit" value="filter" name="btnFilter">
                        <input type="submit" value="clear" name="btnClear">
                    </p></center>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>My List</strong>
                    </h2>
                    <hr>
                    <center><?php include 'myListLogic.php'; ?></center>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Stats</strong>
                    </h2>
                    <hr>
                    <center><?php include 'myListStats.php'; ?></center>
                </div>
            </div>
        </div>

    </div>

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>

    $('.error-modal-btn').on('click', function () {
    $('.error-modal').remove();
    });

    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>