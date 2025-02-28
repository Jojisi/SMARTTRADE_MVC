// function loadProducts() {
//     ajaxForSearch('module/shop/controller/controller_shop.php?op=all_products');
// }

function loadProducts() {
    var brand_filter = JSON.parse(localStorage.getItem('brand_filter')) || false;
    var catalog_filter = JSON.parse(localStorage.getItem('catalog_filter')) || false;
    var condition_filter = JSON.parse(localStorage.getItem('condition_filter')) || false;
    var city_filter = JSON.parse(localStorage.getItem('city_filter')) || false;
    var sort_filter = JSON.parse(localStorage.getItem('sort_filter')) || false;
    var search_filter = JSON.parse(localStorage.getItem('filters_search')) || false;
    var trending_filters = JSON.parse(localStorage.getItem('trending_filter')) || false;
    // console.log(search_filter);
    var filter = JSON.parse(localStorage.getItem('filter'));
  
    if (brand_filter != false) {
      // console.log(brand);
        ajaxForSearch('module/shop/controller/controller_shop.php?op=filter' , [brand_filter]);
    } else if (catalog_filter != false) {
      // console.log(category);  
        ajaxForSearch('module/shop/controller/controller_shop.php?op=filter' , [catalog_filter]);
    } else if (condition_filter != false) {
        ajaxForSearch('module/shop/controller/controller_shop.php?op=filter' , [condition_filter]);
    } else if (city_filter != false) {
        ajaxForSearch('module/shop/controller/controller_shop.php?op=filter' , [city_filter]);
    } else if (sort_filter != false) {
        ajaxForSearch('module/shop/ctrl/ctrl_shop.php?op=filter' , [sort_filter]);
    } else if (search_filter != false) {
        ajaxForSearch('module/shop/ctrl/ctrl_shop.php?op=filter' , [search_filter]);
    } else if (trending_filters != false) {
        loadDetails(trending_filters[1]); //Sin el LoadDetails no funciona
    } else if (filter != undefined) {
        ajaxForSearch("module/shop/controller/controller_shop.php?op=filter", filter);
    } else {
        ajaxForSearch("module/shop/controller/controller_shop.php?op=all_products");
    }
  }

function ajaxForSearch(url, filter) {
    ajaxPromise(url, 'GET', 'JSON', { 'filter': filter })
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
            $('.filters').empty(); // Limpiar los filtros

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
        "<label for='brand'>Brand</label>" +
        "<select class='form-control form-control-lg form-control-a filter_brand' id='brand'>" +
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
        "<label for='catalog'>Catalog</label>" +
        "<select class='form-control form-control-lg form-control-a filter_catalog' id='catalog'>" +
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
        "<label for='conditiontype'>Condition</label>" +
        "<select class='form-control form-control-lg form-control-a filter_condition' id='conditiontype'>" +
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
        "<label for='city'>City</label>" +
        "<select class='form-control form-control-lg form-control-a filter_city' id='city'>" +
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

  function filter_button() {
    console.log("filter_button");
    //Filtro brand
    $(function () {
      $('.filter_brand').change(function () {
        localStorage.setItem('filter_brand', this.value);
      });
      if (localStorage.getItem('filter_brand')) {
        $('.filter_brand').val(localStorage.getItem('filter_brand'));
      }
    });
  
    //Filtro catalog
    $(function () {
      $('.filter_catalog').change(function () {
        localStorage.setItem('filter_catalog', this.value);
      });
      if (localStorage.getItem('filter_catalog')) {
        $('.filter_catalog').val(localStorage.getItem('filter_catalog'));
      }
    });
  
    //Filtro de conditiontype
    $(function () {
      $('.filter_condition').change(function () {
        localStorage.setItem('filter_condition', this.value);
      });
      if (localStorage.getItem('filter_condition')) {
        $('.filter_condition').val(localStorage.getItem('filter_condition'));
      }
    });
  
      //Filtro de city
      $(function () {
        $('.filter_city').change(function () {
          localStorage.setItem('filter_city', this.value);
        });
        if (localStorage.getItem('filter_city')) {
          $('.filter_city').val(localStorage.getItem('filter_city'));
        }
      });

      //Filtro de sort
      $(function () {
        $('.filter_sort').change(function () {
          localStorage.setItem('filter_sort', this.value);
        });
        if (localStorage.getItem('filter_sort')) {
          $('.filter_sort').val(localStorage.getItem('filter_sort'));
        }
      });
  
    $(document).on('click', '.filter_button', function () {
      var filter = [];
  
      if (localStorage.getItem('filter_brand')) {
        filter.push(['id_brand', localStorage.getItem('filter_brand')])
      }
      if (localStorage.getItem('filter_catalog')) {
        filter.push(['id_catalog', localStorage.getItem('filter_catalog')])
      }
      if (localStorage.getItem('filter_condition')) {
        filter.push(['id_condition_type', localStorage.getItem('filter_condition')])
      }
      if (localStorage.getItem('filter_city')) {
        filter.push(['id_city', localStorage.getItem('filter_city')])
      }
      if (localStorage.getItem('filter_sort')) {
        filter.push(['sort', localStorage.getItem('filter_sort')])
      }
  
  
  
      localStorage.setItem('filter', JSON.stringify(filter));
  
      if (filter) {
        ajaxForSearch("module/shop/controller/controller_shop.php?op=filter", filter);
      }
      else {
        ajaxForSearch("module/shop/controller/controller_shop.php?op=all_products");
      }
      // highlight(filter);
  
    });
  }

  function load_details() {
    $(document).on('click', '.link', function () {
      var id = this.getAttribute('id');
      details(id);
    })
  }
  
  function remove_filters() {
    $(document).on('click', '.filter_remove', function () {
      localStorage.removeItem('filter_brand');
      localStorage.removeItem('filter_catalog');
      localStorage.removeItem('filter_condition');
      localStorage.removeItem('filter_city');
      localStorage.removeItem('filter_sort');
      
      localStorage.removeItem('sort_filter');
      localStorage.removeItem('city_filter');
      localStorage.removeItem('condition_filter');
      localStorage.removeItem('catalog_filter');
      localStorage.removeItem('brand_filter');
  
      localStorage.removeItem('filter');
      location.reload();
    })
  }

$(document).ready(function () {
    loadProducts();
    clicks();
    print_filters();
    filter_button();
    remove_filters();
    console.log('SHOOOOOOP');
});