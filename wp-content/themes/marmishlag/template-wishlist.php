<?php

/**
 * Template Name: Wishlist
 * Template Post Type: page
 */
?>
<?php get_template_part('header');
?>

<p class="mt-24 mb-32 text-9xl">Mes recettes favorites</p>

<div class="grid grid-cols-1 gap-12 mx-auto mt-12 mb-24 wishlist lg:grid-cols-2 list-articles index-page">


  <?php

  $tabID = test();

  ?>

  <?php $args = array(
    'post_type'         => 'recette',
  );
  $the_query = new WP_Query($args);

  // The Loop
  if ($the_query->have_posts()) {

    while ($the_query->have_posts()) {
      $the_query->the_post();
      if (in_array(get_the_ID(), $tabID)) {
        get_template_part(
          'template-parts/card',
          null,
          array(
            'class' => 'cardIsLove',
          )
        );
      }
    }
  }
  /* Restore original Post Data */
  wp_reset_postdata(); ?>

  <?= mamounettePaginateLinks() ?>
</div>


<?php get_template_part('template-parts/see_also'); ?>

<?php
get_footer();
