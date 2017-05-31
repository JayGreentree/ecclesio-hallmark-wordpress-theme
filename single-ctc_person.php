<?php
/*
Individual Person template.
Based on the Church Theme Framework and custom post type.
If you need to see all potential data, use something like print_r(ctfw_person_data());
*/
?>

<?php get_header(); ?>

<?php
	//print_r(ctfw_person_data());
	$person_fname		= wp_trim_words( get_the_title(), 1, '' );
	$person_position	= ctfw_person_data()['position'];
	$person_phone		= ctfw_person_data()['phone'];
	$person_email		= ctfw_person_data()['email'];
	$person_urls		= ctfw_person_data()['urls'];
?>

<div id="banner">
	<span class="overlay"></span>
	<?php echo '<img class="banner-bg" src="'.get_stylesheet_directory_uri().'/images/ft-worth.jpg" alt="">'; ?>
	<div class="banner-text">
		<?php
			if ( has_post_thumbnail() ) {
				echo '<span class="thumbnail person-thumb">';
					the_post_thumbnail('full');
				echo '</span>';
			}
		?>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php 
			if($person_position != "") {
				echo "<h3 class='page-byline'>$person_position</h3>";	
			}
		?>
	</div><!-- .banner-text -->
</div><!-- #banner -->
			
<div id="content">

	<div id="inner-content" class="row">
		
		<div id="sidebar" class="sidebar person large-3 medium-3 columns" role="complementary">
			<?php if( $person_phone || $person_email || $person_urls ) { ?>
				<h3>Contact <?php echo $person_fname; ?></h3>	
			<?php } ?>
			<p>
				<?php if($person_email) { ?>
					<i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo $person_email; ?>">Email</a>
					<br>
				<?php } ?>
				<?php if($person_phone) { ?>
					<i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo $person_phone; ?>"><?php echo $person_phone; ?></a>
					<br>
				<?php } ?>
			</p>
		</div>

		<main id="main" class="large-9 medium-9 columns" role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		    	<?php get_template_part( 'parts/loop', 'person' ); ?>
		    	
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>