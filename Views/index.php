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

    <link rel="shortcut icon" href="Static/images/favicon.ico" type="image/x-icon">



    <!-- style -->

    <link href="Static/css/style.css" rel="stylesheet" type="text/css">

    <!-- style -->

    <!-- bootstrap -->

    <link href="Static/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- responsive -->

    <link href="Static/css/responsive.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="Static/css/fonts.css" rel="stylesheet" type="text/css">

    <link href="Static/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="Static/css/effects/normalize.css" rel="stylesheet" type="text/css">

    <link href="Static/css/effects/component.css" rel="stylesheet" type="text/css">

</head>
<body>
    <!-- header -->
    <header role="header" class="container">
        <!-- logo -->
        <div style="display: flex;">
            <h1>

                <a href="/home" title="avana LLC"><img src="Static/images/logo.png" title="avana LLC"
                        alt="avana LLC" /></a>

            </h1>
            <!-- logo -->
            <a href="/login" style="margin-left: auto;"><img src="Static/images/person.svg" alt=""></a>
        </div>
    </header>

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
                    for ($i=0;$i<count($posts)/2;$i++){
                        $post = $posts[$i];
                        require 'postCard.php';
                    }
                    
                   ?>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <ul class="grid-lod effect-2" id="grid">

                <?php 
                    for ($i=count($posts)/2;$i<count($posts);$i++){
                        $post = $posts[$i];
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

            <a href="/home" title="avana LLC"><img src="Static/images/logo.png" title="avana LLC" alt="avana LLC" /></a>

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

    <script src="Static/js/jquery.min.js" type="text/javascript"></script>

    <!-- custom -->

    <script src="Static/js/nav.js" type="text/javascript"></script>

    <script src="Static/js/custom.js" type="text/javascript"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="Static/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="Static/js/effects/masonry.pkgd.min.js" type="text/javascript"></script>

    <script src="Static/js/effects/imagesloaded.js" type="text/javascript"></script>

    <script src="Static/js/effects/classie.js" type="text/javascript"></script>

    <script src="Static/js/effects/AnimOnScroll.js" type="text/javascript"></script>

    <script src="Static/js/effects/modernizr.custom.js"></script>

    <!-- jquery.countdown -->

    <script src="Static/js/html5shiv.js" type="text/javascript"></script>

</body>

</html>