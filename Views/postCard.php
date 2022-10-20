<li>

<section class="blog-content">

    <a href='<?php echo "/blog?id=$post->id" ?>'>

        <figure>

            <div class="post-date">

                               
                <span><?php echo $post->created_at ?> </span>

            </div>

            <img src='/Static/images/posts/<?php echo "$post->image" ?>' alt="" class="img-responsive" />

        </figure>

    </a>

    <article>
        <?php echo $post->title ?>
    </article>

</section>

</li>