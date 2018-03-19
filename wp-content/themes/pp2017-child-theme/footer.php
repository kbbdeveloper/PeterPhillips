<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">

				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
					<div id="footer-content"><span id="footerDate">
					&copy; <script>new Date().getFullYear()>2010&&document.write(+new Date().getFullYear());</script>, Peter Phillips.</span><span id="footerSocialBlock"><a href="https://www.facebook.com/Peter-Phillips-115399398297/" target="_blank"><i class="footerSocialIcon fa fa-facebook-square" aria-hidden="true"></i></a><a href="https://www.instagram.com/peterphillipsartist/" target="_blank"><i class="footerSocialIcon fa fa-instagram" aria-hidden="true"></i></a></span>

				</div>
				<?php
					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
						get_template_part( 'includes/social_icons', 'footer' );
					}

					echo et_get_footer_credits();
				?>
				
					</div>	<!-- .container -->
				</div>

				
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>