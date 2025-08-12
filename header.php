<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <title>
        <?php if (is_front_page() || is_home()) {
            echo get_bloginfo('name');
        } else {
            echo wp_title('');
        } ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vue.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper-bundle.min.css" />
    <?php wp_head(); ?>
</head>

<body>
    <div id="app">

        <?php
        $menu_items = [
            ['label' => 'Blusas', 'url' => '/loja'],
            ['label' => 'Vestidos', 'url' => '#'],
            ['label' => 'Saias', 'url' => '#'],
            ['label' => 'Saia-shorts', 'url' => '#'],
            ['label' => 'Bermudas', 'url' => '#'],
            ['label' => 'Calças', 'url' => '#'],
        ];
        ?>

        <header id="header" role="banner">
            <div class="text-top">
                <p>Frete grátis acima de R$299 para sul e sudeste</p>
            </div>
            <div class="container">
                <div class="content">
                    <div class="content-left">
                        <a href="/" class="logo" aria-label="Ir para a página inicial">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-header.webp"
                                alt="Florê - Voltar para página inicial" loading="lazy">
                        </a>

                        <div class="menu-header dkt" :class="{ active: activeMenu }" role="navigation"
                            aria-label="Menu principal">
                            <button class="btn-menu" @click="activeMenu = !activeMenu"
                                :aria-expanded="activeMenu ? 'true' : 'false'" aria-controls="menu"
                                aria-label="Abrir ou fechar menu de navegação">
                                <span></span>
                            </button>
                            <ul class="menu-list" id="menu">
                                <?php
                                foreach ($menu_items as $item) {
                                    echo '<li><a href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="menu-items">
                        <div role="search">
                            <?php echo do_shortcode('[fibosearch]'); ?>
                        </div>

                        <a href="#" class="icon-items">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/user.svg" alt="Minha conta">
                        </a>

                        <a href="#" class="icon-items">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/cart.svg"
                                alt="Carrinho lateral">
                        </a>

                        <div class="menu-header mbl" :class="{ active: activeMenu }" role="navigation"
                            aria-label="Menu principal">
                            <button class="btn-menu" @click="activeMenu = !activeMenu"
                                :aria-expanded="activeMenu ? 'true' : 'false'" aria-controls="menu"
                                aria-label="Abrir ou fechar menu de navegação">
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>