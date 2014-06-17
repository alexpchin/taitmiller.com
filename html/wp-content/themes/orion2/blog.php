<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
   <div class="page-blog">

       <div class="bg-menu">
        <nav class="primary clearfix container">
    				<div class="titol title_blog display">Our Blog</div>
    		</nav>
       </div>

      <!-- content -->
      <div class="bg-white"><div class="shadow_top"></div>
      <section class="container content">

		<div class="blog-wrap clearfix" id="nipt0">

        		<div class="lista column twelve columns">
                        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; $blog = new WP_Query(array('post_type'=>'post', 'paged' => $paged));
                        while ($blog->have_posts()) : $blog->the_post(); ?>
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
