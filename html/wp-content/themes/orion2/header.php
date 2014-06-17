<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <?php global $NHP_Options; ?>
  <!--  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
  <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
  <title><?php $NHP_Options->show('blogname'); ?> <?php wp_title(); ?></title>
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="TwJP6BpHofgbrmNhLK6qxnsXxH6SFDZ1FMZRGfY2g_A" />

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-114x114.png">
  <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="header" class="parentContainer container">
        <div class="header-container">
            <a href="<?php echo home_url(); ?>" class="content-logo">
            	<div class="logo"><img src="<?php $NHP_Options->show('logo'); ?>" alt=""></div>
              <div class="company-name"><?php $NHP_Options->show('blogname'); ?></div>
            </a>

            <div class="block-menu">
                 <select class="navegation_resp" onchange="location.href=this.options[this.selectedIndex].value;">
                   <?php if ( ( $locations = get_nav_menu_locations() ) && $locations['main'] ) {
                        $menu = wp_get_nav_menu_object( $locations['main'] );
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        $include = $items = array();
                        foreach($menu_items as $item) {
                            $items[] = $item;
                            if($item->object == 'page')
                                $include[] = $item->object_id;
                        }

                      foreach ($items as $it)  :?>
                      <?php if ($it->object == 'page') {
                          $varpost = get_post($it->object_id);
                      ?> <option value="<?php echo $it->url; ?>#<?php echo $varpost->post_name; ?>"><?php echo $it->title; ?></option> <?php
                      } else {
                      ?> <option value="<?php echo $it->url; ?>" ><?php echo $it->title; ?></option> <?php
                      }
                      endforeach;
                    }
                    ?>
                </select>
            </div>
            <div class="menu-select">
                <?php wp_nav_menu(array('container' => 'nav',
                                  'container_id' => 'main-menu',
                                  'container_class' => '',
                                  'theme_location' => 'main',
                                  'menu_class' => 'contentMenu',
                                  'walker' => new orion_walker_nav_menu
                                  )); ?>
            </div>
        </div>
    </div> <!-- end header-->