<?php
/**
 * IPTV functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IPTV
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function iptv_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on IPTV, use a find and replace
		* to change 'iptv' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'iptv', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'iptv' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'iptv_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'iptv_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function iptv_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'iptv_content_width', 640 );
}
add_action( 'after_setup_theme', 'iptv_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iptv_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'iptv' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'iptv' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'iptv_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function iptv_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false );
	wp_enqueue_style( 'swiper-bundle-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), false );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/main.css', array(), time() );
	wp_enqueue_style( 'iptv-style', get_stylesheet_uri(), array(), time() );
	wp_style_add_data( 'iptv-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'iptv-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/script.js', array(), time(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'iptv_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Register 'Tutorials' Custom Post Type
 */
function register_tutorials_post_type() {
    $labels = array(
        'name'               => _x('Tutorials', 'Post Type General Name', 'your-textdomain'),
        'singular_name'      => _x('Tutorial', 'Post Type Singular Name', 'your-textdomain'),
        'menu_name'          => __('Tutorials', 'your-textdomain'),
        'all_items'          => __('All Tutorials', 'your-textdomain'),
        'view_item'          => __('View Tutorial', 'your-textdomain'),
        'add_new_item'       => __('Add New Tutorial', 'your-textdomain'),
        'add_new'            => __('Add New', 'your-textdomain'),
        'edit_item'          => __('Edit Tutorial', 'your-textdomain'),
        'update_item'        => __('Update Tutorial', 'your-textdomain'),
        'search_items'       => __('Search Tutorials', 'your-textdomain'),
        'not_found'          => __('Not Found', 'your-textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'your-textdomain'),
    );

    $args = array(
        'label'               => __('tutorials', 'your-textdomain'),
        'description'         => __('Educational tutorials and guides', 'your-textdomain'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more', // WordPress dashicon
        'can_export'         => true,
        'has_archive'        => true,
        'exclude_from_search'=> false,
        'publicly_queryable' => true,
        'capability_type'    => 'post',
        'rewrite'           => array('slug' => 'tutorials'), // URL slug
        'show_in_rest'      => true, // Enable Gutenberg editor
    );

    register_post_type('tutorial', $args);
}
add_action('init', 'register_tutorials_post_type', 0);


/**
 * Register 'Tutorial Categories' Taxonomy
 */
function register_tutorial_categories() {
    $labels = array(
        'name'              => _x('Tutorial Categories', 'taxonomy general name', 'your-textdomain'),
        'singular_name'     => _x('Tutorial Category', 'taxonomy singular name', 'your-textdomain'),
        'search_items'      => __('Search Categories', 'your-textdomain'),
        'all_items'         => __('All Categories', 'your-textdomain'),
        'parent_item'       => __('Parent Category', 'your-textdomain'),
        'parent_item_colon' => __('Parent Category:', 'your-textdomain'),
        'edit_item'         => __('Edit Category', 'your-textdomain'),
        'update_item'       => __('Update Category', 'your-textdomain'),
        'add_new_item'      => __('Add New Category', 'your-textdomain'),
        'new_item_name'     => __('New Category Name', 'your-textdomain'),
        'menu_name'         => __('Categories', 'your-textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // Like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'          => array('slug' => 'tutorial-category'),
        'show_in_rest'     => true, // Enable in Gutenberg
    );

    register_taxonomy('tutorial_category', array('tutorial'), $args);
}

/**
 * Register 'Tutorial Tags' Taxonomy
 */
function register_tutorial_tags() {
    $labels = array(
        'name'              => _x('Tutorial Tags', 'taxonomy general name', 'your-textdomain'),
        'singular_name'     => _x('Tutorial Tag', 'taxonomy singular name', 'your-textdomain'),
        'search_items'      => __('Search Tags', 'your-textdomain'),
        'all_items'         => __('All Tags', 'your-textdomain'),
        'parent_item'       => __('Parent Tag', 'your-textdomain'),
        'parent_item_colon' => __('Parent Tag:', 'your-textdomain'),
        'edit_item'         => __('Edit Tag', 'your-textdomain'),
        'update_item'       => __('Update Tag', 'your-textdomain'),
        'add_new_item'      => __('Add New Tag', 'your-textdomain'),
        'new_item_name'     => __('New Tag Name', 'your-textdomain'),
        'menu_name'         => __('Tags', 'your-textdomain'),
    );

    $args = array(
        'hierarchical'      => false, // Like tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'          => array('slug' => 'tutorial-tag'),
        'show_in_rest'     => true,
    );

    register_taxonomy('tutorial_tag', array('tutorial'), $args);
}

add_action('init', 'register_tutorial_categories', 0);
add_action('init', 'register_tutorial_tags', 0);
