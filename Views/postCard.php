<li>

<section class="blog-content">

    <a href='<?php echo "/blog?id=$post->id" ?>'>

        <figure>

            <div class="post-date">

            <?php echo date("F",strtotime($post->created_at)) ?>       
            <span><?php echo date("d",strtotime($post->created_at)) ?> </span>

            </div>

            <img src='/images/posts/<?php echo "$post->image" ?>' alt="" class="img-responsive" />

        </figure>

    </a>

    <article>
        <?php echo $post->title ?>
    </article>

</section>

</li>