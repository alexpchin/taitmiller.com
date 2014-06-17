<?php
if ( ! isset( $content_width ) )
    $content_width = 960;

get_template_part('nhp', 'options');
if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus(
            array(
              'main' =>  _('Main menu')
            )
        );
    }
add_theme_support( 'automatic-feed-links' );
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','SearchFilter');
function orion_scripts_and_styles() {
    if (!is_admin()) {
        wp_enqueue_style( 'orion2-style', get_stylesheet_uri() );
        wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
        wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
        wp_enqueue_style( 'base', get_template_directory_uri() . '/css/base.css' );
        wp_enqueue_style( 'skeleton', get_template_directory_uri() . '/css/skeleton.css' );
        wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/layout.css' );
        wp_enqueue_style( 'portfoliostyle', get_template_directory_uri() . '/css/portfoliostyle.css' );
        wp_enqueue_style( 'roll_over', get_template_directory_uri() . '/css/roll_over.css' );
        wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
		wp_enqueue_style( 'media_queries', get_template_directory_uri() . '/css/media_queries.css' );
        wp_enqueue_style( 'responsiveexample', get_template_directory_uri() . '/css/responsiveexample.css' );
        wp_enqueue_style( 'skeleton2', get_template_directory_uri() . '/css/skeleton2.css' );

        wp_deregister_script('jquery');
        wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', false, '1.9.0', true);
        wp_enqueue_script('jquery');
        wp_enqueue_script(
            'modernizr',
            get_template_directory_uri() . '/js/vendor/modernizr.custom.76532.js',
            false,false,true );
        wp_enqueue_script(
            'plugins',
            get_template_directory_uri() . '/js/plugins.js',
            false,false,true );
        wp_enqueue_script(
            'respond',
            get_template_directory_uri() . '/js/respond.min.js',
            false,false,true );
        wp_enqueue_script(
            'inview',
            get_template_directory_uri() . '/js/jquery.inview.js',
            array('jquery'),false,true );
        wp_enqueue_script(
            'custom',
            get_template_directory_uri() . '/js/customScripts.js',
            array('jquery'),false,true );
        wp_enqueue_script(
            'fancybox',
            get_template_directory_uri() . '/js/jquery.fancybox.js',
            array('jquery'),false,true );
        wp_enqueue_script(
            'fancybox-media',
            get_template_directory_uri() . '/js/source/helpers/jquery.fancybox-media.js',
            array('jquery'),false,true );
        wp_enqueue_script(
            'isotope',
            get_template_directory_uri() . '/js/jquery.isotope.min.js',
            array('jquery'),false,true );
    }
}
add_action('wp_enqueue_scripts', 'orion_scripts_and_styles');

register_sidebar(array(
            'before_widget' => '<article id="%1$s" class="widget w33 %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h2 class="title">',
            'after_title' => '</h2>',
            'name' => 'Sidebar'
         ));

