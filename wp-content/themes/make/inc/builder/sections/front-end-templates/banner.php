<?php
/**
 * @package Make
 */

global $ttfmake_section_data, $ttfmake_sections;
$banner_slides = ttfmake_builder_get_banner_array( $ttfmake_section_data );
$is_slider = ( count( $banner_slides ) > 1 ) ? true : false;
$darken   = ( isset( $ttfmake_section_data[ 'darken' ] ) ) ? absint( $ttfmake_section_data[ 'darken' ] ) : 0;
?>

<section id="<?php echo esc_attr( ttfmake_get_builder_save()->section_html_id( $ttfmake_section_data ) ); ?>" class="builder-section <?php echo esc_attr( ttfmake_builder_get_banner_class( $ttfmake_section_data, $ttfmake_sections ) ); ?>" style="<?php echo esc_attr( ttfmake_builder_get_banner_style( $ttfmake_section_data ) ); ?>">
	<?php if ( '' !== $ttfmake_section_data['title'] ) : ?>
	<h3 class="builder-banner-section-title">
		<?php echo apply_filters( 'the_title', $ttfmake_section_data['title'] ); ?>
	</h3>
	<?php endif; ?>
	<div class="builder-section-content<?php echo ( $is_slider ) ? ' cycle-slideshow' : ''; ?>"<?php echo ( $is_slider ) ? ttfmake_builder_get_banner_slider_atts( $ttfmake_section_data ) : ''; ?>>
		<?php if ( ! empty( $banner_slides ) ) : foreach ( $banner_slides as $slide ) : ?>
		<div class="builder-banner-slide<?php echo ttfmake_builder_banner_slide_class( $slide ); ?>" style="<?php echo ttfmake_builder_banner_slide_style( $slide, $ttfmake_section_data ); ?>">
			<div class="builder-banner-content">
				<div class="text-modal">
						<span class="close" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/images/close.svg" /></i>
						<?php ttfmake_get_builder_save()->the_builder_content( $slide['content'] ); ?>
					</div>

				<div class="builder-banner-inner-content">

				<div class="controls-wrap">
					<?php if($slide['video'] != ""){ ?>
						<button class="video-modal-trigger" data-video="<?php echo $slide['video']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/video.svg" /></button>
					<?php } ?>

					<?php if(strlen($slide['content']) > 0){ ?>
						<button class="text-modal-trigger"><img src="<?php echo get_template_directory_uri(); ?>/images/text.svg" /></button>
					<?php } ?>
				</div>

				</div>
			</div>
			<?php if ( 0 !== absint( $slide['darken'] ) ) : ?>
			<div class="builder-banner-overlay"></div>
			<?php endif; ?>
		</div>
		<?php endforeach; endif; ?>
		<?php if ( $is_slider && false === (bool) $ttfmake_section_data['hide-arrows'] ) : ?>
		<div class="cycle-prev"></div>
		<div class="cycle-next"></div>
		<?php endif; ?>
		<?php if ( $is_slider && false === (bool) $ttfmake_section_data['hide-dots'] ) : ?>
		<div class="cycle-pager"></div>
		<?php endif; ?>
	</div>
	<?php if ( 0 !== $darken ) : ?>
	<div class="builder-section-overlay"></div>
	<?php endif; ?>
</section>




