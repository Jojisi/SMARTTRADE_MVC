function loadProducts() {
    ajaxForSearch('module/shop/controller/controller_shop.php?op=all_products');
}

function ajaxForSearch(url) {
    ajaxPromise(url, 'GET', 'JSON')  // Primero va la URL, luego GET y JSON
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
                            "<div class='card card-product' style='background-color: #f2f2f2;'>" +
                            "<div class='col-md-1'></div>" +
                            "<img src='" + data[row].img_product + "' class='card-img-top'>" +
                            "<div class='card-body'>" +
                            "<div class='product-info'>" +
                            "<div class='product-content'>" +
                            "<h1><b>" + data[row].name + "</b></h1>" +
                            "<p><strong>Precio:</strong> " + data[row].price + '€</p>' +
                            "<ul>" +
                            // "<li> <i class='fa-solid fa-location-dot fa-xl'></i>&nbsp;&nbsp;" + data[row].location + "</li>" +
                            "<li> <i class='fa-solid fa-file-lines fa-xl'></i>&nbsp;&nbsp;" + data[row].description + "</li>" +
                            // "<li> <i class='fa-solid fa-calendar fa-xl'></i>&nbsp;&nbsp;" + data[row].publication_date + "</li>" +
                            "</ul>" +
                            "<div class='buttons'>" +
                            "<button id='btn_" + data[row].id_product + "' class='btn btn-success'>Comprar</button>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>"
                        );
                }
            }
        })
        .catch(function (error) {
            console.error('Error en la petición AJAX:', error);
        });
}

$(document).ready(function () {
    loadProducts();
    console.log('SHOOOOOOP');
});
