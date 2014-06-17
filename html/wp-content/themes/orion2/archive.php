<?php get_header(); ?>
   <div class="page-blog">

       <div class="bg-menu">
        <nav class="primary clearfix container">
    				<div class="titol title_blog display">
              <?php /* If this is a category archive */ if (is_category()) { ?>
                <?php _e('Archive', 'orion2'); ?>: ‘<?php single_cat_title(); ?>’ Category
             <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                <?php _e('Posts tagged', 'orion2'); ?> ‘<?php single_tag_title(); ?>’
             <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                <?php _e('Archive', 'orion2'); ?>: <?php the_time('F jS, Y'); ?>
             <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                <?php _e('Archive', 'orion2'); ?>: <?php the_time('F, Y'); ?>
             <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                <?php _e('Archive', 'orion2'); ?>: <?php the_time('Y'); ?>
              <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                <?php _e('Author Archive', 'orion2'); ?>
             <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <?php _e('Blog Archive', 'orion2'); ?>
             <?php } ?>
            </div>
    		</nav>
       </div>

      <!-- content -->
      <div class="bg-white"><div class="shadow_top"></div>
      <section class="container content">

		<div class="blog-wrap clearfix" id="nipt0">

        		<div class="lista column twelve columns">
                        <?php while (have_posts()) : the_post(); ?>
                        <article>
                            <div class="title2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <div class="bottomline"></div>
                           	<?php if (has_post_thumbnail()) : ?><div class="imagen"><?php the_post_thumbnail() ?></div> <?php endif; ?>
                            <!--<div class="marc"></div>-->
                            <div class="text"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>"><div class="tipo1"><?php _e('Read More','orion2'); ?></div></a>
                            <div class="icons">
                            	<span class="nombre">By <?php the_author_link(); ?></span>
                                <span class="fecha">Date <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time(get_option('date_format')); ?></a></span>
                                <span class="tags">Tags <?php the_tags( '' ); ?></span>
                                <span class="comentaris"><a href="<?php the_permalink(); ?>#comments"><strong><?php comments_number(); ?></strong></a></span>
                            </div>
                            <div class="bottomline"></div>
                           <!-- <div class="bottomline2"></div>-->
                        </article>
                        <?php endwhile; ?>

                        <?php posts_nav_link(); ?>
                </div>

				<?php get_sidebar(); ?>

		</div>


     </section>

     <div class="call-shadow-top"></div>

     </div>
  </div>
<?php get_footer(); ?>
