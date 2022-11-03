<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../Views/partials/head.php' ?>
    <title>New User</title>
</head>

<body>
    <?php include '../Views/partials/header.php' ?>
    <main role="main-inner-wrapper" class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="usernameHelp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" id="first_name" aria-describedby="usernameHelp">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" id="last_name" aria-describedby="usernameHelp">
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                    </div>
                    <div>
                        <small id="emailHelp" class="form-text text-muted">Changing the default "root" password is advised</small>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>


            </div>


        </div>

    </main>

    <footer role="footer">
        <?php include '../Views/partials/footer.php' ?>
    </footer>
    <?php include '../Views/partials/scripts.php' ?>
</body>

</html>