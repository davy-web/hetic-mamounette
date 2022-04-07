<?php 
$taxonomies_origin = get_the_terms(get_the_ID(), 'origin'); 
$taxonomies_level = get_the_terms(get_the_ID(), 'level'); 
$taxonomies_cost = get_the_terms(get_the_ID(), 'cost'); 
$taxonomies_setup_time = get_the_terms(get_the_ID(), 'setup_time'); 

if($taxonomies_origin || $taxonomies_level || $taxonomies_cost || $taxonomies_setup_time ) {
  $origin = $taxonomies_origin[0]->name;
  $origin_description = $taxonomies_origin[0]->description;
  $level = $taxonomies_level[0]->name;
  $cost = $taxonomies_cost[0]->name;
  $setup_time = $taxonomies_setup_time[0]->name;
  } else {
    $origin = '';
    $origin_description = '';
    $level = '';
    $cost = '';
    $setup_time = '';
  }
?>



<article <?php post_class("c-card w-full md:w-auto shadow-greyDarkerMedium rounded-md  relative transition duration-300 hover:scale-[1.02] group"); ?> id="post-<?php the_ID(); ?>" > 
  <a href="<?php esc_url( the_permalink() ) ?>" data-id="post-<?php the_ID(); ?>"  class="flex w-full min-h-full">
    <?php if ( has_post_thumbnail() ) { ?>
      <div class="relative w-2/4 bg-center bg-cover rounded-md" style="background-image: url('<?= the_post_thumbnail_url('listing-card') ?>'); ">
    <?php } else { ?>

    <div class="relative w-2/4 bg-center bg-cover rounded-md" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/gazpacho.jpeg');">
    <?php } ?>
      <div class="absolute z-10 flex items-center justify-center w-16 h-16 overflow-hidden shadow s-like-badge rounded-xl -top-8 -right-8 ">
      <?php if($args["class"] == "cardIsLove"){ ?> 
        <input type="checkbox" name="like-badge-<?php the_ID(); ?>" id="like-badge-<?php the_ID(); ?>" checked data-id="<?php the_ID(); ?>" class="appearance-none  like-badge-<?php the_ID(); ?>" >
        <? } else { ?> 
          <input type="checkbox" name="like-badge-<?php the_ID(); ?>" id="like-badge-<?php the_ID(); ?>"  data-id="<?php the_ID(); ?>" class="appearance-none  like-badge-<?php the_ID(); ?>" >
        <?php } ?>
        <div class="w-16 h-16 card-likeable like-badge-<?php the_ID(); ?>">    
          <div class="p-3 cursor-pointer rounded-xl">
            <svg width="26" height="26" viewBox="0 0 48 48" fill="none" class="" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 8C8.925 8 4 12.925 4 19C4 30 17 40 24 42.326C31 40 44 30 44 19C44 12.925 39.075 8 33 8C29.28 8 25.99 9.847 24 12.674C22.9857 11.2292 21.6382 10.0501 20.0715 9.23649C18.5049 8.42289 16.7653 7.99875 15 8Z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
      </div>
    </div>
  
    <div class="flex flex-col justify-between w-2/4 px-8 py-6 md:min-w-2/4">
      <?php if($origin): ?>
        <div class="absolute flex font-light uppercase card__category top-6 right-8 "><?php echo $origin_description;?> &nbsp; <?php echo $origin;?></div>
      <?php endif; ?>

      <div class="c-card__header">
        <h3 class="mt-6 text-4xl transition-colors card__title group-hover:has-primary-text-color"><?php the_title(); ?></h3>
        <hr>
        <div class="mb-5 card__excerpt"><?php the_excerpt(__('(voir plus…)')); ?></div>
      </div>
      <div class="flex flex-col justify-between c-card__content">
        <div class="flex flex-col flex-wrap justify-between lg:flex-row">
          <?php if($level): ?>
            <div class="my-2">
              <p class="uppercase"><span><?= strtolower($level) ?></span> </p>
            </div>
          <?php endif; ?>
          <?php if($cost): ?>
            <div class="my-2">
              <p class="text-xl"><span><?= $cost ?></span> </p>
            </div>
          <?php endif; ?>
          <?php if($setup_time): ?>
            <div class="my-2">
              <p class=""><span><?= $setup_time ?></span> </p>
            </div> 
          <?php endif; ?>
        </div>
      </div>
    </div>
  </a>
  </article>


