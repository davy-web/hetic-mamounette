
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


	if(get_the_category())
	$categories = get_the_category()[0]->name; 
  else
    $categories = "";
?>


<section class="post-page">
	<article id="post-<?php the_ID(); ?>" <?php post_class("post-page__article mb-20"); ?>>
		<div class="entry-content">
		
		<header class="mb-10 entry-header">
			<div class="flex items-center justify-between post-page__header">
				<p class="mb-4 text-6xl lg:text-8xl font-pacifico ">
					<?= the_title(); ?>
				</p>
				<?php if($origin): ?>
					<div class="flex text-2xl font-light uppercase item-center post-page__origin card__category"><?= $origin_description;?> &nbsp; <?= $origin;?></div>
				<?php endif; ?>
			</div>
			<hr>


			
			<div class="post-page__taxos">
				<div class="flex flex-col flex-wrap items-center justify-between lg:w-1/2 lg:flex-row">
					<?php if($level): ?>
						<div class="my-2">
							<p class="uppercase text-md">Niveau de difficulté : <span class="ml-4 text-lg font-bold text-secondary"><?= strtolower($level) ?></span> </p>
						</div>
					<?php endif; ?>
					<?php if($cost): ?>
						<div class="my-2">
							<p class="uppercase text-md">Coût moyen :<span class="ml-4 text-lg"><?= $cost ?></span> </p>
						</div>
					<?php endif; ?>
					<?php if($setup_time): ?>
						<div class="my-2">
							<p class="uppercase text-md">Temps de préparation :<span class="ml-4 text-lg"><?= $setup_time ?></span> </p>
						</div> 
					<?php endif; ?>
				</div>
			</div>
			<hr>
		</header>
			<div class="grid grid-cols-1 gap-12 mx-auto mt-12 mb-32 post-page__img lg:grid-cols-2">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="relative">
						<img class="rounded-md" src="<?= the_post_thumbnail_url('listing-card') ?>" alt="<?php the_title(); ?>">
						<?php if($categories): ?>
							<div class="absolute z-10 inline-flex px-6 py-4 text-2xl font-bold text-white uppercase border rounded-md cursor-pointer animate-pulse top-8 left-8 border-primary bg-primary-light hover:bg-primary card__category"><?php echo $categories; ?></div>
						<?php endif; ?>
					</div>
				<?php } ?>
				<div class="post-page__content">

					<?php the_content(); ?>
					
				</div>
				
			</div>
	
		</div>
	
	</article>



	<!-- Voir aussi nos derniers articles -->
	<?php get_template_part( 'template-parts/see_also' ); ?> 

</section>





