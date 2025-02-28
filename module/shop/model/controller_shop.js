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
            $('#filters').hide(); // Ocultar filtros
            $('#details-product').show(); // Mostrar detalles
            $('#details-container-product-images').empty(); // Limpiar el contenedor de imágenes
            $('#details-container-product-details').empty(); // Limpiar el contenedor de detalles

            if (Array.isArray(data[1])) {
                for (let row of data[1]) {
                    $('#details-container-product-images').append(`
                        <div class='content-img-details'>
                            <img src='${row.img_product}' alt='Product Image'>
                        </div>
                    `);
                }
            }

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

function print_filters() {
    $('<div class="div-filters"></div>').appendTo('.filters')
      .html(
        "<div class='box-collapse'>" +
        "<div class='title-box-d'>" +
        "<h3 class='title-d'></h3>" +
        "</div>" +
        "<div class='box-collapse-wrap form'>" +
        "<form class='form-a'>" +
        "<div class='row'>" +
        "<div class='col-md-12 mb-2'>" +
        "<div class='form-group'>" +
        "</div>" +
        "<div class='col-md-6 mb-2'>" +
        "<div class='form-group'>" +
        "<label for='motortype'>Brand</label>" +
        "<select class='form-control form-control-lg form-control-a filter_motortype' id='motortype'>" +
        "<option value='Apple'>Apple</option>" +
        "<option value='Samsung'>Samsung</option>" +
        "<option value='Sony'>Sony</option>" +
        "<option value='Nike'>Nike</option>" +
        "<option value='Canon'>Canon</option>" +
        "<option value='Microsoft'>Microsoft</option>" +
        "<option value='LG'>LG</option>" +
        "<option value='Dell'>Dell</option>" +
        "<option value='Phillips'>Phillips</option>" +
        "<option value='Bosch'>Bosch</option>" +
        "<option value='Panasonic'>Panasonic</option>" +
        "<option value='Levis'>Levis</option>" +
        "<option value='Samsung Electrics'>Samsung Electrics</option>" +
        "<option value='Nike Sportswear'>Nike Sportswear</option>" +
        "<option value='Trek'>Trek</option>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "<div class='col-md-6 mb-2'>" +
        "<div class='form-group'>" +
        "<label for='category'>Catalog</label>" +
        "<select class='form-control form-control-lg form-control-a filter_category' id='category'>" +
        "<option value='Electronics'>Electronics</option>" +
        "<option value='Furniture'>Furniture</option>" +
        "<option value='Fashion'>Fashion</option>" +
        "<option value='Vehicles'>Vehicles</option>" +
        "<option value='Toys'>Toys</option>" +
        "<option value='Sports Equipment'>Sports Equipment</option>" +
        "<option value='Books'>Books</option>" +
        "<option value='Home Appliances'>Home Appliances</option>" +
        "<option value='Beauty'>Beauty</option>" +
        "<option value='Music Instruments'>Music Instruments</option>" +
        "<option value='Gardening'>Gardening</option>" +
        "<option value='Office Equipment'>Office Equipment</option>" +
        "<option value='Pet Supplies'>Pet Supplies</option>" +
        "<option value='Tools'>Tools</option>" +
        "<option value='Baby Products'>Baby Products</option>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "<div class='col-md-6 mb-2'>" +
        "<div class='form-group'>" +
        "<label for='brand'>Condition</label>" +
        "<select class='form-control form-control-lg form-control-a filter_brand' id='brand'>" +
        "<option value='New'>New</option>" +
        "<option value='Like New'>Like New</option>" +
        "<option value='Used'>Used</option>" +
        "<option value='Refurbished'>Refurbished</option>" +
        "<option value='Damaged'>Damaged</option>" +
        "<option value='Antique'>Antique</option>" +
        "<option value='Custom'>Custom</option>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "<div class='col-md-6 mb-2'>" +
        "<div class='form-group'>" +
        "<label for='sort'>City</label>" +
        "<select class='form-control form-control-lg form-control-a filter_sort' id='sort'>" +
        "<option value='Madrid'>Madrid</option>" +
        "<option value='Barcelona'>Barcelona</option>" +
        "<option value='Valencia'>Valencia</option>" +
        "<option value='Sevilla'>Sevilla</option>" +
        "<option value='Zaragoza'>Zaragoza</option>" +
        "<option value='Málaga'>Málaga</option>" +
        "<option value='Murcia'>Murcia</option>" +
        "<option value='Palma'>Palma</option>" +
        "<option value='Las Palmas'>Las Palmas</option>" +
        "<option value='Bilbao'>Bilbao</option>" +
        "<option value='Alicante'>Alicante</option>" +
        "<option value='Córdoba'>Córdoba</option>" +
        "<option value='Valladolid'>Valladolid</option>" +
        "<option value='Vigo'>Vigo</option>" +
        "<option value='Gijón'>Gijón</option>" +
        "<option value='Oviedo'>Oviedo</option>" +
        "<option value='Cádiz'>Cádiz</option>" +
        "<option value='Burgos'>Burgos</option>" +
        "<option value='Almería'>Almería</option>" +
        "<option value='Salamanca'>Salamanca</option>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "<div class='col-md-6 mb-2'>" +
        "<div class='form-group'>" +
        "<label for='sort'>Sort By</label>" +
        "<select class='form-control form-control-lg form-control-a filter_sort' id='sort'>" +
        "<option value='price'>Most Expensive</option>" +
        "<option value='price'>Less Expensive</option>" +
        "<option value='count_visites'>Most viewed</option>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<button class='filter_button button_spinner' id='Button_filter'>Filter</button>" +
        "<button class='filter_remove' id='filter_remove'>Remove</button>" +
        "</form>" +
        "</div>" +
        "</div>"
      );
  }

$(document).ready(function () {
    loadProducts();
    clicks();
    print_filters();
    console.log('SHOOOOOOP');
});