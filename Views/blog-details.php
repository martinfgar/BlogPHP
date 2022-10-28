<!DOCTYPE HTML>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <meta charset="utf-8">

    <!-- Description, Keywords and Author -->

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Post</title>

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



    <?php  include '../Views/partials/header.php' ?>

    <!-- main -->

    <main role="main-inner-wrapper" class="container">



        <div class="blog-details">

            <article class="post-details" id="post-details">

                <header role="bog-header" class="bog-header text-center">
                    <h3>
                        <span>
                            <?php echo date("d", strtotime($post->created_at)) ?>
                        </span>
                        <?php echo date("F Y", strtotime($post->created_at))  ?>
                    </h3>
                    <h4>Author: <?php echo "{$author->first_name} {$author->last_name}" ?></h4>
                    <h2> <?php echo $post->title ?></h2>

                </header>



                <figure>

                    <img src='data:image/jpeg;base64,<?php try{echo base64_encode($post->image);}catch(Exception $e){}?>' alt="" class="img-responsive" />

                </figure>



                <div class="enter-content">

                    <?php
                    $cont = preg_split('/\r\n|\r|\n/', $post->content);
                    foreach ($cont as $parag) {
                        echo "<p>";
                        echo $parag;
                        echo "</p>";
                    }
                    ?>

                </div>

            </article>



            <!-- Comments -->

            <div class="comments-pan">

                <h3>Comments:</h3>

                <ul class="comments-reply">
                    <?php
                    foreach ($comments as $comment) {
                        include '../Views/partials/comment.php';
                    }
                    ?>

                </ul>



                <div class="commentys-form">

                    <h4>Leave a comment</h4>

                    <div class="row">

                        <form action="index.php" method="POST">
                            <div class="clearfix"></div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Who are you?">
                            </div>
                            <input type="number" name="post_id" value=<?php echo $post->id ?> hidden>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <textarea name="comment" cols="" rows="" placeholder="Whats in your mind"></textarea>

                            </div>

                            <div class="col-12 text-center m-3">
                                <input id="item" name="item" value="comment" hidden>
                                <button class="btn btn-danger form-control" type="submit">Post Comment</button>
                            </div>

                        </form>
                    </div>
                </div>
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

        <!-- nav -->

        <nav role="footer-nav">

            <ul>

                <li><a href="/home" title="Work">Work</a></li>

            </ul>

        </nav>

        <!-- nav -->

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