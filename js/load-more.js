document.addEventListener("DOMContentLoaded", function () {
  let loading = false;
  const loadMoreBtn = document.getElementById("load-more");
  const productsContainer = document.getElementById("products-container");

  if (!loadMoreBtn || !productsContainer) return;

  const maxPages = parseInt(loadMoreBtn.dataset.maxPages);
  let currentPage = parseInt(loadMoreBtn.dataset.page);

  const loadProducts = () => {
    if (loading || currentPage > maxPages) return;

    loading = true;

    const url = `${
      window.location.href.split("?")[0]
    }?paged=${currentPage}&scroll=1`;

    fetch(url)
      .then((res) => res.text())
      .then((html) => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, "text/html");
        const newProducts = doc.querySelectorAll("#products-container > *");

        newProducts.forEach((el) => {
          productsContainer.appendChild(el);
        });

        currentPage++;
        loadMoreBtn.dataset.page = currentPage;

        if (currentPage > maxPages) {
          loadMoreBtn.style.display = "none";
        }

        loading = false;
      })
      .catch(() => {
        loading = false;
      });
  };

  window.addEventListener("scroll", () => {
    const rect = loadMoreBtn.getBoundingClientRect();
    if (rect.top < window.innerHeight + 100) {
      loadProducts();
    }
  });
});
