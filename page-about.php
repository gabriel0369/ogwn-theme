<?php get_header();?>


<section class="section section-gray section-about">
  <div class="container">

    <div class="section-header">
      <h5><?php the_title();?></h5>
    </div>


    <?php if (have_posts()) : while(have_posts()) : the_post();?>

      <?php the_content();?>

    <?php endwhile; endif;?>


  </div>
</section>


<?php get_footer();?>
