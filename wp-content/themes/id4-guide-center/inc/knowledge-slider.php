<?php
if (!defined('ABSPATH')) exit;

add_shortcode('id4_knowledge_slider', function ($atts) {

    $atts = shortcode_atts([
        'cat'      => '',
        'posts'    => 15, // Tổng số bài tối đa
        'per_page' => 3,  // Số bài trên 1 slide (desktop)
        'max_dots' => 5,  // Số chấm tối đa
    ], $atts, 'id4_knowledge_slider');

    // 1. Tính toán số lượng bài cần lấy
    $perPage = max(1, (int) $atts['per_page']);
    $maxDots = max(1, (int) $atts['max_dots']);
    $limit   = $perPage * $maxDots;

    // 2. Query bài viết
    $args = [
        'post_type'           => 'post',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
    ];

    $cat = trim((string) $atts['cat']);
    if ($cat !== '') $args['category_name'] = sanitize_text_field($cat);

    $q = new WP_Query($args);
    if (!$q->have_posts()) return '';

    // 3. Tạo ID duy nhất cho slider này
    $uid = 'id4_slider_' . wp_generate_password(6, false, false);

    ob_start(); ?>

    <div class="id4_slider_wrapper" id="<?php echo esc_attr($uid); ?>">
        <div class="id4_slider_viewport">
            <div class="id4_slider_track" data-per-page="<?php echo $perPage; ?>" data-max-dots="<?php echo $maxDots; ?>">
                <?php while ($q->have_posts()) : $q->the_post();
                    $thumb = get_the_post_thumbnail(get_the_ID(), 'large');
                    if (!$thumb) $thumb = '<img src="https://via.placeholder.com/600x400" alt="No Image">';
                ?>
                    <article class="id4_slider_card">
                        <a class="id4_card_img" href="<?php the_permalink(); ?>">
                            <?php echo $thumb; ?>
                        </a>
                        <div class="id4_card_body">
                            <h3 class="id4_card_title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="id4_card_excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </div>
                            <a class="id4_card_btn" href="<?php the_permalink(); ?>">Xem thêm</a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>

        <div class="id4_slider_dots"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof initID4Slider === 'function') {
                initID4Slider('<?php echo esc_js($uid); ?>');
            }
        });
    </script>

<?php
    return ob_get_clean();
});
