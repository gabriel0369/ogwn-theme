<?php
/*
Template Name: Search Page
*/
?>

<?php get_header();?>

<main>
  <section class="section section-gray">
    <div class="container">
      <div class="section-header">
        <h5>Search: <?php echo get_search_query(); ?></h5>
      </div>

      <!-- Posts feed -->
<?php echo do_shortcode('[ajax_load_more transition_container="false" container_type="div" css_classes="feed-posts" post_type="post" posts_per_page="15" search="'. get_search_query() .'" tag__not_in="26"  category__not_in="1"]') ?><!-- Posts feed -->
    </div>
  </section>
</main>
<?php get_footer();?>
