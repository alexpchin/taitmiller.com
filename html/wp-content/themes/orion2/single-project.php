<?php while ( have_posts() ) : the_post(); ?>
    <div class="close"></div>
    <div class="img-project">
        <ul class="thumb-project">
            <?php $video = get_post_meta( $post->ID, '_orion2_project_video', true ); ?>
            <?php if (!empty($video)) : ?>
        	   <li class="project-video"><?php echo wp_oembed_get(get_post_meta( get_the_ID(), '_orion2_project_video', true ), array('width' => 674, 'height'=>421) ); ?></li>
            <?php endif; ?>
            <?php if ($images = get_posts(array(
                    'post_parent'    => get_the_ID(),
                    'post_type'      => 'attachment',
                    'numberposts'    => -1,
                    'posts_per_page'    => -1,
                    'post_status'    => null,
                    'post_mime_type' => 'image',
                    'orderby'        => 'menu_order',
                    'order'           => 'ASC',
                    'exclude'       =>  get_post_thumbnail_id($post->ID)
                ))) :
            ?>
                <?php  foreach($images as $image) : ?>
                <?php $image_url = wp_get_attachment_image_src( $image->ID, 'project_image'); ?>
                <li class="project-image"><img src="<?php echo $image_url[0]; ?>" /></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="info-project">
        <div><span class="title-project"><?php the_title(); ?></span><span class="date date-inside"><?php echo get_post_meta( $post->ID, '_orion2_project_date', true ); ?></span></div>
        <div class="description"><?php echo get_post_meta( $post->ID, '_orion2_project_description', true ); ?></div>
        <div class="view-btn"></div>
        <div class="btn-prev"></div>
        <div class="btn-next"></div>
    </div>
    <div class="nav-project">
        <ul class="dotsmenu2">
            <?php if (!empty($video)) : $images[] = 'video'; endif; ?>
            <?php $i=1; foreach($images as $image) : ?>
                <li class="dots2 jump<?php echo $i ?>2 <?php echo ($i==1 ? 'activo2' : ''); ?>"></li>
            <?php $i++; endforeach; ?>
            <!--
            <li class="dots2 jump32"></li>
            <li class="dots2 jump42"></li>
            <li class="dots2 jump52"></li>
            -->
        </ul>
    </div>
    <div class="view-btn"><a target="_blank" href="<?php echo get_post_meta( $post->ID, '_orion2_project_url', true ); ?>" class="view-project2"><?php _e('view project', 'orion2'); ?></a></div>
<?php endwhile; ?>