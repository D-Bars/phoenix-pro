<?php get_header(); ?>

<?php
global $post;
$advantages = get_posts(array(
    'post_type' => 'advantages',
    'numberposts' => 4
));
?>
<?php if ($advantages): ?>
    <div class="advantages__block">
        <?php
        $i = 0;
        foreach ($advantages as $advantage):
            setup_postdata($advantage);
            $advantageID = $advantage->ID;
            ?>
            <div class="advantages__item <?php echo (!$i) ? 'adv__active' : ''; ?>">
                <div class="advantages__lamp__wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/lamp.png" alt="AdvantagesLamp">
                    <div class="rays__box">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                </div>
                <div class="advantages__item__content__box">
                    <?php if (get_the_post_thumbnail($advantageID)): ?>
                        <div class="advantages__item__img"><?php echo get_the_post_thumbnail($advantageID, 'large'); ?></div>
                    <?php endif; ?>
                    <div class="advantages__item__title"><?php the__localize__title($advantageID); ?></div>
                    <div class="advantages__item__subtitle"><?php the__localize__content($advantageID); ?></div>
                </div>
            </div>
            <?php $i += 1; endforeach; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>

<div class="about__us__block" id="about__us">
    <!-- design element -->
    <div class="about__us__content__box">
        <h2>
            <?php _e('О нас', 'firm'); ?>
            <div class="about__us__h2__border"></div>
        </h2>
        <?php
        if ($theme__options['about__us__text']):
            echo '<div class="about__us__text">' . __('' . $theme__options['about__us__text'] . '', 'firm') . '</div>'
                ?>
        <?php endif; ?>
    </div>
    <div class="about__us__wrapper__img">
        <?php if ($theme__options['about__us__image']):
            echo '<img src="' . esc_url($theme__options['about__us__image']) . '" alt="AboutUs">'
                ?>
        <?php endif; ?>
    </div>
    <!-- design element -->
</div>

<div class="form__block">
    <div class="form__wrapper__img"><div class="form__mask"></div><img src="<?php echo get_template_directory_uri(); ?>./assets/img/form__bckgr.jpg" alt=""></div>
    <div class="form__content">
        <div class="form__titles__box">
            <div class="form__content__subtitle"><?php _e('We would love to know you', 'firm'); ?></div>
            <h2>
                <?php _e('GET IN TOUCH WITH US', 'firm'); ?>
                <div class="form__titles__h2__border"></div>
            </h2>
        </div>
        <?php echo do_shortcode('[wpforms id="43" title="false"]'); ?>
    </div>
</div>

<?php get_footer(); ?>