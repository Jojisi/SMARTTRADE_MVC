function loadProducts() {
    ajaxForSearch('module/shop/controller/controller_shop.php?op=all_products');
}

function ajaxForSearch(url) {
    ajaxPromise(url, 'GET', 'JSON')
        .then(function (data) {
            console.log(data);
            $('#content_shop_products').empty();

            if (data == "error") {
                $('<div></div>').appendTo('#content_shop_products')
                    .html('<h3>¡No se encuentran resultados con los filtros aplicados!</h3>');
            } else {
                for (let row in data) {
                    $('<div></div>').attr({ 'id': data[row].id_product, 'class': 'list_content_shop col-md-7' }).appendTo('#content_shop_products')
                        .html(
                            `<div class='card card-product' style='background-color:rgb(245, 245, 245);'>
                                <img src='${data[row].img_product}' class='card-img-top'>
                                <div class='card-body'>
                                    <div class='title-price-container'>
                                        <h1><b>${data[row].name}</b></h1>
                                        <span class='price'>${data[row].price}€</span>
                                    </div>
                                    <p><strong>Condition:</strong> ${data[row].name_condition_type}</p>
                                    <p><strong>Sale status:</strong> ${data[row].status_state}</p>
                                    <p><strong>Visit count:</strong> ${data[row].visit_count}</p>
                                    <button id='${data[row].id_product}' class='more_info_list'>More Info</button>
                                </div>
                            </div>`
                        );
                }
            }
        })
        .catch(function (error) {
            console.error('Error en la petición AJAX:', error);
        });
}

function loadDetails(id_product) {
    ajaxPromise('module/shop/controller/controller_shop.php?op=details_product&id=' + id_product, 'GET', 'JSON')
        .then(function (data) {
            console.log(data);
            $('#content_shop_products').hide(); // Ocultar lista de productos
            $('#details-product').show(); // Mostrar detalles
            $('#details-container-product-images').empty(); // Limpiar el contenedor de imágenes
            $('#details-container-product-details').empty(); // Limpiar el contenedor de detalles

            // imágenes al carrusel
            if (Array.isArray(data[1])) {
                for (let row of data[1]) {
                    $('#details-container-product-images').append(`
                        <div class='content-img-details'>
                            <img src='${row.img_product}' alt='Product Image'>
                        </div>
                    `);
                }
            }

            // detalles del producto
            $('#details-container-product-details').html(`
                <div class='product_details_inner'>
                    <div class='list_product_details'>
                        <div class='product-info_details'>
                            <div class='product-content_details'>
                                <h1><b>${data[0].name}</b></h1>
                                <hr class='hr-shop'>
                                <table class='table-shop'>
                                    <tr><td><b>Condition:</b> ${data[0].name_condition_type}</td></tr>
                                    <tr><td><b>Sale status:</b> ${data[0].status_state}</td></tr>
                                    <tr><td><b>Visit count:</b> ${data[0].visit_count}</td></tr>
                                </table>
                                <hr class='hr-shop'>
                                <h3><b>Description:</b></h3>
                                <p>${data[0].description}</p>
                                <hr class='hr-shop'>
                                <h3><b>Extras:</b></h3>
                                <div class='extra-item' title='${data[0].name_extras}'>
                                    <img src='${data[0].extras_img}' alt='Extra Image'>
                                </div>
                                <div class='buttons_details'>
                                    <span class='button price_details'>${data[0].price}€</span>
                                    <a class='button like' id='like_${data[0].id_product}'><i class='fa-solid fa-heart'></i></a>
                                    <a class='button buy-now' id='buy_${data[0].id_product}'>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);

            // Inicializar Glider (carrusel)
            new Glider(document.querySelector('.details-glider'), {
                slidesToShow: 1,
                slidesToScroll: 1,
                draggable: false,
                scrollLock: true,
                dots: '.details-dots',
                arrows: {
                    prev: '.details-glider-prev',
                    next: '.details-glider-next'
                }
            });
        }).catch(function (error) {
            console.error('Error loading product details:', error);
        });
}

function clicks() {
    $(document).on("click", ".more_info_list", function () {
        var id_product = this.getAttribute('id');
        console.log(id_product);
        loadDetails(id_product);
    });
}

$(document).ready(function () {
    loadProducts();
    clicks();
    console.log('SHOOOOOOP');
});