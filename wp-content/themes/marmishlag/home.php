<?php get_header(); ?>

<?php get_template_part( 'template-parts/hero' ); ?> 



<div class="grid grid-cols-1 gap-12 mx-auto mt-12 mb-24 list-articles lg:grid-cols-2 index-page">

  
  
  </div>
  
  <?php get_template_part( 'template-parts/see_also_best-seller' ); ?> 
  <?php get_template_part( 'template-parts/see_also' ); ?> 
  <?php get_template_part( 'template-parts/see_also_faster' ); ?> 
  <?php get_template_part( 'template-parts/see_also_cheaper' ); ?> 

<?= mamounettePaginateLinks() ?>





<?php get_footer(); ?>