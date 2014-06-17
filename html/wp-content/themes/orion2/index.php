<?php
    if( !isset($_POST['nameform']) || !isset($_POST['emailform']) || !isset($_POST['messageform']) || $_POST['nameform'] == '' || $_POST['emailform'] == ''|| $_POST['messageform'] == '' || $_POST['nameform'] == 'Name (required)' || $_POST['emailform'] == 'E-mail (required)'|| $_POST['messageform'] == 'Your message')
    {
        $error = 'Please fill in all the required fields';
    }
    else
    {
            global $NHP_Options;
            $absolute_path = __FILE__;
            $path_to_file = explode( 'wp-content', $absolute_path );
            $path_to_wp = $path_to_file[0];

            // Access WordPress
            require_once( $path_to_wp . '/wp-load.php' );
            $name = esc_html($_POST['nameform']);
            $email = esc_html($_POST['emailform']);
            $comment = esc_html($_POST['messageform']);
            $msg = esc_attr('Name: ', 'SCRN') . $name . PHP_EOL;
            $msg .= esc_attr('E-mail: ', 'SCRN') . $email . PHP_EOL;
            $msg .= esc_attr('Message: ', 'SCRN') . $comment;
            $to = $NHP_Options->get('email');;
            $sitename = get_bloginfo('name');
            $subject = '[' . $sitename . ']' . ' New Message';
            $headers = 'From: ' . $name . ' <' . $email . '>' . PHP_EOL;
            $error=wp_mail($to, $subject, $msg, $headers);

    }
get_header(); ?>

    <div id="banner" class="parallax" style="background-image:url('<?php $NHP_Options->show('banner_background'); ?>');"><div id="ancla0" class="banner-background"></div>
        <div class="infobanner">
            <div class="titlebanner" style="background-image:url('<?php $NHP_Options->show('banner_icon'); ?>');"></div>
            <div class="welcome"><?php $NHP_Options->show('banner_title'); ?></div>
            <!--<div class="textbanner">-->
                <?php $NHP_Options->show('banner_desc'); ?>
            </div>
        </div>
    </div>
    <!-- end banner -->
     <?php if ( ( $locations = get_nav_menu_locations() ) && $locations['main'] ) {
                $menu = wp_get_nav_menu_object( $locations['main'] );
                $menu_items = wp_get_nav_menu_items($menu->term_id);
                $include = $items = array();
                foreach($menu_items as $item) {
                    $items[] = $item;
                    if($item->object == 'page')
                        $include[] = $item->object_id;
                }
                $orion_pages = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );

            } ?>
    <?php $cnt=0; ?>
    <?php while ( $orion_pages->have_posts() ) : $orion_pages->the_post(); ?>
        <?php $post_id = $post->ID; $stype = get_post_meta( $post->ID, '_orion2_section_type', true ); ?>
        <?php if ($stype==0) : //normal section ?>
        <section style="background-color: <?php echo get_post_meta( $post->ID, '_orion2_background', true ); ?>;" id="page-<?php the_ID(); ?>" <?php post_class($cnt==0 ? 'first' : ''); ?>><div id="<?php echo $post->post_name; ?>"></div>
            <div class="section">
                <?php the_content(); ?>
            </div>
        </section>
        <?php elseif ($stype==1) : // portfolio section ?>
          <div style="background-color: <?php echo get_post_meta( $post->ID, '_orion2_background', true ); ?>;" class="works-container"><div id="<?php echo $post->post_name; ?>"></div>
                <?php the_content(); ?>
          </div>
        <?php elseif ($stype==2) : // contact section ?>
            <div id="contact" class="page container"><div id="<?php echo $post->post_name; ?>"></div>
                  <div class="section">
                    <?php the_content(); ?>

                    <div class="contactinfo">
                      <h3 class="titlecontact">Contact with us!</h3>
                      <div class="email">
                          <div class="infocontact"><?php $NHP_Options->show('email'); ?></div>
                      </div>
                      <div class="phone">
                          <div class="infocontact"><?php $NHP_Options->show('phone'); ?></div>
                      </div>
                      <div class="skype">
                          <div class="infocontact"><?php $NHP_Options->show('skype'); ?></div>
                      </div>
                    </div>
                      <form id="formulario" action="<?php echo home_url(); ?>/" method="post">
                      <fieldset>
                      <div class="first">
                          <label for="nameform"></label>
                          <input type="text" name="nameform" id="nameform" value="Name (required)" onclick="if(this.value=='Name (required)') this.value=''" onblur="if(this.value=='') this.value='Name (required)'">
                          <label for="emailform"></label>
                          <input type="text" name="emailform" id="emailform" value="E-mail (required)" onclick="if(this.value=='E-mail (required)') this.value=''" onblur="if(this.value=='') this.value='E-mail (required)'">
                      </div>
                      <div>
                          <label for="messageform"></label>
                          <textarea name="messageform" id="messageform" onclick="this.value=''" onblur="if(this.value=='') this.value='Your message'">Your message</textarea>
                      </div>
                      <p><a href="javascript:{}" onclick="document.getElementById('formulario').submit();" class="submit"><?php _e('Submit', 'orion2'); ?></a></p>
                      </fieldset>
                      </form>
              </div>
          </div><!-- end contact -->
          <div id="maps" class="container">
              <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
              <div class="map-content"><div class="wpgmappity_container inner-map" id="wpgmappitymap"></div></div>
              <script type="text/javascript">
              (function(){
              function wpgmappity_maps_loaded() {
              var latlng = new google.maps.LatLng(<?php $NHP_Options->show('longitude_coord'); ?>,<?php $NHP_Options->show('latitude_coord'); ?>); <!-- (Fist Value Longitude, Second Value Latitude), can obtain YOUR coordenates here!: http://universimmedia.pagesperso-orange.fr/geo/loc.htm -->
              var options = {
               center : latlng,
               mapTypeId: google.maps.MapTypeId.ROADMAP,
               zoomControl : false,
               mapTypeControl : false,
               scaleControl : false,
               streetViewControl : false,
               panControl : false, zoom : 16
              };
              var wpgmappitymap = new google.maps.Map(document.getElementById('wpgmappitymap'), options);
              var point0 = new google.maps.LatLng(<?php $NHP_Options->show('longitude_coord'); ?>,<?php $NHP_Options->show('latitude_coord'); ?>); <!-- (Fist Value Longitude, Second Value Latitude), can obtain YOUR coordenates here!: http://universimmedia.pagesperso-orange.fr/geo/loc.htm -->
              var marker0= new google.maps.Marker({
               position : point0,
               map : wpgmappitymap
               });
              google.maps.event.addListener(marker0,'click',
               function() {
               var infowindow = new google.maps.InfoWindow(
               {content: 'undefined'});
               infowindow.open(wpgmappitymap,marker0);
               });
              }
              window.onload = function() {
               wpgmappity_maps_loaded();
              };
              })()
              </script>
          </div><!-- end map -->
        <?php endif; ?>
        <?php $has_parallax = get_post_meta( $post_id, '_orion2_parallax', true ); ?>
        <?php if ($has_parallax) : ?>
            <div class="bgsepara parallax" style="background-image:url('<?php echo get_post_meta( $post_id, '_orion2_parallax_image', true ); ?>');">
                <div class="parallax-text"><?php echo get_post_meta( $post_id, '_orion2_parallax_title', true ); ?><br><span><?php echo get_post_meta( $post_id, '_orion2_parallax_description', true ); ?></span></div>
                <div id="ancla2" class="anchor-position"></div>
            </div>
        <?php endif; ?>

    <?php $cnt++; endwhile; ?>





<?php get_footer(); ?>
