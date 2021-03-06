<?php
/*
Template Name: All Content
Template Post Type: page
*/
// Page code here..
 get_header();?>

<main>
  <section class="section section-gray">
    <div class="container">
      <div class="section-header">
        <h5><?php the_title();?></h5>
      </div>

      <!-- Posts feed -->

        <?php echo do_shortcode('[ajax_load_more scroll="false" button_label="Load more" transition_container="false" container_type="div" css_classes="feed-posts" post_type="post" posts_per_page="15" tag__not_in="26" category__not_in="1"]'); ?>
    </div>  <!-- Container -->
  </section>  <!-- Section -->
</main>
<?php get_footer();?>
