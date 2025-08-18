jQuery(function ($) {
  // Adiciona botões + e - ao redor do input de quantidade
  $("form.cart, .woocommerce-cart-form, .woocommerce-mini-cart").on(
    "wc_update_cart",
    function () {
      addQuantityButtons();
    }
  );

  function addQuantityButtons() {
    $(".quantity").each(function () {
      let $this = $(this);

      // evita duplicar os botões
      if ($this.find(".qty-btn").length) return;

      $this.prepend('<button type="button" class="qty-btn minus">-</button>');
      $this.append('<button type="button" class="qty-btn plus">+</button>');
    });
  }

  // Chama na inicialização
  addQuantityButtons();

  // Eventos dos botões
  $(document).on("click", ".qty-btn.plus", function () {
    let $input = $(this).siblings(".qty");
    let val = parseInt($input.val()) || 0;
    let max = parseInt($input.attr("max")) || 9999;
    if (val < max) $input.val(val + 1).trigger("change");
  });

  $(document).on("click", ".qty-btn.minus", function () {
    let $input = $(this).siblings(".qty");
    let val = parseInt($input.val()) || 0;
    let min = parseInt($input.attr("min")) || 1;
    if (val > min) $input.val(val - 1).trigger("change");
  });
});