// Listado de comentarios
    function orion_comments($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>
       <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
         <article id="comment-<?php comment_ID(); ?>" class="clearfix">
          <?php echo get_avatar($comment,$size='80' ); ?>
            <div class="comment-content">
                <p class="datos">
                    <?php comment_author_link(); ?>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Your comment is awaiting moderation.', 'orion2') ?></em>
                    <?php endif; ?>
                    <span class="fecha"><?php comment_date(); ?></span>
                    <span class="reply"><?php comment_reply_link( array_merge( $args, array(  'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
                </p>
                <?php comment_text() ?>
            </div>
         </article>
         <div class="sp_puntos"></div>
    <?php
    }

class orion_walker_nav_menu extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth, $args ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
        if ($item->object == 'page') {
            $varpost = get_post($item->object_id);
            $attributes .= ' href="' . get_site_url() . '/#' . $varpost->post_name . '"';
        } else {
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        }
        $item_output = '';
        if (is_object($args)) :
        $item_output = sprintf( '%1$s<a%2$s>%3$s<div class="menubtn"><div class="contentbtn">%4$s</div><div class="menubtn homebtn"><div class="contentbtn2">%4$s</div></div>%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        endif;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'project_image', 674, 421, true );
    add_image_size( 'last_project_image', 528, 334, true );
}
/* CUSTOM POSTS */
add_filter( 'post_class', 'custom_taxonomy_post_class', 10, 3 );

if( !function_exists( 'custom_taxonomy_post_class' ) ) {
    function custom_taxonomy_post_class( $classes, $class, $ID ) {
        $terms = get_the_terms( (int) $ID, 'types' );
        if( !empty( $terms ) ) {
            foreach( (array) $terms as $order => $term ) {
                if( !in_array( $term->slug, $classes ) ) {
                    $classes[] = $term->slug;
                }
            }
        }
    return $classes;
    }
}

add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

    $labels = array(
        'name' => _x( 'Projects', 'project', 'orion2' ),
        'singular_name' => _x( 'Project', 'project', 'orion2' ),
        'add_new' => _x( 'Add New', 'project', 'orion2' ),
        'add_new_item' => _x( 'Add New Project', 'project', 'orion2' ),
        'edit_item' => _x( 'Edit Project', 'project', 'orion2' ),
        'new_item' => _x( 'New Project', 'project', 'orion2' ),
        'view_item' => _x( 'View Project', 'project', 'orion2' ),
        'search_items' => _x( 'Search Projects', 'project', 'orion2' ),
        'not_found' => _x( 'No projects found', 'project', 'orion2' ),
        'not_found_in_trash' => _x( 'No projects found in Trash', 'project', 'orion2' ),
        'parent_item_colon' => _x( 'Parent Project:', 'project', 'orion2' ),
        'menu_name' => _x( 'Projects', 'project', 'orion2' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'thumbnail' ),
        'taxonomies' => array( 'type' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'register_taxonomy_types' );

function register_taxonomy_types() {

    $labels = array(
        'name' => _x( 'Types', 'types', 'orion2' ),
        'singular_name' => _x( 'Type', 'types', 'orion2' ),
        'search_items' => _x( 'Search Types', 'types', 'orion2' ),
        'popular_items' => _x( 'Popular Types', 'types', 'orion2' ),
        'all_items' => _x( 'All Types', 'types', 'orion2' ),
        'parent_item' => _x( 'Parent Type', 'types', 'orion2' ),
        'parent_item_colon' => _x( 'Parent Type:', 'types', 'orion2' ),
        'edit_item' => _x( 'Edit Type', 'types', 'orion2' ),
        'update_item' => _x( 'Update Type', 'types', 'orion2' ),
        'add_new_item' => _x( 'Add New Type', 'types', 'orion2' ),
        'new_item_name' => _x( 'New Type', 'types', 'orion2' ),
        'separate_items_with_commas' => _x( 'Separate types with commas', 'types', 'orion2' ),
        'add_or_remove_items' => _x( 'Add or remove types', 'types', 'orion2' ),
        'choose_from_most_used' => _x( 'Choose from the most used types', 'types', 'orion2' ),
        'menu_name' => _x( 'Types', 'types', 'orion2' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'types', array('project'), $args );
}

/* METABOXES */
add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
function cmb_sample_metaboxes( array $meta_boxes ) {
    $prefix = '_orion2_';

    $meta_boxes[] = array(
        'id'         => 'page_attributes',
        'title'      =>  _('Page attributes'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' =>  _('Section Type'),
                'desc' =>  _('Select a section type'),
                'id' => $prefix . 'section_type',
                'type' => 'select',
                'options' => array(
                    array('name' => 'Normal', 'value' => '0'),
                    array('name' => 'Portfolio', 'value' => '1'),
                    array('name' => 'Contact', 'value' => '2')
                )
            ),
            array(
                'name' =>  _('Background color'),
                'desc' =>  _('Choose section background color. Default: #1d1c1c'),
                'id'   => $prefix . 'background',
                'type' => 'colorpicker',
                'std'  => '#1d1c1c'
            ),
            array(
                'name' =>  _('Parallax banner'),
                'desc' =>  _('Have the section a parralax footer banner?'),
                'id'   => $prefix . 'parallax',
                'type' => 'checkbox',
            ),
            array(
                'name' => _('Parallax banner image'),
                'desc' =>  _('Upload an image or enter an URL.'),
                'id'   => $prefix . 'parallax_image',
                'type' => 'file',
            ),
            array(
                'name' =>  _('Parallax banner title'),
                'id'   => $prefix . 'parallax_title',
                'type' => 'text_medium',
            ),
            array(
                'name' =>  _('Parallax banner description'),
                'id'   => $prefix . 'parallax_description',
                'type' => 'text',
            )

        ),
    );

    $meta_boxes[] = array(
        'id'         => 'project_info',
        'title'      =>  _('Project information'),
        'pages'      => array( 'project', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => _('Project images'),
                'desc' =>  _('Upload multiple images'),
                'id'   => $prefix . 'project_images',
                'type' => 'file_list',
                'allow' => array('attachment' )
            ),
            array(
                'name' =>  _('Video'),
                'desc' =>  _('Enter a youtube, vimeo or similar URLs. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.'),
                'id' => $prefix . 'project_video',
                'type' => 'oembed',
            ),
            array(
                'name' =>  _('Project URL'),
                'id'   => $prefix . 'project_url',
                'type' => 'text_medium',
            ),
            array(
                'name' =>  _('Project description'),
                'id'   => $prefix . 'project_description',
                'type' => 'textarea_small',
            ),
            array(
                'name' =>  _('Project date'),
                'id'   => $prefix . 'project_date',
                'type' => 'text_date',
            ),
            array(
                'name' =>  _('Project author'),
                'id'   => $prefix . 'project_author',
                'type' => 'text_small',
            )

        ),
    );

    return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {if ( ! class_exists( 'cmb_Meta_Box' ) ) require_once 'metabox/init.php';}


/* SHORTCODES */
add_shortcode('team_wrapper', 'orion_team_wrapper');
function orion_team_wrapper($atts, $content=null) {
    return '<article class="content-team teamshow">
                    <div class="teamlist">
                        <ul class="team">' . do_shortcode($content) . '</ul></div></article><div class="direction-bar">
                <div class="dir-left disable"></div>
                <div class="dir-right"></div>
            </div>';
}
add_shortcode( 'profile_item', 'orion_profile_item' );
function orion_profile_item( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'icon' => get_site_url() . '/wp-content/themes/orion2/img/profile_bg_01.png',
        ), $atts ) );
    return '<div class="pofile-item">
               <div class="profile-element" style="background-image:url(' . esc_attr($icon) . ');"></div>
               <div class="profile-title">' . $content . '</div>
           </div>';
}
add_shortcode( 'profile', 'orion_profile' );
function orion_profile( $atts, $content = null ) {
    return '<div class="profile">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'team_member', 'orion_team_member' );
function orion_team_member( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'name' => 'Set "name" parameter of team_member shortcode',
        'description' => 'Set "description" parameter of team_member shortcode',
        'contact' => 'Set "description" parameter of team_member shortcode',
        'title' => 'Set "title" parameter of team_member shortcode',
        'twitter' => '#',
        'facebook' => '#',
        'flickr' => '#',
        'email' => '#',
        'avatar' => get_site_url() . '/wp-content/themes/orion2/img/team/team_01.png',
        'class' => 'sides'
        ), $atts ) );
    return '<li class="' . esc_attr($class) . '"> <!-- BLOCK MEMBERS 1 --><!--[if lte IE 9]> <div class="ch-itemie9"><div class="ch-infoie9"> <![endif]--><!--[if gt IE 9]><!--> <div class="ch-item" style="background-image:url(' . esc_attr($avatar) . ');"><div class="ch-info"> <!--<![endif]--><h3>' . esc_attr($name) . '</h3>
                            <p>' . esc_attr($description) . '<br><a href="' . esc_attr($contact) . '">Contact him</a></p></div>
                            </div>
                            <div class="infomembers">' . esc_attr($name) . ' | <span class="membertag">' . esc_attr($title) . '</span></div>
                            <div class="socialicons">
                                <a href="' . esc_attr($twitter) . '" class="t-twitter"></a><a href="' . esc_attr($facebook) . '" class="t-fb"></a><a href="' . esc_attr($flickr) . '" class="t-flickr"></a><a href="' . esc_attr($email) . '" class="t-mail"></a>
                            </div>
                        </li>';
}

