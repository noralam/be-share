<?php
/**
 * @link              http://digitalkroy.com/plugin/homepage/
 * @since             1.0.0
 * @package           Be Share
 *
 * All share button and all position display set here.
 *
 */
	

if ( ! function_exists( 'born_share_lite_side' ) ) :
function born_share_lite_side(){
// Get all option from the setting page
$options = get_option('born_for_share_lite_settings');

$show_hide = ( isset( $options['show_hide'] ) ) ? $options['show_hide'] : 'yes';
$btn_type = ( isset( $options['btn_type'] ) ) ? $options['btn_type'] : 'textandicon';
$btn_top_set = ( isset( $options['btn_top_set'] ) ) ? $options['btn_top_set'] : 20;
?>
<div id="bshare-social" class="baby-sideshare share-left <?php if($btn_type =='round_icon'): ?>round-icons<?php endif; ?>" style="top:<?php echo $btn_top_set; ?>%">
		<div class="count-set-left <?php if($btn_type=='icon'):?>text-left<?php endif; ?>">
			<button type="button" class="tottal-count bshare-Facebook  share s_Facebook">Facebook
			<i class="icon-Facebook"></i>
			</button><!-- button two-->
		</div>
		<div class="count-set-left <?php if($btn_type=='icon'):?>text-left<?php endif; ?>">
			<button type="button" class="tottal-count bshare-Twitter share s_Twitter">Twitter
			<i class="icon-Twitter"></i>
			</button><!-- button two-->
		</div>
		<div class="count-set-left <?php if($btn_type=='icon'):?>text-left<?php endif; ?>">
			<button type="button" class="tottal-count bshare-Googleplus  share s_Googleplus">Google +   &nbsp; &nbsp;
			<i class="icon-Googleplus"></i>
			</button><!-- button two-->
		</div>
		<div class="count-set-left <?php if($btn_type=='icon'):?>text-left<?php endif; ?>">
			<button type="button" class="tottal-count bshare-Buffer share s_Buffer">Buffer
			<i class="icon-Buffer"></i>
			</button><!-- button two-->
		</div>
		<div class="count-set-left <?php if($btn_type=='icon'):?>text-left<?php endif; ?>">
			<button type="button" class="tottal-count bshare-Pinterest  share s_Pinterest">Pinterest
			<i class="icon-Pinterest "></i>
			</button><!-- button two-->
		</div>
		<?php if($show_hide == 'yes'):?>
		<div class="share_hide_show left_hide_show"> 
			<i class="icon-share"></i>
		</div><!-- share icon -->		
		<?php endif;?>
</div>
		


<?php
}	
add_action('wp_footer','born_share_lite_side');	
endif;
 if ( ! function_exists( 'born_share_lite_scripts' ) ) :
function born_share_lite_scripts(){
global $post; 
		// Get current page URL 
		$essURL = get_permalink($post->ID);
		// Get current page title
		$essTitle = get_the_title($post->ID);
		// Get current page title
		$essexcerpt =  get_the_excerpt();
		// Get Post Thumbnail for pinterest
		$essThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
<script type="text/javascript">
(function ($) {
	"use strict";

    $(document).ready(function(){
			$('.share').ShareLink({
				title: '<?php echo esc_html($essTitle); ?>',
				text: '<?php echo esc_html($essexcerpt); ?>',
				image: '<?php echo $essThumbnail[0]; ?>',
				url: '<?php echo esc_url($essURL); ?>'
				 });
		 
			// left side click icon
			 $(".left_hide_show i").on('click', function(){
			$(".share-left").toggleClass("hide_show_left");
			});
        });
}(jQuery));	
</script>
<?php
}

add_action( 'wp_footer', 'born_share_lite_scripts',99 );
endif;