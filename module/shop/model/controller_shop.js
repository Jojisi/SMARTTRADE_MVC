function loadProducts() {

    const productContainer = document.getElementById("content_shop_products");
    productContainer.innerHTML = "";

    products.forEach(product => {
        const productElement = document.createElement("div");
        productElement.classList.add("product-card");
        productElement.innerHTML = `
            <img src="${product.img}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p class="price">${product.price}</p>
            <button class="buy-btn">Comprar</button>
        `;
        productContainer.appendChild(productElement);
    });
}
$(document).ready(function () {
    loadProducts();
});