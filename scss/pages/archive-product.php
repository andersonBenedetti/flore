<?php get_header(); ?>

<main id="archive-product">

  <section class="intro-store">
    <div class="container">
      <h1>
        <?php
        if (is_shop()) {
          echo 'Loja';
        } else {
          single_cat_title();
        }
        ?>
      </h1>
      <div class="filters-store">
        <div class="filter-list">
          <?php
          $product_categories = get_categories(
            array(
              'taxonomy' => 'product_cat',
              'hide_empty' => false,
            )
          );

          if (!empty($product_categories)) {
            echo '<select onchange="location = this.value;">';
            echo '<option value="">Selecione uma categoria</option>';
            foreach ($product_categories as $category) {
              echo '<option value="' . get_term_link($category) . '">' . $category->name . '</option>';
            }
            echo '</select>';
          } else {
            echo 'Não foram encontradas categorias de produtos.';
          }
          ?>
        </div>
        <?php
        $attribute_taxonomies = wc_get_attribute_taxonomies();
        foreach ($attribute_taxonomies as $attribute) {
          $attribute_terms = get_terms(
            array(
              'taxonomy' => 'pa_' . $attribute->attribute_name,
              'hide_empty' => false,
            )
          );

          if (!empty($attribute_terms)) {
            echo '<div id="' . $attribute->attribute_name . '-select" class="filter-list-mobile">';
            echo '<select onchange="location = this.value;">';
            echo '<option value="">Selecione ' . $attribute->attribute_label . '</option>';
            foreach ($attribute_terms as $term) {
              $term_link = esc_url(add_query_arg(array('filter_' . $attribute->attribute_name => $term->slug)));
              echo '<option value="' . $term_link . '">' . $term->name . '</option>';
            }
            echo '</select>';
            echo '</div>';
          }
        }
        ?>
      </div>
    </div>
  </section>

  <?php
  $products = [];
  if (have_posts()) {
    while (have_posts()) {
      the_post();
      $products[] = wc_get_product(get_the_ID());
    }
  }

  $data = [];
  $data['products'] = format_products($products);
  ?>

  <section class="container store-top">
    <p class="products-count">
      <?php
      echo "<span>" . count($products) . "</span>" . " Resultados encontrados ";
      ?>
    </p>
    <?php woocommerce_catalog_ordering(); ?>
  </section>

  <section class="container">
    <?php if (!empty($data['products'][0])) { ?>
      <?php oficina_product_list($data['products']); ?>
      <?= get_the_posts_pagination(); ?>
    <?php } else { ?>
      <p>Nenhum resultado para a sua busca.</p>
    <?php } ?>
  </section>

</main>

<?php get_footer(); ?>