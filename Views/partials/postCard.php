<li>

<section class="blog-content">

    <a href='<?php echo "/blog?id=$post->id" ?>'>

        <figure>

            <div class="post-date">

            <?php echo date("F",strtotime($post->created_at)) ?>       
            <span><?php echo date("d",strtotime($post->created_at)) ?> </span>

            </div>

            <img src='data:image/jpeg;base64,<?php try{echo base64_encode($post->image);}catch(Exception $e){}?>' alt="" class="img-responsive" />

        </figure>

    </a>

    <article>
        <?php echo $post->title ?>
    </article>

</section>

</li>