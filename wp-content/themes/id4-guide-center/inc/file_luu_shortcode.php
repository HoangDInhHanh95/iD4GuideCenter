<?php
error_log('id4 slider loaded');
if (!defined('ABSPATH')) exit;

add_shortcode('id4_knowledge_slider', function ($atts) {

    $atts = shortcode_atts([
        'cat'   => '',
        'posts' => 6,
    ], $atts, 'id4_knowledge_slider');

    $q = new WP_Query([
        'post_type'           => 'post',
        'posts_per_page'      => (int) $atts['posts'],
        'ignore_sticky_posts' => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'category_name'       => sanitize_text_field($atts['cat']),
    ]);

    if (!$q->have_posts()) return '';

    ob_start(); ?>

    <div class="id4-knowledge-slider">
        <div class="id4-knowledge-track"
            data-flickity='{"cellAlign":"left","contain":true,"wrapAround":true,"pageDots":true,"prevNextButtons":false}'>
            <?php while ($q->have_posts()) : $q->the_post(); ?>
                <div class="id4-knowledge-cell">
                    <article class="id4-card">
                        <a class="id4-card__img" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?>
                        </a>

                        <div class="id4-card__body">
                            <h3 class="id4-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="id4-card__excerpt">
                                <?php echo wp_kses_post(wp_trim_words(get_the_excerpt(), 28, '...')); ?>
                            </div>

                            <a class="id4-card__btn" href="<?php the_permalink(); ?>">Xem thêm</a>
                        </div>
                    </article>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>

<?php
    return ob_get_clean();
});
