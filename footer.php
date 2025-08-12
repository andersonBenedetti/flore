<?php
$footer_menu_institucional = [
    ['label' => 'Sobre nós', 'url' => '#'],
    ['label' => 'Central de Atendimento', 'url' => '#'],
    ['label' => 'Políticas da loja', 'url' => '#'],
    ['label' => 'Blog', 'url' => '#'],
    ['label' => 'Minha conta', 'url' => '#'],
];

$footer_menu_atendimento = [
    ['label' => '(48) 99999-9999', 'url' => '#', 'icon' => 'telefone.svg'],
    ['label' => 'atendimento@floreveste.com.br', 'url' => '#', 'icon' => 'email.svg'],
    ['label' => 'R. Vicente Nunes Barcelos, 218 - Santa Barbara, Criciúma - SC, 88804-090', 'url' => '#', 'icon' => 'local.svg'],
];
?>

<footer id="footer">
    <div class="container">
        <div class="footer-columns">
            <nav class="footer-column" aria-labelledby="footer-institucional">
                <h3 id="footer-institucional">Institucional</h3>
                <ul>
                    <?php
                    foreach ($footer_menu_institucional as $item) {
                        echo '<li><a class="link-footer" href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a></li>';
                    }
                    ?>
                </ul>
            </nav>

            <nav class="footer-column" aria-labelledby="footer-atendimento">
                <h3 id="footer-atendimento">Atendimento</h3>
                <ul>
                    <?php
                    $icon_base_url = get_stylesheet_directory_uri() . '/icons/';
                    foreach ($footer_menu_atendimento as $item) {
                        $icon_url = $icon_base_url . $item['icon'];
                        echo '<li><a class="link-atendimento" href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">';
                        echo '<img src="' . esc_url($icon_url) . '" alt="" class="footer-icon" aria-hidden="true" /> ';
                        echo esc_html($item['label']);
                        echo '</a></li>';
                    }
                    ?>
                </ul>
            </nav>

            <nav class="footer-column" aria-labelledby="footer-pagamento">
                <h3 id="footer-pagamento">Formas de pagamento</h3>
                <div class="footer-payment">
                    <div class="footer-cards">
                        <p>Cartões de crédito</p>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cartoes.webp"
                            alt="Cartões de crédito">
                    </div>

                    <div class="footer-cards-bottom">
                        <div>
                            <p>Boleto</p>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/boleto.webp" alt="Boleto">
                        </div>

                        <div>
                            <p>Pix</p>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pix.webp" alt="Pix">
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="footer-bottom">
            <div>
                <p>Florê – CNPJ: 00.000.000/0000-00</p>
                <p>Todos os direitos reservados.</p>
            </div>
            <p>Desenvolvido por <a href="#" rel="noopener noreferrer" target="_blank">Blume Web Studio</a></p>
        </div>
    </div>
</footer>

<a href="https://wa.me/5548999999999" class="whatsapp-float" target="_blank" aria-label="Fale conosco no WhatsApp">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/whatsapp-float.svg" alt="WhatsApp" width="60"
        height="60">
</a>

<div id="popup-imagem" class="popup">
    <div class="popup-conteudo">
        <span class="fechar">&times;</span>
        <img src="" alt="Imagem ampliada" id="imagem-popup">
    </div>
</div>

<script>
    const app = new Vue({
        el: '#app',
        data: {
            activeMenu: false,
        },
        created() { },
        methods: {}
    });
</script>

</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/popup.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/toggle.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/load-more.js"></script>

<?php wp_footer(); ?>
</body>

</html>