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
        
        <div class="jumbotron">
            <h1 class="display-4">Users</h1>
            <p class="lead">Rewrite the user´s datafields and click the check icon to update the user.</p>
            <hr class="my-4">
            
        </div>
        <table class="table">
            <thead style="position: sticky;top: 0" class="thead-dark">
                <tr>

                    <th class="header" scope="col">First name</th>
                    <th class="header" scope="col">Last name</th>
                    <th class="header" scope="col">Username</th>
                    <th class="header" scope="col">Email</th>
                    <th class="header" scope="col">Created at</th>
                    <th class="header" scope="col">Rol</th>
                    <th class="header" scope="col">Active</th>
                    <th class="header" scope="col">Posts</th>
                    <th class="header" scope="col"></th>
                    <th class="header" scope="col"></th>

                </tr>

            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                    echo "<tr><form action='index.php' method='POST'>
                        <input type='text' name='item' value='edituseradmin' hidden>
                        <input type='number' name='id' value='{$usuario->id}' hidden>
                        <td> <input type='text' name='first_name' value='{$usuario->first_name}'></input></td>
                        <td> <input type='text' name='last_name' value='{$usuario->last_name}'></input></td>
                        <td><input type='text' name='username' value='{$usuario->username}'></input></td>
                        <td><input type='text' name='email' value='{$usuario->email}'></input></td>
                        <td>{$usuario->created_at}</td>
                        <td><select name='rol'>
                        <option value='1'" . ($usuario->rol ? "selected" : "") . ">Admin</option>
                        <option value='0'" . ($usuario->rol ? '' : 'selected') . ">Editor</option>
                        </select>
                        <td><select name='active'>
                        <option value='1'" . ($usuario->active ? "selected" : "") . ">Yes</option>
                        <option value='0'" . ($usuario->active ? '' : 'selected') . ">No</option>
                        </select>
                        <td>" . count($usuario->posts()) . "</td>
                        <td> <a href='/deleteuser?id={$usuario->id}'><img src='images/delete.svg' alt='Delete User' title='Delete user'></a>
                        <td> <button class='btn' style='padding:0' type=submit><img src='images/check.svg' alt='Update User' title='Update user'></button>
                        </form></tr>";
                }
                ?>

            </tbody>
        </table>
        <div class="jumbotron">
            <h1 class="display-4">Posts</h1>
            <hr class="my-4">
            
        </div>
        <table class="table">
            <thead style="position: sticky;top: 0" class="thead-dark">
                <tr>

                    <th class="header" scope="col">Title</th>
                    <th class="header" scope="col">Created At</th>
                    <th class="header" scope="col">Status</th>
                    <th class="header" scope="col">Author</th>
                    <th class="header" scope="col">Comments</th>
                    <th class="header" scope="col"></th>

                </tr>

            </thead>
            <tbody>
                <?php
                foreach ($posts as $post) {
                    echo "<tr>
                        <td>{$post->title}</td>
                        <td>{$post->created_at}</td>
                        <td>{$post->status}</td>
                        <td>{$post->author()->first_name} {$post->author()->last_name}</td>
                        <td>".(count($post->comments()))."</td>
                        <td><a href='/deletepost?id={$post->id}'><img src='images/delete.svg' alt='Delete Post' title='Delete post'></a>     
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