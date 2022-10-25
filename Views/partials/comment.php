<li>


    <section>

        <h4> <?php echo $comment->name ?></h4>

        <div class="date-pan"><?php echo date("F d,Y",strtotime($comment->created_at))?> </div>

        <?php 
            $cont = preg_split('/\r\n|\r|\n/', $comment->comment);
            foreach($cont as $parag){
                echo "<p>";
                echo $parag;
                echo "</p>";
            } 
        ?>

    </section>



</li>