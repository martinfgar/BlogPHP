<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../Views/partials/head.php' ?>
    <title>All users</title>
    <link rel="stylesheet" href="css/stylePanel.css">
</head>

<body>
    <!-- header -->
    <?php include '../Views/partials/header.php' ?>
    <main role="main-inner-wrapper" class="container">
        <table class="table">
            <thead style="position: sticky;top: 0" class="thead-dark">
                <tr>

                    <th class="header" scope="col">First name</th>
                    <th class="header" scope="col">Last name</th>
                    <th class="header" scope="col">Username</th>
                    <th class="header" scope="col">Email</th>
                    <th class="header" scope="col">Created at</th>
                    <th class="header" scope="col">Rol</th>
                    <th class="header" scope="col">Posts</th>
                    <th class="header" scope="col"></th>
                    <th class="header" scope="col"></th>

                </tr>

            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {

                    echo "<tr>
                        <td>" . $usuario->first_name . "</td>"
                        . "<td>" . $usuario->last_name. "</td>"
                        . "<td>" . $usuario->username. "</td>"
                        . "<td>" . $usuario->email . "</td>"
                        . "<td>" . $usuario->created_at . "</td>"
                        . "<td>" . ($usuario->rol ?'Admin':'Usuario normal') . "</td>"
                        . "<td>" . count($usuario->posts()) . "</td>"
                    . "<td> <a href='/deleteuser?id={$usuario->id}'><img src='images/delete.svg' alt='Delete User' title='Delete user'></a>
                        </tr>";

                }
                ?>
            </tbody>
        </table>
    </main>
    <footer role="footer">
        <?php include '../Views/partials/footer.php' ?>
    </footer>
    <?php include '../Views/partials/scripts.php' ?>

</body>

</html>