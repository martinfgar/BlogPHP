<?php

namespace App\Views;
?>
<!DOCTYPE HTML>

<html>

<head>

<?php include '../Views/partials/head.php'?>
<title>New Post</title>
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
                        <input type="text" name="title" id="title" placeholder="Whats your post about?" value="<?php if (isset($post)){echo $post->title;} ?>" required>
                    </div>
                    
                    <?php if (isset($post)){
                        echo "<input type='number' name='id' value='{$post->id}' hidden>";
                    }?>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="brief">Brief</label>
                        <textarea name="brief" cols="" rows="" placeholder=""  required><?php if (isset($post)){echo $post->brief;} ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="content">Content</label>
                        <textarea name="content" cols="" rows="" placeholder="" required><?php if (isset($post)){echo $post->content;} ?></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="image" class="form-label" >Image</label>
                        <input type="file" class="form-control" accept="image/png, image/jpeg" name="image" id="image" hidden>
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

        <?php include '../Views/partials/footer.php'?>
    </footer>

    <?php include '../Views/partials/scripts.php'?>

</body>

</html>