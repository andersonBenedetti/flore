<?php
// Template Name: Home
?>

<?php get_header(); ?>

<?php
$infos = [
    [
        'icon' => 'hugeicons_truck.svg',
        'alt' => 'Entrega para todo Brasil',
        'title' => 'Entrega para todo Brasil',
        'subtitle' => 'Chegamos até você'
    ],
    [
        'icon' => 'bytesize_calendar.svg',
        'alt' => '12 anos fazendo roupas',
        'title' => '12 anos fazendo roupas',
        'subtitle' => 'Qualidade garantida'
    ],
    [
        'icon' => 'tabler_ruler.svg',
        'alt' => 'Calças com alturas diferentes',
        'title' => 'Calças com alturas diferentes',
        'subtitle' => 'Para as mais altas e mais baixas'
    ],
    [
        'icon' => 'lsicon_clothes-outline.svg',
        'alt' => 'Roupas práticas feitas para seu dia a dia',
        'title' => 'Roupas práticas feitas para seu dia a dia',
        'subtitle' => 'Para trabalhar, para treinar, para sair a noite'
    ]
];

function flore_show_products($args = [])
{
    $products_query = wc_get_products($args);
    if (empty($products_query)) {
        echo '<p>Nenhum produto encontrado.</p>';
        return;
    }
    $products_formatted = format_products($products_query);
    flore_product_list($products_formatted);
}
?>

<main id="pg-home" role="main">
    <section class="main-carousel swiper" aria-label="Carrossel de destaque">
        <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type' => 'carrossel',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'DESC',
            );
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()):
                while ($the_query->have_posts()):
                    $the_query->the_post();

                    $link = get_field('link_da_imagem');
                    $img_desktop = get_field('imagem_-_desktop');
                    $img_mobile = get_field('imagem_-_mobile');
                    $title = get_the_title();

                    $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    if (!$alt_text) {
                        $alt_text = $title;
                    }
                    ?>
                    <a class="swiper-slide" href="<?php echo esc_url($link); ?>" aria-label="<?php echo esc_attr($title); ?>">
                        <img class="dkp" src="<?php echo esc_url($img_desktop); ?>" alt="<?php echo esc_attr($alt_text); ?>"
                            loading="lazy" width="1200" height="auto">
                        <img class="mbl" src="<?php echo esc_url($img_mobile); ?>" alt="<?php echo esc_attr($alt_text); ?>"
                            loading="lazy" width="600" height="auto">
                    </a>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p><?php _e('Desculpe, nenhum slide encontrado.', 'textdomain'); ?></p>
            <?php endif; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination" aria-hidden="true"></div>
    </section>

    <section class="section-infos">
        <div class="infos-content">
            <?php
            foreach ($infos as $info): ?>
                <div class="infos-item">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/icons/' . $info['icon']; ?>"
                        alt="<?php echo esc_attr($info['alt']); ?>">

                    <h3>
                        <?php echo esc_html($info['title']); ?>
                        <span><?php echo esc_html($info['subtitle']); ?></span>
                    </h3>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section-products">
        <div class="container">
            <div class="products-top">
                <h2 class="title-section">De acordo com você</h2>

                <a class="btn dkt" href="/loja">
                    Ver mais itens
                </a>
            </div>

            <?php
            flore_show_products([
                'limit' => 4,
                'status' => 'publish',
                'featured' => true
            ]);
            ?>

            <a class="btn mbl" href="/loja">
                Ver mais itens
            </a>
        </div>
    </section>

    <section class="section-items">
        <div class="item-store">
            <h3 class="title-section">Ultimas novidades</h3>
            <a class="btn secondary" href="#">
                Ver mais itens
            </a>
        </div>

        <div class="item-store">
            <h3 class="title-section">Mais vendidos</h3>
            <a class="btn secondary" href="#">
                Ver mais itens
            </a>
        </div>
    </section>

    <section class="section-products">
        <div class="container">
            <div class="products-top">
                <h2 class="title-section">De acordo com você</h2>

                <a class="btn dkt" href="/loja">
                    Ver mais itens
                </a>
            </div>

            <?php
            flore_show_products([
                'limit' => 4,
                'status' => 'publish',
            ]);
            ?>

            <a class="btn mbl" href="/loja">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/cart.svg" alt="Carrinho lateral">
                Ver mais itens
            </a>
        </div>
    </section>

    <section class="section-social">
        <div class="social-content">
            <h2 class="title-section">
                Siga-nos no Instagram
            </h2>
            <p class="subtitle">@flore.veste</p>
            <a class="btn" href="#">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/iconoir_instagram.svg" alt="Instagram">
                Seguir
            </a>
        </div>
    </section>

</main><?php get_footer(); ?>