add_shortcode( 'content', 'orion_content' );
function orion_content( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'color' => '#676b6a',
        ), $atts ) );
    return '<div class="data-content" style="color:' . esc_attr($color) . ';">' . $content . '</div>';
}

add_shortcode( 'services', 'orion_services' );
function orion_services( $atts, $content = null ) {
    return '<div class="disciplines">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'service', 'orion_service' );
function orion_service( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'image' => get_site_url() . '/wp-content/themes/orion2/img/websites.png',
        'title' =>  _('Set "Title" parameter')
        ), $atts ) );
    return '<div class="works">
          <div class="titleworks">
              <img class="iconworks" src="' . esc_attr($image) . '" alt="' . esc_attr($title) . '">' . esc_attr($title) . '</div>
          <div class="infoworks">
              '. $content .'
          </div>
      </div>';
}

add_shortcode( 'skills', 'orion_skills' );
function orion_skills( $atts, $content = null ) {
    return '<div class="software">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'skill', 'orion_skill' );
function orion_skill( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'percent' => '100%',
        'title' =>  _('Set "Title" parameter'),
        'color' => '1'
        ), $atts ) );
    return '<div class="skill-content">
          <div class="progress-bar stripes' . esc_attr($color) . '">
            <div class="skill-in" style="width:' . esc_attr($percent) . ';"><div class="percent">' . esc_attr($percent) . '</div></div>
          </div>
          <div class="info-skills">'. $content .'</div>
        </div>';
}


