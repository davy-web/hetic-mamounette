<?php get_header(); ?>

<p class="mt-24 mb-32 text-9xl">Toutes nos recettes</p>

<div class="grid grid-cols-1 grid-rows-5 gap-12 mx-auto mt-12 mb-24 lg:grid-cols-2 list-articles index-page">


	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/card' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?= mamounettePaginateLinks() ?>

<?php get_template_part( 'template-parts/see_also' ); ?> 


<?php
get_footer();
