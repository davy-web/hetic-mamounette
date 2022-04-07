<?php
/**
 * Template Name: Login
 * Template Post Type: page
 */
?>


<?php get_header(); ?>

<section class="overflow-hidden">
		<div class="lg:flex justify-center items-center">
			<div class="lg:w-1/2 xl:max-w-screen-sm form__section">
				<div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24">
					<div>
						<ul class="nav flex justify-around">
							<li class="signin-active text-center text-lg text-dark font-display font-semibold lg:text-left xl:text-3xl
							xl:text-bold"><a class="btn">Se connecter</a></li>
							<li class="signup-inactive text-center text-lg text-dark font-display font-semibold lg:text-left xl:text-3xl
							xl:text-bold"><a class="btn">S'inscrire</a></li>
						</ul>
					</div>
					<div class="mt-12">
						<form class="form-signin" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post" name="form">
							<div>
								<input class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg" type="text" placeholder="Your username" name="log">
							</div>
							<div class="mt-8">
								<input class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg" type="password" placeholder="Enter your password" name="pwd">
								<div>
									<a class="px-5 text-xs font-display font-semibold text-dark hover:text-indigo-800
									cursor-pointer">
										Mot de passe oublié ?
									</a>
								</div>
							</div>
							<div class="mt-10">
								<button class="bg-primary text-light p-4 w-full rounded-full tracking-wide rounded-lg
								font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-primary
								shadow-lg">
									Log In
								</button>
							</div>
							<div class="mt-6 text-sm font-display font-semibold text-gray-700 text-center">
								Vous n'avez pas de compte ? <a class="cursor-pointer text-primary hover:text-primary">S'inscrire</a>
							</div>

                            <input type="hidden" value="<?php echo esc_attr( "/" ); ?>" name="redirect_to">
                            <input type="hidden" value="1" name="testcookie">

						</form>
						<form class="form-signup" action="<?php echo home_url().'/signup'; ?>" method="post" name="form">
							<div>
								<input class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg" type="" placeholder="Votre username" name="user_login">
							</div>
                            <div class="mt-8">

                                <input class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg" type="" placeholder="Votre email" name="user_email">
                            </div>
							<div class="mt-8">

								<input class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg" type="" placeholder="Votre mot de passe" name="user_pass">
							</div>
							<div class="mt-8">
								<input class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg" type="" placeholder="Comfirmez le mot de passe" name="user_pass">
								<div class="flex justify-between items-center">
									<div>
										<a class="px-5 text-xs font-display font-semibold text-dark hover:text-indigo-800
										cursor-pointer">
											Mot de passe oublié ?
										</a>
									</div>
								</div>
							</div>
							<div class="mt-10">
								<button class="bg-primary text-light p-4 w-full rounded-full tracking-wide rounded-lg
								font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-primary
								shadow-lg">
									S'inscrire
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</section>


<?php get_footer(); ?>