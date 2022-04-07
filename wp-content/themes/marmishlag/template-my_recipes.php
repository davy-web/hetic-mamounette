<?php
/**
 * Template Name: My recipes
 * Template Post Type: page
 */

if (!is_user_logged_in()) {
    wp_redirect(home_url());
}

?>

<?php get_template_part( 'header' ); 
 ?>

<div class=" ">
  <div class="flex flex-row min-h-screen">
    <div class="sidebar w-full sm:w-1/3 md:w-1/4 px-2 has-light-background-color min-h-full">
      <div class="sticky top-28 p-4 w-full ">
          <!-- navigation -->
          <div class="my-10">
            <p class="sidebar__title text-8xl mb-10">Mon compte</p>
            <hr>
          </div>          
          <ul class="flex flex-col overflow-hidden">
            <a class="sidebar__link flex" href="/mon-compte">
              <span class="mr-2">🙋🏻‍♂️</span>
              <span>Mon compte</span>
            </a>
            <a class="sidebar__link flex" href="/creer-une-recette">
              <span class="mr-2">✍️</span>
              <span>Créer une recette</span></a>
            <a class="sidebar__link flex is-active" href="/mes-recettes">
              <span class="mr-2">🍽</span>
              <span>Mes recettes</span> 
            </a>
          </ul>
      </div>
    </div>
    <main role="main" class="w-full sm:w-2/3 md:w-3/4 pt-1 px-2">
      <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
        <div class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg">
        </div>
      </div>
    </main>
  </div>
</div>
