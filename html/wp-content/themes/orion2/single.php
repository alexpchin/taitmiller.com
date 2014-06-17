<?php get_header(); ?>

   <div class="page-single">

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
          <?php while ( have_posts() ) : the_post(); ?>
                <article>
                            <div class="title2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

                            <div class="text">
                              <?php the_content(); ?>
                              <?php wp_link_pages(); ?>
                            </div>

                          <div class="bottomline sup"></div>
                           <div class="icons">
                              <span class="nombre">By <?php the_author_link(); ?></span>
                                <span class="fecha">Date <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time(get_option('date_format')); ?></a></span>
                                <span class="tags">Tags <?php the_tags( '' ); ?></span>
                                <span class="comentaris"><a href="blog_interior.html"><strong><?php comments_number(); ?></strong></a></span>
                            </div>
                            <div class="bottomline"></div>

                      </article>
          <?php endwhile; ?>
          <?php comments_template(); ?>
        </div>
        <?php get_sidebar(); ?>


		</div>


     </section>

     <div class="call-shadow-top"></div>

     </div>
  </div>
<?php get_footer(); ?>