<?php get_header(); ?>

<main id="single-product">

    <div class="intro-page"></div>

    <section class="section-content container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                global $product;
                ?>
                <div class="product-gallery">
                    <?php echo do_shortcode('[wcgs_gallery_slider]'); ?>
                </div>

                <div class="product-detail">
                    <div class="detail-content">
                        <h1><?php the_title(); ?></h1>

                        <div class="short-description">
                            <?php echo apply_filters('woocommerce_short_description', $product->get_short_description()); ?>
                        </div>

                        <div class="product-price">
                            <?php woocommerce_template_single_price(); ?>
                        </div>

                        <p class="text-info">5% OFF no PIX ou em até 3x sem juros</p>

                        <?php woocommerce_template_single_add_to_cart(); ?>

                    </div>
                </div>
            </section>

            <section class="section-description container">
                <div class="description-content">
                    <h2 class="title-section">Detalhes do produto</h2>
                    <?php echo wpautop(wp_kses_post($product->get_description())); ?>
                </div>
            </section>

        <?php }
        } ?>

    <?php
    $cross_sell_ids = $product->get_cross_sell_ids();
    if (!empty($cross_sell_ids)) {
        $cart_cross_sells = array_map('wc_get_product', $cross_sell_ids);
        $formatted_cross = format_products($cart_cross_sells);
        ?>
        <section class="cross-sell-products related-list">
            <div class="container">
                <div class="content-cross">
                    <div class="text">
                        <h2>Acessórios que fazem a diferença</h2>
                        <p>Funcionais e discretos, os acessórios indicados para cada modelo ajudam a reter a água da rega,
                            proporcionando mais praticidade no dia a dia.</p>
                    </div>

                    <div class="swiper cross-sell-carousel">
                        <div class="swiper-wrapper">
                            <?php foreach ($formatted_cross as $p): ?>
                                <div class="swiper-slide">
                                    <a href="<?= esc_url($p['link']); ?>" class="product-link">
                                        <img src="<?= esc_url($p['img']); ?>" alt="<?= esc_attr($p['name']); ?>" />
                                        <h3><?= esc_html($p['name']); ?></h3>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php
    // Upsells
    $upsell_ids = $product->get_upsell_ids();
    if (!empty($upsell_ids)) {
        $upsell_products = array_map('wc_get_product', $upsell_ids);
        $formatted_upsells = format_products($upsell_products);
        ?>
        <section class="section-products">
            <div class="container">
                <div class="products-top">
                    <h2 class="title-section">De acordo com você</h2>
                    <a class="btn dkt" href="/loja">Ver mais itens</a>
                </div>

                <?php flore_product_list($formatted_upsells); ?>

                <a class="btn mbl" href="/loja">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/cart.svg" alt="Carrinho lateral">
                    Ver mais itens
                </a>
            </div>
        </section>
    <?php } ?>

</main>

<?php get_footer(); ?>