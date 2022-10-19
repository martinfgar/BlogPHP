<li>

<section class="blog-content">

    <a href="blog-details.html">

        <figure>

            <div class="post-date">

                               
                <span><?php $post->created_at ?> </span> July 2016

            </div>

            <img src='<?php echo "data:image/png;base64,$post->image" ?>' alt="" class="img-responsive" />

        </figure>

    </a>

    <article>

        <?php echo $post->title ?>
        This is a sample news post title content or sample post heading.

    </article>

</section>

</li>