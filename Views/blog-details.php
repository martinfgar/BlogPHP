<!DOCTYPE HTML>

<html>

<head>

<?php include '../Views/partials/head.php'?>
<title>Post</title>
</head>



<body>

    <?php if (isset($_SESSION['user'])){
        $sameAuthor = $_SESSION['user']->id == $post->user_id;
    } ?>

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

                    <img src='data:image/jpeg;base64,<?php try{echo $post->image;}catch(Exception $e){}?>' alt="" class="img-responsive" />

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

        <?php include '../Views/partials/footer.php'?>
    </footer>

    <!-- footer -->

    <?php include '../Views/partials/scripts.php' ?>

</body>

</html>