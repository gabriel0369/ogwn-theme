<?php get_header();?>

<main  role=”main”>

  <section class="section section-gray" id="livefeed-featured-section">
    <div id="livefeed-featured" class="container">
      <!-- Twitch player -->
      <div class="live-player-container">
      <!-- Gets and trims website url for twitch iframe &parent -->
<?php
$site_url = get_site_url();
$site_url_trim = substr($site_url,8);
?>
      <div class="iframe-container">
        <iframe class="iframe" src="https://player.twitch.tv/?channel=onegreatworknetwork&parent=<?php echo $site_url_trim; ?>&parent=<?php echo $site_url_trim; ?>" frameborder="0" allowfullscreen="true" scrolling="no" width="100%" height="300px"></iframe>
      </div>
      <div class="live-title">
      </div>
  </div>
    <!-- Featured Content -->
  <div class="feed-container container" id="featured-container">

    <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
    		<?php dynamic_sidebar( 'home_right_1' ); ?>
    	</div><!-- #primary-sidebar -->
    <?php endif; ?>

</div>  <!-- feed-container -->


</div>  <!-- livefeed-featured container -->
</section>  <!-- livefeed-featured section -->

    <!-- Content Creators -->
<section class="section" id="content-creators-section">
  <div class="container">

    <div class="section-header">
      <h5>CONTENT CREATORS</h5>
    </div>

<div class="author-list">

    <?php
// The Query
$user_query = new WP_User_Query( array( 'role' => 'content-creator' ) );

// User Loop
if ( ! empty( $user_query->get_results() ) ) {
	foreach ( $user_query->get_results() as $user ) {
    echo "<div class='user'>";
    echo '<a href="/author/';
    echo the_author_meta('nickname',$user->ID);
    echo '">';
    echo get_avatar($user->ID, 300);
    echo "</a>";

    echo '<a href="/author/';
    echo the_author_meta('nickname',$user->ID);
    echo '">';
    the_author_meta('display_name',$user->ID);
    echo "</a>";
    echo "</div>";
	}
} else {
	echo 'No users found.';
}
?>

</div>  <!-- end author list -->

</div> <!-- end container -->
</section> <!-- end section -->

</main>

<?php get_footer();?>
