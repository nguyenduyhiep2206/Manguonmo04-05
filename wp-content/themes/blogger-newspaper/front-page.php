<?php

/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogger Newspaper
 * @since blogger Newspaper 1.0
 */
get_header();
if (true == get_theme_mod('onof_auto_topection', true)) :
  echo '<div id="top-content">';/* satrt top section */
  echo  '<div class=" grid-x align-center" >';
  get_template_part('home-part/part', 'slider');
  get_template_part('home-part/part', 'rightpost');
  echo '</div>';
  echo '</div>';
endif; ?>

<div id="news-latest-post">
  <div class="grid-container <?php if (false == get_theme_mod('newspaperss_body_fullwidth', false)) : ?> full <?php endif; ?>">
    <div class=" grid-x grid-padding-x  align-center <?php if (!is_active_sidebar('sidebar-homepagesidebar')) { ?>no-homesidebar  <?php } ?>">
      <?php if (is_active_sidebar('sidebar-homepagewidgets')) : ?>
        <div class="cell small-12 <?php if (!is_active_sidebar('sidebar-homepagesidebar')) : ?> large-12 medium-12 <?php else : ?> large-8 <?php endif; ?>" data-equalizer="data-equalizer" data-equalize-by-row="true">
          <?php dynamic_sidebar('sidebar-homepagewidgets'); ?>
        </div>
      <?php else : ?>
        <?php if (is_customize_preview() && current_user_can('edit_theme_options')) : ?>
          <div class="cell small-12 addwidgets-warp large-auto">
            <div class="callout large text-center clear  border-none margin-vertical-3">
              <h5><?php echo esc_html__('Click To Add Home Widgets', 'blogger-newspaper') ?></h5>
              <a class="add_widget_home floating-action button secondary z-depth-2">
                <i class="fa fa-plus" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
      <?php if (is_active_sidebar('sidebar-homepagesidebar')) : ?>
        <div class="cell small-11 medium-11 large-4 ">
          <div class="home-sidebar sidebar-inner">
            <div class="grid-x grid-margin-x grid-padding-y ">
              <?php dynamic_sidebar('sidebar-homepagesidebar'); ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php
get_footer(); ?>