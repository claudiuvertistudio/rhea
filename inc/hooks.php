<?php

// Testimonials hooks
remove_action( 'zerif_testimonials_header_title', 'zerif_testimonials_header_title_function' );
add_action( 'zerif_testimonials_header_title', 'rhea_testimonials_header_title_function' );

function rhea_testimonials_header_title_function() {

	$zerif_testimonials_title = get_theme_mod('zerif_testimonials_title',__('Testimonials','rhea'));

	if( !empty($zerif_testimonials_title) ):

		echo '<h2>'.wp_kses_post( $zerif_testimonials_title ).'</h2>';

	elseif ( is_customize_preview() ):

		echo '<h2 class="zerif_hidden_if_not_customizer"></h2>';

	endif;

}


remove_action( 'zerif_testimonials_header_subtitle', 'zerif_testimonials_header_subtitle_function' );
add_action( 'zerif_testimonials_header_subtitle', 'rhea_testimonials_header_subtitle_function' );

function rhea_testimonials_header_subtitle_function() {

	$zerif_testimonials_subtitle = get_theme_mod('zerif_testimonials_subtitle');

	if( !empty($zerif_testimonials_subtitle) ):

		echo '<h6 class="section-legend">'.wp_kses_post( $zerif_testimonials_subtitle ).'</h6>';

	elseif ( is_customize_preview() ):

		echo '<h6 class="section-legend zerif_hidden_if_not_customizer"></h6>';

	endif;

}

// PRO
$currentTheme = wp_get_theme();
$currentThemeName = $currentTheme->parent();
if ( $currentThemeName == 'Zerif PRO' ) {
	add_filter( 'zerif_portofolio_box_underline_color_filter', 'rhea_primary_color' );
	add_filter( 'zerif_aboutus_background_filter', 'rhea_white_color' );
	add_filter( 'zerif_testimonials_background_filter', 'rhea_white_color' );
	add_filter( 'zerif_footer_widgets_title_filter', 'rhea_text_color' );
	add_filter( 'zerif_testimonials_header_filter', 'rhea_text_color' );
	add_filter( 'zerif_links_color_hover_filter', 'rhea_primary_color' );
	add_filter( 'zerif_footer_widgets_title_border_bottom_filter', 'rhea_primary_color' );
	add_filter( 'zerif_ourteam_background_filter', 'rhea_blue_color' );
	add_filter( 'zerif_testimonials_box_color_filter', 'rhea_blue_color' );
	add_filter( 'zerif_navbar_color_filter', 'rhea_darker_color' );
	add_filter( 'zerif_ribbon_button_background_filter', 'rhea_primary_color' );
	add_filter( 'zerif_ribbon_button_background_hover_filter', 'rhea_white_color' );
	add_filter( 'zerif_ribbon_button_button_color_filter', 'rhea_white_color' );
	add_filter( 'zerif_ribbon_button_button_color_hover_filter', 'rhea_primary_color' );
	add_filter( 'zerif_ribbon_background_filter', 'rhea_blue_color' );
	add_filter( 'zerif_ribbonright_background_filter', 'rhea_primary_color' );


	add_filter( 'zerif_contacus_background_filters', 'rhea_white_color' );
	add_filter( 'zerif_contacus_header_filter', 'rhea_text_color' );
	add_filter( 'zerif_contacus_button_background_filter', 'rhea_primary_color' );
	add_filter( 'zerif_contacus_button_background_hover_filter', 'rhea_blue_color' );
	add_filter( 'zerif_contacus_button_color_hover_filter', 'rhea_primary_color' );

	add_filter( 'zerif_ribbonright_button_background_filter', 'rhea_transparent_color' );
	add_filter( 'zerif_ribbonright_button_background_hover_filter', 'rhea_white_color' );
	add_filter( 'zerif_ribbonright_button_button_color_hover_filter', 'rhea_primary_color' );

	// Package Section 
	add_filter( 'zerif_packages_background_filter', 'rhea_blue_color' );
	add_filter( 'zerif_packages_header_filter', 'rhea_text_color' );
	add_filter( 'zerif_package_price_background_color_filter', 'rhea_darker_color' );

	// Subscribe Section 
	add_filter( 'zerif_subscribe_background_filter', 'rhea_primary_color' );



	add_filter( 'zerif_footer_socials_hover_filter', 'rhea_primary_color' );
	add_filter( 'zerif_ourteam_socials_hover_filter', 'rhea_primary_color' );
	add_filter( 'zerif_titles_bottomborder_color_filter', 'rhea_primary_color' );

	function rhea_primary_color() {
		return '#2bb6b6';
	}
	function rhea_white_color() {
		return '#fff';
	}
	function rhea_text_color() {
		return '#404040';
	}
	function rhea_darker_color() {
		return 'rgb(35, 40, 45)';
	}
	function rhea_blue_color() {
		return '#f4f7f9';
	}
	function rhea_transparent_color() {
		return 'rgba( 255,255,255,0 )';
	}
}