add_shortcode( 'works', 'orion_works' );
function orion_works($atts, $content=null) {
    $return  = '<!-- Project -->
        <div class="project-window">
            <div class="project-content"></div><!-- AJAX Dinamic Content -->
        </div><!-- end Project -->
        <div id="portfolio" class="container">
          <div class="section portfoliocontent">
            <section id="options" class="clearfix">
                <ul id="filters" class="option-set clearfix foliomenu" data-option-key="filter">
                  <li class="portfolio-btn"><a href="#filter" data-option-value="*" class="selected folio-btn"><div class="all-btn"></div>all</a></li>';

    $types = get_terms('types', array('hide_empty'=>0));

    if ( $types && ! is_wp_error( $types ) ) :
        foreach ( $types as $type ) {
            $return .= '<li class="portfolio-btn"><a href="#filter" data-option-value=".'. $type->slug  . '" class="folio-btn"><div class="' . $type->slug . '-btn"></div>' . $type->name . '</a></li>';
        }
    endif;
    $return .= '</ul>
            </section>
            <div id="container2" class="clearfix">
                <div class="inici"></div>';

                $projects = new WP_Query(array('post_type'=>'project', 'posts_per_page' => -1));
                while ($projects->have_posts()) : $projects->the_post();
                    $return .= '<div class="' . implode(' ', get_post_class('element')) . '">
                      <div class="ch-grid" id="' . get_permalink() .'">
                          <!--[if lte IE 9]> <div class="ch-itemie9 ch-img-1"><div class="ch-infoie9"> <![endif]-->
                          <!--[if gt IE 9]><!-->
                          <div class="ch-item" style="background:url(' .  wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())).')">
                              <div class="ch-info"><!--<![endif]-->
                                  <div class="h3"><div class="bottom">' . get_the_title() .'</div></div>
                                  <p class="info">' . _('by') .' ' .  get_post_meta( get_the_ID(), '_orion2_project_author', true ) .' <br><span class="view-project">' . _('View Project') .'</span></p>
                              </div></div></div>
                      <div class="info-pf">
                          <div class="infoproject">' . get_the_title() .'</div>
                          <div class="date">' .  date('j F Y', strtotime(get_post_meta( get_the_ID(), '_orion2_project_date', true ))) .'</div>
                      </div>
                    </div>';
                endwhile;
    $return .=   '<div class="final"></div>
     </div>
                </div>
        </div>';
    return $return;

}

add_shortcode( 'latest_works', 'orion_latest_works' );
function orion_latest_works($atts, $content=null) {
    extract( shortcode_atts( array(
        'limit' => '3'
        ), $atts ) );
    $projects = new WP_Query(array('post_type'=>'project', 'posts_per_page' => $limit));
    $projects_list  = '';
    while ($projects->have_posts()) : $projects->the_post();
        if ($images = get_posts(array(
                    'post_parent'    => get_the_ID(),
                    'post_type'      => 'attachment',
                    'numberposts'    => -1,
                    'posts_per_page'    => -1,
                    'post_status'    => null,
                    'post_mime_type' => 'image',
                    'orderby'        => 'menu_order',
                    'order'           => 'ASC',
                    'exclude'       =>  get_post_thumbnail_id(get_the_ID())
                ))) :
            $image_url = wp_get_attachment_image_src( $images[0]->ID, 'project_image');
            $projects_list .= '<li><img src="' . $image_url[0] . '" /></li>';
        endif;
    endwhile;
    $return  = '<div class="last-projects">
              <div class="imagefribbies">
                  <div class="brillo"></div>
                  <ul class="slideshow">
                    ' . $projects_list . '
                  </ul>
              </div>
            </div>';
    return $return;
}


