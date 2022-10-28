<header role="header" class="container">
        <!-- logo -->
        <div style="display: flex;">
            <h1>

                <a href="/home" title="avana LLC"><img src="images/logo.png" title="avana LLC"
                        alt="avana LLC" /></a>

            </h1>
            <!-- logo -->
            <?php 
                if(isset($_SESSION['user'])){
                    if($sameAuthor){
                        include '../Views/partials/header/postAuthor.php';
                    }else{
                        include '../Views/partials/header/logged.php';
                    }
                    
                }else{
                  include '../Views/partials/header/visitor.php';
                }
            ?>
           
        </div>
    </header>