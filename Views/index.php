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



    <title>Inicio</title>

    <link rel="shortcut icon" href="Views/images/favicon.ico" type="image/x-icon">



    <!-- style -->

    <link href="Views/css/style.css" rel="stylesheet" type="text/css">

    <!-- style -->

    <!-- bootstrap -->

    <link href="Views/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- responsive -->

    <link href="Views/css/responsive.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="Views/css/fonts.css" rel="stylesheet" type="text/css">

    <link href="Views/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="Views/css/effects/normalize.css" rel="stylesheet" type="text/css">

    <link href="Views/css/effects/component.css" rel="stylesheet" type="text/css">

</head>



<body>



    <!-- header -->

    <header role="header" class="container">



        <!-- logo -->
        <div style="display: flex;">
            <h1>

                <a href="/home" title="avana LLC"><img src="Views/images/logo.png" title="avana LLC"
                        alt="avana LLC" /></a>

            </h1>
            <!-- logo -->
            <a href="/login" style="margin-left: auto;"><img src="Views/images/person.svg" alt=""></a>
        </div>
    </header>

    <!-- header -->

    <!-- main -->

    <main role="main-inner-wrapper" class="container">



        <div class="row">



            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">

                <article role="pge-title-content" class="blog-header">

                    <header>

                        <h2><span>News</span> Updates from studio</h2>

                    </header>

                    <p>Get all information about our studio from latest news posts & updates page.</p>

                </article>

                <ul class="grid-lod effect-2" id="grid">

                   <?php 
                    for($i=0;$i<4;$i++){
                     require 'postCard.php';
                    }
                   ?>
                </ul>

            </div>



            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <ul class="grid-lod effect-2" id="grid">

                <?php 
                    for($i=0;$i<4;$i++){
                     require 'postCard.php';
                    }
                   ?>

                </ul>

            </div>


        </div>

    </main>

    <!-- main -->

    <!-- footer -->

    <footer role="footer">

        <!-- logo -->

        <h1>

            <a href="/home" title="avana LLC"><img src="Views/images/logo.png" title="avana LLC" alt="avana LLC" /></a>

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

    <script src="Views/js/jquery.min.js" type="text/javascript"></script>

    <!-- custom -->

    <script src="Views/js/nav.js" type="text/javascript"></script>

    <script src="Views/js/custom.js" type="text/javascript"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="Views/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="Views/js/effects/masonry.pkgd.min.js" type="text/javascript"></script>

    <script src="Views/js/effects/imagesloaded.js" type="text/javascript"></script>

    <script src="Views/js/effects/classie.js" type="text/javascript"></script>

    <script src="Views/js/effects/AnimOnScroll.js" type="text/javascript"></script>

    <script src="Views/js/effects/modernizr.custom.js"></script>

    <!-- jquery.countdown -->

    <script src="Views/js/html5shiv.js" type="text/javascript"></script>

</body>

</html>