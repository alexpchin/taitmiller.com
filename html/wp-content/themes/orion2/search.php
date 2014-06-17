<?php get_header(); ?>
   <div class="page-blog">

       <div class="bg-menu">
        <nav class="primary clearfix container">
    				<div class="titol title_blog display"><?php _e('Search', 'orion2'); ?>: <?php the_search_query(); ?></div>
    		</nav>
       </div>

      <!-- content -->
      <div class="bg-white"><div class="shadow_top"></div>
      <section class="container content">

		<div class="blog-wrap clearfix" id="nipt0">

        		<div class="lista column twelve columns">
                    <?php if ( have_posts() ) :  ?>
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
                    <?php else: ?>
                      <h1><?php _e('Nothing found', 'orion2'); ?></h1>
                      <p class="text"><?php _e('Sorry but nothing matched your search terms. Please try againwith some different keywords', 'orion2'); ?></p>
                    <?php endif; ?>
                </div>

				<?php get_sidebar(); ?>

		</div>


     </section>

     <div class="call-shadow-top"></div>

     </div>
  </div>
<?php get_footer(); ?>
