<?php
    namespace App\Views;
?>
<!DOCTYPE HTML>

<html>

<head>

    <?php include '../Views/partials/head.php'?>
    <title>Inicio</title>
</head>
<body>
    <!-- header -->
    <?php  include '../Views/partials/header.php' ?>
    

    <main role="main-inner-wrapper" class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">

                <article role="pge-title-content" class="blog-header">

                    <header>

                        <h2><span>Blog</span> Posts from our editors</h2>

                    </header>

                    <p>Get all the latest information from our bloggers.</p>

                </article>

                <ul class="grid-lod effect-2" id="grid">

                   <?php 
                        for ($i=1;$i<count($posts);$i = $i+2){
                            $post = $posts[$i];
                            require '../Views/partials/postCard.php';
                        }
                    
                   ?>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <ul class="grid-lod effect-2" id="grid">

                <?php 

                    for ($i=0;$i<count($posts);$i = $i+2){
                        $post = $posts[$i];
                        require '../Views/partials/postCard.php';
                    }
                   ?>

                </ul>

            </div>


        </div>

    </main>

    <!-- main -->

    <!-- footer -->

    <footer role="footer">

       <?php include '../Views/partials/footer.php'?>

    </footer>

    <!-- footer -->

    <?php include '../Views/partials/scripts.php' ?>

    

</body>

</html>