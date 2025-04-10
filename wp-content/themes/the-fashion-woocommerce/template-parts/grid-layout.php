<?php
/**
 * The template part for displaying grid post
 *
 * @package the-fashion-woocommerce
 * @subpackage the-fashion-woocommerce
 * @since the-fashion-woocommerce 1.0
 */
?>
<?php 
  $the_fashion_woocommerce_archive_year  = get_the_time('Y'); 
  $the_fashion_woocommerce_archive_month = get_the_time('m'); 
  $the_fashion_woocommerce_archive_day   = get_the_time('d'); 
?> 
<div class="col-lg-4 col-md-4">
  <article class="page-box">
    <?php if( get_theme_mod( 'the_fashion_woocommerce_show_featured_image_post',true) != '') { ?>
      <div class="box-img">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php } ?>
    <div class="new-text">
      <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'the_fashion_woocommerce_grid_post_date',true) != '' || get_theme_mod( 'the_fashion_woocommerce_grid_post_comment',true) != '' || get_theme_mod( 'the_fashion_woocommerce_grid_post_author',true) != '' || get_theme_mod( '
        the_fashion_woocommerce_grid_post_time',true) != '') { ?>
        <div class="metabox">
          <?php if( get_theme_mod( 'the_fashion_woocommerce_grid_post_date',true) != '') { ?>
            <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('the_fashion_woocommerce_grid_post_date_icon','fa fa-calendar')); ?>"></i><a href="<?php echo esc_url( get_day_link( $the_fashion_woocommerce_archive_year, $the_fashion_woocommerce_archive_month, $the_fashion_woocommerce_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('the_fashion_woocommerce_metabox_separator_grid_post','|') ); ?>
          <?php } ?>
          <?php if( get_theme_mod( 'the_fashion_woocommerce_grid_post_comment',true) != '') { ?>
            <span class="entry-comments"><i class="<?php echo esc_attr(get_theme_mod('the_fashion_woocommerce_grid_post_comment_icon','fas fa-comments')); ?>"></i><?php comments_number( __('0 Comments','the-fashion-woocommerce'), __('0 Comments','the-fashion-woocommerce'), __('% Comments','the-fashion-woocommerce') ); ?></span><?php echo esc_html( get_theme_mod('the_fashion_woocommerce_metabox_separator_grid_post','|') ); ?>
          <?php } ?>
          <?php if( get_theme_mod( 'the_fashion_woocommerce_grid_post_author',true) != '') { ?>
            <span class="entry-author"><i class="<?php echo esc_attr(get_theme_mod('the_fashion_woocommerce_grid_post_author_icon','fa fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('the_fashion_woocommerce_metabox_separator_grid_post','|') ); ?>
          <?php } ?>
          <?php if( get_theme_mod( 'the_fashion_woocommerce_grid_post_time',true) != '') { ?>
            <span class="entry-time"><i class="<?php echo esc_attr(get_theme_mod('the_fashion_woocommerce_grid_post_time_icon','fas fa-clock')); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
          <?php }?>
        </div>
      <?php }?>
      <div class="entry-content"><p><?php $the_fashion_woocommerce_excerpt = get_the_excerpt(); echo esc_html( the_fashion_woocommerce_string_limit_words( $the_fashion_woocommerce_excerpt, esc_attr(get_theme_mod('the_fashion_woocommerce_grid_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('the_fashion_woocommerce_post_suffix_option','...') ); ?></p></div>
      <?php if( get_theme_mod('the_fashion_woocommerce_button_text','Read More') != ''){ ?>
        <div class="read-more-btn">
          <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('the_fashion_woocommerce_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('the_fashion_woocommerce_button_text','Read More'));?></span></a>
        </div>
      <?php }?>
    </div>
    <div class="clearfix"></div>
  </article>
</div>