<div class="commentys-form">

    <h4>Leave a comment</h4>

    <div class="row">

        <form action="index.php" method="POST">
            <div class="clearfix"></div>
            
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