<?php global $post;
 $author_id= $post->post_author; ?>
<li class="feed-post featured-post">
  <!-- post thumbnail -->
  <div class="feed-post-thumb">
    <a href="<?php the_permalink() ?>" rel="bookmark" class="feed-post-thumb-a" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
  </div>

  <!-- post info -->
  <!-- <div class="feed-post-info-flex featured-post-info-flex"> -->



    <div class="feed-post-info">
      <a href="<?php the_permalink(); ?>" rel="bookmark" class="feed-post-title-link"><span class="feed-post-title" title="<?php echo get_the_title(); ?>"><?php echo get_the_title();?></span></a>
      <div class="feed-post-info-author">
      <a class="feed-post-avatar" title="<?php echo get_author_name($author_id);?>" href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_avatar( $author_id, '60' );?></a>
      <a class="feed-post-author-name" title="<?php echo get_author_name($author_id);?>" href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_author_name($author_id);?></a>
      </div>
    </div>

  <!-- </div> -->

</li>
