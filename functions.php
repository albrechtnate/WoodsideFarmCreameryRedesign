<?php

 function register_menus() {
     register_nav_menus(
         array( 'main-nav' => __( 'Main Nav' ) )
     );
 }
 add_action( 'init', 'register_menus' );

function wpa_45815($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpa_45815');

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

register_sidebar( array(
	'id'          => 'footer',
	'name'        => 'Footer',
	'description' => __( 'This is where the custom footer widget should go.', 'text_domain' )
) );

class Cow_Greeting_Widget extends WP_Widget {
    public function __construct(){
        parent::__construct(
            'cow_greeting_widget',
            'Cow Greeting',
            array('description' => 'This allows the content in the "cow greeting" footer section to be editable.')
        );
    }
    
    public function form($instance){
        $defaults = array(
            'title' => __('Cow Greeting'),
            'heading' => 'Come by Soon!',
            'text' => 'Our cows will be waiting.'
        );
        
        $instance = wp_parse_args((array) $instance, $defaults);
        
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input type="" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('heading'); ?>">Street Address</label>
            <input type="" id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" class="widefat" value="<?php echo esc_attr($instance['heading']); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hours'); ?>">Hours</label>
            <input type="" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" class="widefat" value="<?php echo esc_attr($instance['text']); ?>">
        </p>

        <?php
    }
    
    public function update($new_instance, $old_instance){
        $instance = $old_instance;
        
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['heading'] = strip_tags($new_instance['heading']);
        $instance['text'] = strip_tags($new_instance['text']);
        
        return $instance;
    }
    
    public function widget($args, $instance){
        extract($args);
        
        $title = apply_filters('widget-title', $instance['title']);
        
        $heading = $instance['heading'];
        $hours = $instance['hours'];
        $text = $instance['text'];

        ?>
        
			<div class="main-footer__cow-greeting">
                <div>
                    <h2><?php echo $heading; ?></h2>
                    <p><?php echo $text; ?></p>
                </div>
			</div>

        <?php
    }
}

register_widget('Cow_Greeting_Widget');

class Footer_Widget extends WP_Widget {
    public function __construct(){
        parent::__construct(
            'footer_widget',
            'Footer',
            array('description' => 'This allows the content in the site footer to be editable.')
        );
    }
    
    public function form($instance){
        $defaults = array(
            'title' => __('Footer'),
            'street_address' => '378 North Star Road, Newark, DE 19711',
            'hours' => 'Open 12&ndash;8 p.m. Daily',
            'phone_number' => '(302) 239-9847',
        );
        
        $instance = wp_parse_args((array) $instance, $defaults);
        
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input type="" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('street_address'); ?>">Street Address</label>
            <input type="" id="<?php echo $this->get_field_id('street_address'); ?>" name="<?php echo $this->get_field_name('street_address'); ?>" class="widefat" value="<?php echo esc_attr($instance['street_address']); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hours'); ?>">Hours</label>
            <input type="" id="<?php echo $this->get_field_id('hours'); ?>" name="<?php echo $this->get_field_name('hours'); ?>" class="widefat" value="<?php echo esc_attr($instance['hours']); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('phone_number'); ?>">Phone Number</label>
            <input type="" id="<?php echo $this->get_field_id('phone_number'); ?>" name="<?php echo $this->get_field_name('phone_number'); ?>" class="widefat" value="<?php echo esc_attr($instance['phone_number']); ?>">
        </p>

        <?php
    }
    
    public function update($new_instance, $old_instance){
        $instance = $old_instance;
        
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['street_address'] = strip_tags($new_instance['street_address']);
        $instance['hours'] = strip_tags($new_instance['hours']);
        $instance['phone_number'] = strip_tags($new_instance['phone_number']);
        
        return $instance;
    }
    
    public function widget($args, $instance){
        extract($args);
        
        $title = apply_filters('widget-title', $instance['title']);
        
        $street_address = $instance['street_address'];
        $hours = $instance['hours'];
        $phone_number = $instance['phone_number'];

        ?>
        
            <div class="main-footer__primary">
                <a href="<?php echo get_permalink(get_page_by_path( 'navigation' )); ?>" class="btn btn--special footer-nav-link">Site Navigation</a>
                <nav class="footer-nav">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main-nav',
                        'container' => false,
                        'after' => '<li class="separator">&bull;</li>',
                    )); ?>
                </nav>
                <p class="main-footer__address"><?php echo $street_address; ?></p>
                <p class="hours-and-date"><span><?php echo $hours; ?></span><span><?php echo $phone_number; ?></span></p>
            </div>

        <?php
    }
}

register_widget('Footer_Widget');

?>