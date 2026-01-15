<?php
if (!defined('ABSPATH')) exit;

/**
 * Shortcode:
 * [id4_knowledge_slider cat="bai-viet-hoc-thuat" posts="15" per_page="3" max_dots="5"]
 *
 * (Shortcode giữ nguyên tên để bạn không phải sửa trang cũ)
 */
add_shortcode('id4_knowledge_slider', function ($atts) {

    $atts = shortcode_atts([
        'cat'      => '',
        'posts'    => 15,
        'per_page' => 3,
        'max_dots' => 5,
    ], $atts, 'id4_knowledge_slider');

    $posts   = (int) $atts['posts'];
    $perPage = max(1, (int) $atts['per_page']);
    $maxDots = max(1, (int) $atts['max_dots']);

    $maxPosts = $maxDots * $perPage;
    if ($posts > $maxPosts) $posts = $maxPosts;

    $args = [
        'post_type'           => 'post',
        'posts_per_page'      => $posts,
        'ignore_sticky_posts' => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
    ];

    $cat = trim((string) $atts['cat']);
    if ($cat !== '') $args['category_name'] = sanitize_text_field($cat);

    $q = new WP_Query($args);
    if (!$q->have_posts()) return '';

    // chunk thành page (mỗi page = 3 bài)
    $chunks = [];
    $buffer = [];
    while ($q->have_posts()) {
        $q->the_post();
        $buffer[] = get_the_ID();
        if (count($buffer) === $perPage) {
            $chunks[] = $buffer;
            $buffer = [];
        }
    }
    if (!empty($buffer)) $chunks[] = $buffer;
    wp_reset_postdata();

    // ID unique cho slider
    $uid = 'id4_thu_vien_' . wp_generate_password(6, false, false);

    ob_start(); ?>
    <div class="id4_thu_vien" id="<?php echo esc_attr($uid); ?>" data-pages="<?php echo esc_attr(count($chunks)); ?>">
        <div class="id4_thu_vien__viewport">
            <div class="id4_thu_vien__track">
                <?php foreach ($chunks as $pageIndex => $ids): ?>
                    <div class="id4_thu_vien__page" data-page="<?php echo esc_attr($pageIndex); ?>">
                        <?php foreach ($ids as $pid): ?>
                            <?php
                            $title = get_the_title($pid);
                            $link  = get_permalink($pid);
                            $ex    = get_the_excerpt($pid);
                            $thumb = get_the_post_thumbnail($pid, 'large');
                            ?>
                            <article class="id4_thu_vien__card">
                                <a class="id4_thu_vien__img" href="<?php echo esc_url($link); ?>">
                                    <?php echo $thumb; ?>
                                </a>

                                <div class="id4_thu_vien__body">
                                    <h3 class="id4_thu_vien__title">
                                        <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
                                    </h3>

                                    <div class="id4_thu_vien__excerpt">
                                        <?php echo wp_kses_post(wp_trim_words($ex, 28, '...')); ?>
                                    </div>

                                    <a class="id4_thu_vien__btn" href="<?php echo esc_url($link); ?>">Xem thêm</a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="id4_thu_vien__dots" aria-label="Pagination"></div>
    </div>

    <script>
        (function() {
            const root = document.getElementById('<?php echo esc_js($uid); ?>');
            if (!root) return;

            const track = root.querySelector('.id4_thu_vien__track');
            const pages = root.querySelectorAll('.id4_thu_vien__page');
            const dotsWrap = root.querySelector('.id4_thu_vien__dots');
            if (!track || !pages.length || !dotsWrap) return;

            const maxDots = <?php echo (int) $maxDots; ?>;
            const pageCount = Math.min(pages.length, maxDots);
            let current = 0;

            dotsWrap.innerHTML = '';
            const dots = [];
            for (let i = 0; i < pageCount; i++) {
                const b = document.createElement('button');
                b.className = 'id4_thu_vien__dot';
                b.type = 'button';
                b.setAttribute('aria-label', 'Page ' + (i + 1));
                b.addEventListener('click', () => go(i));
                dotsWrap.appendChild(b);
                dots.push(b);
            }

            function updateDots() {
                dots.forEach((d, i) => d.setAttribute('aria-current', i === current ? 'true' : 'false'));
            }

            function go(i) {
                current = Math.max(0, Math.min(pageCount - 1, i));
                track.style.transform = 'translateX(' + (-current * 100) + '%)';
                updateDots();
            }

            go(0);
        })();
    </script>
<?php
    return ob_get_clean();
});
