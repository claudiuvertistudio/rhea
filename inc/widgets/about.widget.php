<?php
class Rhea_About_Company extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'rhea-about-company',
			__( '[Rhea] About Company', 'rhea' )
		);
	}

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        $logo_url = '';
        if ( $instance['use_logo'] ) {
            $logo_url = get_theme_mod('zerif_logo');
        }else{
            $logo_url = $instance['image_uri'];
        }

        ?>

        <div class="rhea-about-company">
            <?php if ( $logo_url != '' ) { ?>
                <div class="rhea-company-logo">
                    <img src="<?php echo $logo_url ?>" alt="<?php echo esc_attr( get_bloginfo('title') ) ?>">
                </div>
            <?php } ?>
           <div class="rhea-company-description">
               <?php echo $instance['text'] ?>
           </div>
        </div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['image_uri'] = esc_url($new_instance['image_uri']);
		$instance['use_logo'] = strip_tags( $new_instance['use_logo'] );
        $instance['text'] = strip_tags($new_instance['text']);

        return $instance;

    }

    function form($instance) {
        ?>
        <p>
            <input type="checkbox" name="<?php echo $this->get_field_name('use_logo'); ?>" id="<?php echo $this->get_field_id('use_logo'); ?>" value="use_logo" <?php checked( $instance['use_logo'], 'use_logo' ); ?>>
            <label for="<?php echo $this->get_field_id('use_logo'); ?>"><?php _e('Use website logo','rhea'); ?></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Logo', 'rhea'); ?></label><br/>
            <?php
            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_testimonial" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'rhea' ).'" /><br />';

            endif;

            ?>
            <input type="text" class="widefat custom_media_url_testimonial" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_testimonial" id="custom_media_button_testimonial" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','rhea'); ?>" style="margin-top:5px;">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Company Description', 'rhea'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
		
    <?php

    }

}