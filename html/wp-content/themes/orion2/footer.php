<div id="footer" class="container">
    <div class="footerContent">
        <div class="socialtext">
            <?php _e('follow us on our social networks', 'orion2'); ?>
        </div>
        	<?php global $NHP_Options; ?>
            <div class="footer-container">
                <div class="sociafoot">
                    <?php if ($NHP_Options->get('facebook')) : ?> <a href="<?php $NHP_Options->show('facebook'); ?>" class="icon sc-fb"></a><?php endif; ?>
                    <?php if ($NHP_Options->get('twitter')) : ?> <a href="<?php $NHP_Options->show('twitter'); ?>" class="icon sc-tw"></a><?php endif; ?>
                    <?php if ($NHP_Options->get('forest')) : ?> <a href="<?php $NHP_Options->show('forest'); ?>" class="icon sc-frr"></a><?php endif; ?>
                    <?php if ($NHP_Options->get('flickr')) : ?> <a href="<?php $NHP_Options->show('flickr'); ?>" class="icon sc-flkr"></a><?php endif; ?>
                    <?php if ($NHP_Options->get('vimeo')) : ?> <a href="<?php $NHP_Options->show('vimeo'); ?>" class="icon sc-vim"></a><?php endif; ?>
                    <?php if ($NHP_Options->get('google')) : ?> <a href="<?php $NHP_Options->show('google'); ?>" class="icon sc-glg"></a><?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- end footer -->

<?php wp_footer(); ?>

<script type="text/javascript">
		jQuery(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			jQuery('.fancybox').fancybox();
			jQuery('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

		});
	</script>


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43330679-7', 'taitmiller.com');
  ga('send', 'pageview');

</script>

<!-- isotope -->
<script>

/*
	calcul();
	function calcul(){
		size=jQuery(window).width();
		if (size > 959) { tam=4;} else
		if (size > 767) { tam=3;} else
		if (size > 479) { tam=2;} else
		if (size < 480) { tam=1;}
	}
  */

  jQuery(function(){

	var $container = jQuery('#container2');

	$container.isotope({
	  itemSelector : '.element'
	});

/*	jQuery(window).bind("resize", function(){
	  	vell=tam;
		calcul();
		if(vell!=tam){
			$container.isotope( 'reLayout')
		}
	});
*/

	var $optionSets = jQuery('#options .option-set'),
		$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){
		jQuery(".project-window").slideUp("slow");
	  var $this = jQuery(this);
	  // don't proceed if already selected
	  if ( $this.hasClass('selected') ) {
		return false;
	  }
	  var $optionSet = $this.parents('.option-set');
	  $optionSet.find('.selected').removeClass('selected');
	  $this.addClass('selected');

	  // make option object dynamically, i.e. { filter: '.my-filter-class' }
	  var options = {},
		  key = $optionSet.attr('data-option-key'),
		  value = $this.attr('data-option-value');
	  // parse 'false' as false boolean
	  value = value === 'false' ? false : value;
	  options[ key ] = value;
	  if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		// changes in layout modes need extra logic
		changeLayoutMode( $this, options )
	  } else {
		// otherwise, apply new options
		$container.isotope( options );
	  }

	  return false;
	});
  });
</script>
    </body>
</html>