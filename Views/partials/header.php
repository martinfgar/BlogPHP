<header role="header" class="container">
        <!-- logo -->
        <div style="display: flex;">
            <h1 style="margin-right:auto">

                <a href="/home" title="avana LLC"><img src="images/logo.png" title="avana LLC"
                        alt="avana LLC" /></a>

            </h1>
            <!-- logo -->
            <?php 
                
                if(isset($_SESSION['user'])){
                    if ($_SESSION['user']->rol == 1){
                        include '../Views/partials/header/admin.php';
                    }
                    if($sameAuthor){
                        include '../Views/partials/header/postAuthor.php';
                    }
                    include '../Views/partials/header/logged.php';
                    
                }else{
                  include '../Views/partials/header/visitor.php';
                }
            ?>
           
        </div>
    </header>