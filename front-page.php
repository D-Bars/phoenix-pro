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
            foreach($advantages as $advantage):
                setup_postdata($advantage); 
                $advantageID = $advantage->ID;
        ?>
        <div class="advantages__item <?php echo (!$i) ? 'adv__active' : ''; ?>">
            <div class="advantages__lamp__wrapper">
                <img class="<?php echo (!$i) ? 'lightbulb__active' : ''; ?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/lamp.png"
                    alt="AdvantagesLamp">
                <div class="rays__box">
                    <div class="ray <?php echo (!$i) ? 'ray__active' : ''; ?>"></div>
                    <div class="ray <?php echo (!$i) ? 'ray__active' : ''; ?>"></div>
                    <div class="ray <?php echo (!$i) ? 'ray__active' : ''; ?>"></div>
                </div>
            </div>
            <div class="advantages__item__content__box <?php echo (!$i) ? 'content__box__active' : ''; ?>">
                <div class="advantages__item__title"><?php the__localize__title($advantageID); ?></div>
                <div class="advantages__item__subtitle"><?php the__localize__content($advantageID); ?></div>
            </div>
        </div>
        <?php $i+=1; endforeach; ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>