/*
 * Remove footer address, phone and email sections by making the default values empty
 */
add_filter( 'zerif_address_default_filter','rhea_empty_footer_sections' );
add_filter( 'zerif_address_icon_default_filter','rhea_empty_footer_sections' );
add_filter( 'zerif_email_default_filter','rhea_empty_footer_sections' );
add_filter( 'zerif_email_icon_default_filter','rhea_empty_footer_sections' );
add_filter( 'zerif_phone_default_filter','rhea_empty_footer_sections' );
add_filter( 'zerif_phone_icon_default_filter','rhea_empty_footer_sections' );

function rhea_empty_footer_sections() {
	return '';
}

/* Add custom id to the header tag */
add_filter( 'zerif_header_id_filter','zerif_header_id_filter_function' );
function zerif_header_id_filter_function() {
	return 'sticky-header';
}

/* Add custom class to the header tag */
add_filter( 'zerif_header_class_filter','zerif_header_class_filter_function' );
function zerif_header_class_filter_function() {
	return 'holder-header';
}

/* Close the header tag sooner */
add_action( 'zerif_bottom_header','zerif_bottom_header_function' );
function zerif_bottom_header_function() {
	echo '</header>';
}

/* Display the homepage top menu */
add_action( 'zerif_before_header','zerif_before_header_function' );
function zerif_before_header_function() {
	if ( has_nav_menu('homepage-top') ) {
		echo '<div class="full-navigation">';
		echo '<nav>';
		wp_nav_menu( array('theme_location' => 'homepage-top', 'container' => false, 'menu_class' => 'main-nav-list' ) );
		echo '</nav>';
		echo '</div>';
	}
}

/* Add a second button in Ribbon with bottom button */
add_action( 'zerif_ribbon_with_bottom_button_after_button','zerif_ribbon_with_bottom_button_after_button_function' );
function zerif_ribbon_with_bottom_button_after_button_function() {
	$rhea_second_button_label = get_theme_mod('rhea_second_button_label');
	$rhea_second_button_link = get_theme_mod('rhea_second_button_link');
	if ( $rhea_second_button_label && $rhea_second_button_link ) {
		echo '<div data-scrollreveal="enter right after 0s over 1s" class="zerif-buttons-container">';
			echo '<a href="'.esc_url( $rhea_second_button_link ).'" class="btn btn-primary custom-button outline-btn right-button">'.wp_kses_post( $rhea_second_button_label ).'</a>';
		echo '</div>';
	}elseif ( is_customize_preview() ) {
		echo '<div data-scrollreveal="enter right after 0s over 1s" class="zerif-buttons-container zerif_hidden_if_not_customizer">';
			echo '<a href="" class="btn btn-primary custom-button outline-btn right-button"></a>';
		echo '</div>';
	}
}