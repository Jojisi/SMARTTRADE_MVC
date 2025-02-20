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
                                    <button id='btn_${data[row].id_product}'>Buy NOW</button>
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

$(document).ready(function () {
    loadProducts();
    console.log('SHOOOOOOP');
});

