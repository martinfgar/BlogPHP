<?php

namespace App\Views;
?>
<!DOCTYPE HTML>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <meta charset="utf-8">

    <!-- Description, Keywords and Author -->

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Post Creation</title>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">



    <!-- style -->

    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- style -->

    <!-- bootstrap -->

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- responsive -->

    <link href="css/responsive.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="css/fonts.css" rel="stylesheet" type="text/css">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="css/effects/normalize.css" rel="stylesheet" type="text/css">

    <link href="css/effects/component.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- header -->
    <?php include '../Views/partials/header.php' ?>


    <main role="main-inner-wrapper" class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 commentys-form">

                <form action="index.php" method="POST"  enctype="multipart/form-data">
                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Whats your post about?" required>
                    </div>
                    

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="brief">Brief</label>
                        <textarea name="brief" cols="" rows="" placeholder="" required></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="content">Content</label>
                        <textarea name="content" cols="" rows="" placeholder="" required></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="image" class="form-label" >Image</label>
                        <input type="file" class="form-control" accept="image/png, image/jpeg" name="image" id="image" hidden required>
                    </div>

                    <div class="col-12 text-center">
                        <input id="item" name="item" value="post" hidden>
                        <button class="btn btn-danger form-control" type="submit">Publish Post</button>
                    </div>

                </form>

            </div>


        </div>

    </main>

    <!-- main -->

    <!-- footer -->

    <footer role="footer">

        <!-- logo -->

        <h1>

            <a href="/home" title="avana LLC"><img src="images/logo.png" title="avana LLC" alt="avana LLC" /></a>

        </h1>

        <!-- logo -->



        <ul role="social-icons">

            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>

            <li><a href="#"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>

        </ul>

        <p class="copy-right">&copy; 2015 avana LLC.. All rights Resved</p>

    </footer>

    <!-- footer -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="js/jquery.min.js" type="text/javascript"></script>

    <!-- custom -->

    <script src="js/nav.js" type="text/javascript"></script>

    <script src="js/custom.js" type="text/javascript"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <script src="js/effects/masonry.pkgd.min.js" type="text/javascript"></script>

    <script src="js/effects/imagesloaded.js" type="text/javascript"></script>

    <script src="js/effects/classie.js" type="text/javascript"></script>

    <script src="js/effects/AnimOnScroll.js" type="text/javascript"></script>

    <script src="js/effects/modernizr.custom.js"></script>

    <!-- jquery.countdown -->

    <script src="js/html5shiv.js" type="text/javascript"></script>

</body>

</html>