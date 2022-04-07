<?php

/**
 * Template Name: Account
 * Template Post Type: page
 */


if (!is_user_logged_in()) {
  wp_redirect(home_url());
}

?>
<?php get_template_part('header');
?>

<div class="">
  <div class="flex flex-row min-h-screen">
    <div class="w-full min-h-full px-2 sidebar sm:w-1/3 md:w-1/4 has-light-background-color">
      <div class="sticky w-full p-4 top-28 ">
        <!-- navigation -->
        <div class="my-10">
          <p class="mb-10 sidebar__title text-8xl">Mon compte</p>
          <hr>
        </div>
        <ul class="flex flex-col overflow-hidden">
          <a class="flex sidebar__link is-active" href="/mon-compte">
            <span class="mr-2">🙋🏻‍♂️</span>
            <span>Mon compte</span>
          </a>
          <a class="flex sidebar__link" href="/creer-une-recette">
            <span class="mr-2">✍️</span>
            <span>Créer une recette</span></a>
          <a class="flex sidebar__link" href="/wishlist">
            <span class="mr-2">🍽</span>
            <span>Mes recettes favorites </span>
          </a>
        </ul>
      </div>
    </div>
    <main role="main" class="w-full px-2 pt-1">
      <div class="w-full">
        <div class="relative p-8 bg-white rounded-lg shadow-lg">
          <p class="my-10 sidebar__title text-7xl username text-primary">
            <?php if (is_user_logged_in()) echo 'Bonjour ' . wp_get_current_user()->user_login ?>
          </p>
          <p class="username">
            <?= wp_get_current_user()->user_firstname .' '. wp_get_current_user()->user_lastname ?>
          </p>
          <hr>
          <p class="username">
            <?= 'Pseudo : ' . wp_get_current_user()->display_name ?>
          </p>
          <hr>
          <p class="username">
            <?= 'Mon adresse e-mail : ' . wp_get_current_user()->user_email ?>
          </p>
          <hr>
          <p class="username">
            <?= 'Membre depuis : ' . date( "d M Y", strtotime( wp_get_current_user()->user_registered ) ) ?>
          </p>
          <hr>
        </div>
      </div>
    </main>
  </div>
</div>