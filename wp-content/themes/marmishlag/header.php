<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>


	<div id="page" class="relative h-screen overflow-scroll lg:overflow-visible lg:h-auto">


		<header class="sticky top-0 left-0 z-30 transition duration-200 bg-white header shadow-greyDarkerMedium ">
			<nav class="container flex items-center justify-between py-6 ">
				<div class="header__logo min-h-[24px] min-w-max">
					<a href="<?php echo get_bloginfo('url'); ?>">
						<img class="h-16 cursor-pointer" src="<?= get_template_directory_uri(); ?>/img/logo.png" alt="" />
						<?php the_custom_logo(); ?>
					</a>
				</div>
				<div id="header__center" class="absolute left-0 z-50 flex flex-col-reverse justify-end w-full h-screen p-12 transition-all duration-300 translate-x-full lg:flex-row lg:translate-x-0 lg:static top-28 bg-light lg:bg-transparent lg:w-auto lg:h-auto lg:p-0 ">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'header',
							'container'       => 'div',
							'container_id'    => '',
							'container_class' => 'lg:flex items-center space-x-10  ',
							'container_aria_label' => '??',
							'menu_id'              => 'header__ul',
							'menu_class'           => 'lg:flex hidden items-center lg:space-x-10 py-12 lg:py-0',
							'li_class'        => 'text-sm hover:text-red-500 transition duration-200 cursor-pointer',
							'fallback_cb'     => false,
							'walker'         => new Mamounette_dropdown_menu
						)
					); ?>
					<form class="w-auto mt-6 header__form lg:mt-0 lg:ml-20 lg:mr-8" action="/">
						<div class="relative w-auto text-gray-600 ">
							<input type="search" aria-label="Search" name="s" value="<?= get_search_query() ?>" placeholder="Search" class="w-full px-5 pr-10 text-lg bg-white rounded-lg rounded-full lg:bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary">
							<button type="submit" class="absolute top-0 right-0 mt-5 mr-4">
								<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
								</svg>
							</button>
						</div>
					</form>
				</div>

				<div class="flex justify-end top ">
					<div class="flex items-center justify-end w-full">
						<!-- Wishlist -->
						<div class="mr-4 text-secondary hover:text-secondary">
							<a href="/wishlist">
								<?php echo is_user_logged_in() ? '            <svg width="26" height="26" viewBox="0 0 48 48" fill="none" class="" xmlns="http://www.w3.org/2000/svg">
								<path d="M15 8C8.925 8 4 12.925 4 19C4 30 17 40 24 42.326C31 40 44 30 44 19C44 12.925 39.075 8 33 8C29.28 8 25.99 9.847 24 12.674C22.9857 11.2292 21.6382 10.0501 20.0715 9.23649C18.5049 8.42289 16.7653 7.99875 15 8Z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								' : '	'
								?>
							</a>
						</div>

						<div class="flex items-center justify-end w-full transition duration-200 cursor-pointer lg:w-auto hover:text-secondary">
							<!-- log in -->
							<?php echo is_user_logged_in() ? '<svg class="w-10 h-10 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M15.1801 10.94C15.3801 10.5 15.5001 10.02 15.5001 9.5C15.5001 7.57 13.9301 6 12.0001 6C11.4801 6 11.0001 6.12 10.5601 6.32L15.1801 10.94Z" />
						<path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 15C9.68 15 7.55 15.8 5.86 17.12C4.65692 15.6853 3.9983 13.8723 4 12C4 10.15 4.63 8.45 5.69 7.1L8.55 9.96C8.6493 10.7182 8.99626 11.4223 9.53696 11.963C10.0777 12.5037 10.7818 12.8507 11.54 12.95L13.74 15.15C13.17 15.05 12.59 15 12 15ZM18.31 16.9L7.1 5.69C8.49686 4.59177 10.2231 3.99639 12 4C16.42 4 20 7.58 20 12C20 13.85 19.37 15.54 18.31 16.9Z" />
						</svg>
						' : '						<svg class="w-10 h-10 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM12 19.2C10.8119 19.2 9.64218 18.906 8.59528 18.3441C7.54837 17.7823 6.65678 16.9701 6 15.98C6.03 13.99 10 12.9 12 12.9C13.99 12.9 17.97 13.99 18 15.98C17.3432 16.9701 16.4516 17.7823 15.4047 18.3441C14.3578 18.906 13.1881 19.2 12 19.2Z"/>
						</svg>'

							?>
							<div>
								<p class="username">
									<?php if (is_user_logged_in()) echo 'Bonjour ' . wp_get_current_user()->user_login ?>
								</p>
								<?php echo is_user_logged_in() ? '<a href="/logout" class="hidden text-md md:flex">Se déconnecter</a>' : '<a href="login" class="hidden text-lg md:flex">Se connecter</a>' ?>
							</div>
						</div>
					</div>
					<div id="nav-burger" class="flex items-center ml-3 lg:hidden">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
						</svg>
					</div>
				</div>
			</nav>
		</header>


		<?php
		if (!is_page_template(array('template-account.php', 'template-my_recipes.php', 'template-create_recipe.php'))) {
			$container = 'container';
		} else {
			$container = '';
		}
		?>
		<div id="content" class="site-content flex-grow <?= $container; ?>
  min-h-[80vh] ">

			<main>