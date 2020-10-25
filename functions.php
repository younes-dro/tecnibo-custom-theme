<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
        wp_enqueue_style( 'tecnibo-font-portfolio' , 'https://fonts.googleapis.com/css2?family=Merriweather&family=Oswald:wght@300&display=swap', false);
        wp_enqueue_script( 'tecnibo-js' ,get_stylesheet_directory_uri() . '/assets/tecnibo.js', array ( 'jquery' ), $version , false);
        wp_enqueue_script( 'dro-sliding-menu' ,get_stylesheet_directory_uri() . '/assets/dro-sliding-menu.js', array ( 'jquery' , 'tecnibo-js' ), $version , false);
	
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

if ( ! function_exists( 'tecnibo_setup' ) ) :
    
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */    
    function tecnibo_setup(){
        register_nav_menus(array(
            'right-topmenu' => esc_html__('Right-TopMenu', 'dro-caterer')
        ));    
    }
    
    add_image_size('see-details', 800, 536, TRUE);
    add_image_size('single-main-thumb', 1060, 650, TRUE);
    
endif;

add_action('after_setup_theme', 'tecnibo_setup');

add_action( 'wp_footer', function () {
if ( is_page ('2783')) {
?>

<script> 
window.onload = function() {
    var anchors = document.getElementsByClassName('page-numbers');
    var current = location.href.substring(0,location.href.length-1);
    if (current.includes('page')) {
        current = current.substring(0,current.lastIndexOf('/')); 
        current = current.substring(0,current.lastIndexOf('/')); 
    } for(let i = 0; i < anchors.length; i++) {
        if (anchors[i].tagName == 'A') {
            var link = anchors[i].href; var page = link;
            if (link.slice(-1) == '/') {
                page = link.substring(0,link.length-1);
            } 
            page = page.substring(page.lastIndexOf('/')+1);
            if (isNaN(page)) {
                page = '' 
            } else {
                page = '/page/' + page; 
            
                } if (!link.includes('page')) { anchors[i].href = current + page; } } } };
</script>
<?php } } );