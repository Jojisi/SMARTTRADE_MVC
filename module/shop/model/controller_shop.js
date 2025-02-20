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
                            `<div class='card card-product' style='background-color: #f2f2f2;'>
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
            $('#content_shop_products').empty();
            $('#container-product-images').empty();
            $('#container-product-details').empty();

            if (Array.isArray(data[1])) {
                for (let row of data[1]) {
                    $('<div></div>').attr({ 'id': row.id_img, class: 'product_images_inner' }).appendTo('#container-product-images')
                        .html(
                            "<div class='content-img-details'>" +
                            "<img src='view/img/product/" + row.img_product + "' alt='Product Image'>" +
                            "</div>"
                        );
                }
            }

            $('<div></div>').attr({ 'id': data[0].id_product, class: 'product_details_inner' }).appendTo('#container-product-details')
                .html(
                    "<div class='list_product_details'>" +
                    "<div class='product-info_details'>" +
                    "<div class='product-content_details'>" +
                    "<h1><b>" + data[0].name + "</b></h1>" +
                    "<hr class='hr-shop'>" +
                    "<table class='table-shop'>" +
                    "<tr><td><b>Condition:</b> " + data[0].name_condition_type + "</td></tr>" +
                    "<tr><td><b>Sale status:</b> " + data[0].status_state + "</td></tr>" +
                    "<tr><td><b>Visit count:</b> " + data[0].visit_count + "</td></tr>" +
                    "</table>" +
                    "<hr class='hr-shop'>" +
                    "<h3><b>Description:</b></h3>" +
                    "<p>" + data[0].description + "</p>" +
                    "<div class='buttons_details'>" +
                    "<span class='button price_details'>" + data[0].price + "€</span>" +
                    "<a class='button like' id='like_" + data[0].id_product + "'><i class='fa-solid fa-heart'></i></a>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
                );

            new Glider(document.querySelector('.product_images'), {
                slidesToShow: 1,
                dots: '#dots',
                draggable: true,
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                }
            });

        }).catch(function () {
            console.error('Error loading product details');
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

