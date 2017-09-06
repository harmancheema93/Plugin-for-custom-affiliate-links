<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php



	/* Template Name: Show Ads */



?>

<?php get_header(); ?>


<!-- CONTENT -->

<div class="rh-container"> 

    <div class="rh-content-wrap clearfix">

        <!-- Main Side -->

        <div class="main-side page clearfix">

            <div class="title"><h1><?php the_title(); ?></h1></div>
			<?php
if ( is_user_logged_in() ) {?>
			<h2>Links</h2>
           <?php echo do_shortcode('[show-Ad]'); ?>
		 </div>	
<?php } else {
	echo "<center><h1> You must login first</h1></center>";
 }?>

        <!-- /Main Side -->  

        <!-- Sidebar -->

        <?php get_sidebar(); ?>

        <!-- /Sidebar --> 

    </div>

</div>

<!-- /CONTENT -->     

<!-- FOOTER -->

<?php get_footer(); ?>