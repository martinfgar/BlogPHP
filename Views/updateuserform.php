<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../Views/partials/head.php' ?>
    <title>Update your user</title>
</head>

<body>
    <?php include '../Views/partials/header.php' ?>
    <main role="main-inner-wrapper" class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form action="index.php" method="POST">
                 
                    <div class="form-group">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="usernameHelp" required value="<?php echo $_SESSION['user']->first_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="usernameHelp" required value="<?php echo $_SESSION['user']->last_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="current_password">Current password</label>
                        <input type="password" class="form-control" name="current_password" id="current_password" aria-describedby="usernameHelp" required>
                        <small> <b>Default password "root"</b> </small><br>
                        <small id="updateUserError" style="color:red"><?php if(isset($_SESSION['updateUserError'])){echo $_SESSION['updateUserError'];} ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">New password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="usernameHelp" required>
                    </div>
                   
                    <input type="text" id="item" name="item" value="updateUser" hidden>
    
                    <button type="submit" class="btn btn-danger">Save</button>
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