

<?php get_header(); 
?>

<p class="mt-16 mb-32 text-9xl">Bienvenue en Italie </p>

<div class="grid grid-cols-1 gap-12 mt-12 mb-24 list-articles lg:grid-cols-2">
<?php
  
  $loop = new WP_Query(array(
    'post_type'  => array('recette'),
    'tax_query' => array(
      array(
        'taxonomy' => 'origin',
        'field' => 'slug',
        'terms' => 'origin_italia' // you need to know the term_id of your term "example 1"
         )
    )    
  
  ));

  if ( $loop->have_posts() ) :

    /* Start the Loop */
    while ( $loop->have_posts() ) :
      $loop->the_post();

      get_template_part( 'template-parts/card', get_post_type() );

    endwhile;

  else :

    get_template_part( 'template-parts/content', 'none' );

  endif;
?>

</div>

<?php get_footer(); ?>