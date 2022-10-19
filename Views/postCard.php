<li>

<section class="blog-content">

    <a href='<?php echo "/blog?id=$post->id" ?>'>

        <figure>

            <div class="post-date">

                               
                <span><?php $post->created_at ?> </span>

            </div>

            <img src='<?php echo "data:image/png;base64,$post->image" ?>' alt="" class="img-responsive" />

        </figure>

    </a>

    <article>
        <?php echo $post->title ?>
    </article>

</section>

</li>