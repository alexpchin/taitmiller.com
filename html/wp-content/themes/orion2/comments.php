 <div class="mod_coment">
  		<h2 id="comments"><?php comments_number();?></h2>
        <ul class="coment clearfix">
            <?php wp_list_comments("callback=orion_comments");?>
        </ul>
        <div class="navigation_comment clearfix">
            <div class="alignleft"><?php previous_comments_link() ?></div>
            <div class="alignright"><?php next_comments_link() ?></div>
        </div>
        <div class="bottomline"></div>
  </div>
    <?php if ('open' == $post->comment_status) : ?>
        <?php comment_form(); ?>
    <?php endif; // if you delete this the sky will fall on your head ?>
