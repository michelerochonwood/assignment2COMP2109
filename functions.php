<?php
function custom_theme_setup() {
  register_nav_menus( array(
    'header' => 'Header menu',
    'footer' => 'Footer menu'
  ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );
// Add Featured image support to our posts
add_theme_support( 'post-thumbnails' );
// set up our custom footer widgets
function cmsclass_widgets_init(){
  register_sidebar(array(
    'name'          => __( 'Footer Widget Area One', 'cmsclass' ),
    'id'            => 'footer-widget-area-one',
    'description'   => __( 'The first footer widget area', 'cmsclass' ),
    'before_widget' => '<div class="logo-widget">',
    'after_widget'  => '</div>'
    // 'before_title'  => '<h4 class="widget-title">',
    // 'after_title'   => '</h4>',
  ));
  register_sidebar( array(
    'name'          => __( 'Footer Widget Area Two', 'cmsclass' ),
    'id'            => 'footer-widget-area-two',
    'description'   => __( 'The second footer widget area', 'cmsclass' ),
    'before_widget' => '<div class="about-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ));
  register_sidebar( array(
    'name'          => __( 'Footer Widget Area Three', 'cmsclass' ),
    'id'            => 'footer-widget-area-three',
    'description'   => __( 'The third footer widget area', 'cmsclass' ),
    'before_widget' => '<div class="menu-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ));
  register_sidebar( array(
    'name'          => __( 'Footer Widget Area Four', 'cmsclass' ),
    'id'            => 'footer-widget-area-four',
    'description'   => __( 'The fourth footer widget area', 'cmsclass' ),
    'before_widget' => '<div class="contact-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ));
}
add_action( 'widgets_init', 'cmsclass_widgets_init' );
// Custom Plugin
function twennie_init(){
  $args = array(
    'label' => 'twennie',
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'taxonomies'  => array( 'category'),
    'hierarchical' => 'false',
    'query_var' => true,
    'menu_icon' => 'dashicons-album',
    'supports' => array(
      'title',
      'editor',
      'excerpts',
      'trackbacks',
      'comments',
      'thumbnail',
      'author',
      'post-formats',
      'page-attributes',
    )
  );
  register_post_type('twennie', $args);
}
add_action('init', 'twennie_init');
// Create our custom shortcode for our custom plugin
function twennie_shortcode(){
  $query = new WP_Query(array('post_type' => 'twennie', 'post_per_page' => 8, 'order' => 'asc'));
  while ($query -> have_posts()) : $query-> the_post(); ?>
  <div class="twennie-container col-sm-12 col-md-6 col-lg-3">
    <div>
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <div class="twennie-content">
      <h4><?php the_title(); ?></h4>
      <?php the_content(); ?>
      <p><a href="<?php the_permalink(); ?>">Learn More</a></p>
    </div>
  </div>
  <?php wp_reset_postdata(); ?>
  <?php
    endwhile;
    wp_reset_postdata();
}
// register shortcode
add_shortcode('twennie', 'twennie_shortcode');


