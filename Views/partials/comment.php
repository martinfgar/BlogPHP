<li>


    <section>
        
        
        <h4 style="display:flex"> 
            <?php 
                echo '<span style="margin-right:auto">'.$comment->author()->first_name.' '.$comment->author()->last_name.'</span>'; 
                if (isset($_SESSION['user']) && ($_SESSION['user']->id == $comment->user_id || $_SESSION['user']->id == $post->user_id)){
                    echo "<a href='/deletecomment?id={$comment->id}'><img src='images/delete.svg' alt='Delete Comment' title='Delete comment'></a>";
                }
            ?>
        </h4>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->id == $comment->user_id){
            echo ' <small  class="text-muted">
            You can edit the comment by writing on the text itself and clicking the check icon.
            </small>';
        } ?>
       

        <div class="date-pan"><?php echo date("F d,Y",strtotime($comment->created_at))?> </div>
        
        <?php 
            if(isset($_SESSION['user']) && $_SESSION['user']->id == $comment->user_id){
                echo "<form style='display:flex' action='/comment-edit' method='POST'>
                <input type='text' value='{$comment->comment}' name='comment' style='margin-right:auto;width:80%'>
                <input type='number' name='id' value='{$comment->id}' hidden>
                <button class='btn' style='padding:0;' type=submit><img src='images/check.svg' alt='Update Comment' title='Update comment'></button>
                </form>"
                ;
            }else{
                echo $comment->comment;   
            }
            
        ?>

    </section>



</li>