<?php
/*
Template Name: Search Page
*/
?>
<?php
get_header(); ?>

<div class="wrap searchpage container">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <h1 class="text-8xl mb-10 ">Tapez ce que vous voulez, Mamounette fera le reste. </h1>

      <form class="mr-6 w-full" action="/">
        <div class="relative text-gray-600  ">
          <input type="search" aria-label="Search" name="s" value="<?= get_search_query() ?>" placeholder="Tartiflette..." class="w-full bg-light h-14 px-5 pr-10 rounded-full text-sm focus:outline-none rounded-lg">
          <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
          </svg>
          </button>
        </div>
      </form>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();