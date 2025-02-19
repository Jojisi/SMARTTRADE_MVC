-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2025 a las 18:27:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `smarttrade`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`id_brand`, `name`, `img_brand`) VALUES
(1, 'Apple', 'view/img/brand/apple.png'),
(2, 'Samsung', 'view/img/brand/samsung.png'),
(3, 'Sony', 'view/img/brand/sony.png'),
(4, 'Nike', 'view/img/brand/nike.png'),
(5, 'Canon', 'view/img/brand/canon.png'),
(6, 'Microsoft', 'view/img/brand/microsoft.png'),
(7, 'LG', 'view/img/brand/lg.png'),
(8, 'Dell', 'view/img/brand/dell.png'),
(9, 'Philips', 'view/img/brand/philips.png'),
(10, 'Bosch', 'view/img/brand/bosch.png'),
(11, 'Panasonic', 'view/img/brand/panasonic.png'),
(12, 'Levis', 'view/img/brand/levis.png'),
(13, 'Samsung Electronics', 'view/img/brand/samsung_electronics.png'),
(14, 'Nike Sportswear', 'view/img/brand/nike_sportswear.png'),
(15, 'Trek', 'view/img/brand/trek.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog`
--

CREATE TABLE `catalog` (
  `id_catalog` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_catalog` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalog`
--

INSERT INTO `catalog` (`id_catalog`, `name`, `img_catalog`) VALUES
(1, 'Electronics', 'view/img/catalog/electronics.png'),
(2, 'Furniture', 'view/img/catalog/furniture.png'),
(3, 'Fashion', 'view/img/catalog/fashion.png'),
(4, 'Vehicles', 'view/img/catalog/vehicles.png'),
(5, 'Toys', 'view/img/catalog/toys.png'),
(6, 'Sports Equipment', 'view/img/catalog/sports_equipment.png'),
(7, 'Books', 'view/img/catalog/books.png'),
(8, 'Home Appliances', 'view/img/catalog/home_appliences.png'),
(9, 'Beauty', 'view/img/catalog/beauty.png'),
(10, 'Music Instruments', 'view/img/catalog/music_instruments.png'),
(11, 'Gardening', 'view/img/catalog/gardening.png'),
(12, 'Office Equipment', 'view/img/catalog/office_equipment.png'),
(13, 'Pet Supplies', 'view/img/catalog/pet_supplies.png'),
(14, 'Tools', 'view/img/catalog/tools.png'),
(15, 'Baby Products', 'view/img/catalog/baby_products.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `name_city` varchar(100) NOT NULL,
  `img_city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`id_city`, `name_city`, `img_city`) VALUES
(1, 'Madrid', 'view/img/city/madrid.jpg'),
(2, 'Barcelona', 'view/img/city/barcelona.jpg'),
(3, 'Valencia', 'view/img/city/valencia.jpg'),
(4, 'Sevilla', 'view/img/city/sevilla.jpg'),
(5, 'Zaragoza', 'view/img/city/zaragoza.jpg'),
(6, 'Málaga', 'view/img/city/malaga.jpg'),
(7, 'Murcia', 'view/img/city/murcia.jpg'),
(8, 'Palma', 'view/img/city/palma.jpg'),
(9, 'Las Palmas', 'view/img/city/las_palmas.jpg'),
(10, 'Bilbao', 'view/img/city/bilbao.jpg'),
(11, 'Alicante', 'view/img/city/alicante.jpg'),
(12, 'Córdoba', 'view/img/city/cordoba.jpg'),
(13, 'Valladolid', 'view/img/city/valladolid.jpg'),
(14, 'Vigo', 'view/img/city/vigo.jpg'),
(15, 'Gijón', 'view/img/city/gijon.jpg'),
(16, 'Oviedo', 'view/img/city/oviedo.jpg'),
(17, 'Cádiz', 'view/img/city/cadiz.jpg'),
(18, 'Burgos', 'view/img/city/burgos.jpg'),
(19, 'Almería', 'view/img/city/almeria.jpg'),
(20, 'Salamanca', 'view/img/city/salamanca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conditiontype`
--

CREATE TABLE `conditiontype` (
  `id_condition_type` int(11) NOT NULL,
  `name_condition_type` varchar(50) NOT NULL,
  `img_condition_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conditiontype`
--

INSERT INTO `conditiontype` (`id_condition_type`, `name_condition_type`, `img_condition_type`) VALUES
(1, 'New', 'view/img/condition/new.png'),
(2, 'Like New', 'view/img/condition/like_new.png'),
(3, 'Used', 'view/img/condition/used.png'),
(4, 'Refurbished', 'view/img/condition/refurbished.png'),
(5, 'Damaged', 'view/img/condition/damaged.png'),
(6, 'Antique', 'view/img/condition/antique.png'),
(7, 'Custom', 'view/img/condition/custom.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `id_img` int(11) NOT NULL,
  `img_product` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`id_img`, `img_product`, `product_id`) VALUES
(1, 'iphone12_1.jpg', 1),
(2, 'iphone12_2.jpg', 1),
(3, 'macbookpro16_1.jpg', 2),
(4, 'macbookpro16_2.jpg', 2),
(5, 'galaxys21_1.jpg', 3),
(6, 'galaxys21_2.jpg', 3),
(7, 'vintage_bicycle_1.jpg', 4),
(8, 'vintage_bicycle_2.jpg', 4),
(9, 'sony_4k_tv_1.jpg', 5),
(10, 'sony_4k_tv_2.jpg', 5),
(11, 'xbox_series_x_1.jpg', 6),
(12, 'xbox_series_x_2.jpg', 6),
(13, 'dining_table_set_1.jpg', 7),
(14, 'dining_table_set_2.jpg', 7),
(15, 'canon_eos5d_1.jpg', 8),
(16, 'canon_eos5d_2.jpg', 8),
(17, 'ps5_1.jpg', 9),
(18, 'ps5_2.jpg', 9),
(19, 'electric_scooter_1.jpg', 10),
(20, 'electric_scooter_2.jpg', 10),
(21, 'gaming_chair_1.jpg', 11),
(22, 'gaming_chair_2.jpg', 11),
(23, 'coffee_machine_1.jpg', 12),
(24, 'coffee_machine_2.jpg', 12),
(25, 'mountain_bike_1.jpg', 13),
(26, 'mountain_bike_2.jpg', 13),
(27, 'leather_sofa_1.jpg', 14),
(28, 'leather_sofa_2.jpg', 14),
(29, 'smart_watch_1.jpg', 15),
(30, 'smart_watch_2.jpg', 15),
(31, 'fridge_freezer_1.jpg', 16),
(32, 'fridge_freezer_2.jpg', 16),
(33, 'electric_guitar_1.jpg', 17),
(34, 'electric_guitar_2.jpg', 17),
(35, 'washing_machine_1.jpg', 18),
(36, 'washing_machine_2.jpg', 18),
(37, 'camping_tent_1.jpg', 19),
(38, 'camping_tent_2.jpg', 19),
(39, 'ps_vr_1.jpg', 20),
(40, 'ps_vr_2.jpg', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model`
--

CREATE TABLE `model` (
  `id_model` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_model` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `model`
--

INSERT INTO `model` (`id_model`, `name`, `img_model`, `brand_id`) VALUES
(1, 'iPhone 12', 'iphone12.jpg', 1),
(2, 'Galaxy S21', 'galaxys21.jpg', 2),
(3, 'Bravia 55\"', 'bravia_55.jpg', 3),
(4, 'Air Force 1', 'air_force_1.jpg', 4),
(5, 'EOS 5D', 'eos5d.jpg', 5),
(6, 'Surface Pro 7', 'surface_pro7.jpg', 6),
(7, 'OLED TV', 'oled_tv.jpg', 7),
(8, 'XPS 13', 'xps13.jpg', 8),
(9, 'Hue Lights', 'hue_lights.jpg', 9),
(10, 'Bosch Dishwasher', 'bosch_dishwasher.jpg', 10),
(11, 'Panasonic Lumix', 'lumix.jpg', 11),
(12, 'Levi\'s 501', 'levis_501.jpg', 12),
(13, 'Galaxy Tab', 'galaxy_tab.jpg', 13),
(14, 'Nike Air Max', 'air_max.jpg', 14),
(15, 'Trek MTB 29', 'trek_mtb.jpg', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `visit_count` int(11) DEFAULT 0,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `img_product` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `condition_id` int(11) NOT NULL,
  `sale_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `name`, `description`, `price`, `stock`, `visit_count`, `lat`, `lng`, `img_product`, `user_id`, `condition_id`, `sale_status_id`) VALUES
(1, 'iPhone 12', 'Brand new iPhone 12, 128GB, Space Gray', 799.99, 10, 200, 40.7128, -74.006, 'iphone12.jpg', 1, 1, 1),
(2, 'MacBook Pro 16\"', 'Used MacBook Pro with 16-inch screen, 512GB SSD, 16GB RAM', 1500.00, 5, 150, 34.0522, -118.244, 'macbookpro16.jpg', 2, 2, 1),
(3, 'Samsung Galaxy S21', 'Almost new Samsung Galaxy S21, 128GB, Phantom Gray', 699.00, 8, 180, 41.8781, -87.6298, 'galaxys21.jpg', 3, 2, 1),
(4, 'Vintage Bicycle', 'Vintage bicycle, good condition, perfect for city rides', 150.00, 3, 50, 37.7749, -122.419, 'vintage_bicycle.jpg', 4, 3, 1),
(5, 'Sony 4K TV', 'Refurbished Sony 4K UHD TV, 55-inch, with remote and stand', 599.00, 2, 40, 51.5074, -0.1278, 'sony_4k_tv.jpg', 5, 4, 1),
(6, 'Xbox Series X', 'Brand new Xbox Series X, includes 1 controller', 499.99, 10, 300, 29.7604, -95.3698, 'xbox_series_x.jpg', 6, 1, 1),
(7, 'Dining Table Set', 'Used dining table set with 6 chairs, in good condition', 300.00, 2, 30, 48.8566, 2.3522, 'dining_table_set.jpg', 7, 3, 1),
(8, 'Canon EOS 5D', 'Used Canon EOS 5D camera with two lenses', 1200.00, 4, 120, 40.7128, -74.006, 'canon_eos5d.jpg', 8, 3, 1),
(9, 'PlayStation 5', 'Brand new PlayStation 5, includes 1 controller', 499.00, 15, 500, 34.0522, -118.244, 'ps5.jpg', 9, 1, 1),
(10, 'Electric Scooter', 'Like new electric scooter, max speed 25mph', 350.00, 6, 80, 41.8781, -87.6298, 'electric_scooter.jpg', 10, 2, 1),
(11, 'Gaming Chair', 'Ergonomic gaming chair, adjustable, used but in excellent condition', 150.00, 5, 60, 41.3879, 2.1699, 'gaming_chair.jpg', 11, 2, 1),
(12, 'Coffee Machine', 'Refurbished coffee machine, 12-cup capacity, fully functional', 80.00, 10, 110, 40.7306, -73.9352, 'coffee_machine.jpg', 12, 4, 1),
(13, 'Mountain Bike', 'Used mountain bike, great for outdoor adventures, good condition', 200.00, 4, 70, 43.6532, -79.3832, 'mountain_bike.jpg', 13, 3, 1),
(14, 'Leather Sofa', 'Lightly used leather sofa, very comfortable, dark brown', 350.00, 2, 150, 40.7306, -73.9352, 'leather_sofa.jpg', 14, 2, 1),
(15, 'Smart Watch', 'Like new smart watch, compatible with iOS and Android', 150.00, 10, 220, 39.9042, 116.407, 'smart_watch.jpg', 15, 2, 1),
(16, 'Fridge Freezer', 'Refurbished fridge freezer combo, large size, energy efficient', 450.00, 3, 80, 41.9028, 12.4964, 'fridge_freezer.jpg', 16, 4, 1),
(17, 'Electric Guitar', 'Used electric guitar with amp, great for beginners', 180.00, 7, 60, 48.8566, 2.3522, 'electric_guitar.jpg', 17, 3, 1),
(18, 'Washing Machine', 'Like new washing machine, top load, 6kg capacity', 200.00, 9, 90, 40.7306, -73.9352, 'washing_machine.jpg', 18, 2, 1),
(19, 'Camping Tent', 'Used camping tent, 4-person capacity, in good condition', 100.00, 8, 50, 40.7128, -74.006, 'camping_tent.jpg', 19, 3, 1),
(20, 'PlayStation VR', 'Used PlayStation VR headset with controllers, great for immersive gaming', 250.00, 6, 150, 37.7749, -122.419, 'ps_vr.jpg', 20, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productcondition`
--

CREATE TABLE `productcondition` (
  `id_product_contidition` int(11) NOT NULL,
  `condition_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productcondition`
--

INSERT INTO `productcondition` (`id_product_contidition`, `condition_type_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_brand`
--

CREATE TABLE `product_brand` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product_brand`
--

INSERT INTO `product_brand` (`product_id`, `brand_id`) VALUES
(1, 1),
(2, 6),
(3, 2),
(4, 4),
(5, 3),
(6, 6),
(7, 7),
(8, 5),
(9, 6),
(10, 10),
(11, 6),
(12, 4),
(13, 15),
(14, 1),
(15, 2),
(16, 12),
(17, 15),
(18, 5),
(19, 11),
(20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_catalog`
--

CREATE TABLE `product_catalog` (
  `product_id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product_catalog`
--

INSERT INTO `product_catalog` (`product_id`, `catalog_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 2),
(14, 1),
(15, 1),
(16, 2),
(17, 1),
(18, 2),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_city`
--

CREATE TABLE `product_city` (
  `product_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salestatus`
--

CREATE TABLE `salestatus` (
  `id_sale_status` int(11) NOT NULL,
  `status_state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salestatus`
--

INSERT INTO `salestatus` (`id_sale_status`, `status_state`) VALUES
(1, 'Available'),
(2, 'Sold'),
(3, 'Pending'),
(4, 'Reserved'),
(5, 'Archived'),
(6, 'In Negotiation'),
(7, 'Returned');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indices de la tabla `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Indices de la tabla `conditiontype`
--
ALTER TABLE `conditiontype`
  ADD PRIMARY KEY (`id_condition_type`);

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `condition_id` (`condition_id`),
  ADD KEY `sale_status_id` (`sale_status_id`);

--
-- Indices de la tabla `productcondition`
--
ALTER TABLE `productcondition`
  ADD PRIMARY KEY (`id_product_contidition`),
  ADD KEY `condition_type_id` (`condition_type_id`);

--
-- Indices de la tabla `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`product_id`,`brand_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indices de la tabla `product_catalog`
--
ALTER TABLE `product_catalog`
  ADD PRIMARY KEY (`product_id`,`catalog_id`),
  ADD KEY `catalog_id` (`catalog_id`);

--
-- Indices de la tabla `product_city`
--
ALTER TABLE `product_city`
  ADD PRIMARY KEY (`product_id`,`city_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indices de la tabla `salestatus`
--
ALTER TABLE `salestatus`
  ADD PRIMARY KEY (`id_sale_status`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `conditiontype`
--
ALTER TABLE `conditiontype`
  MODIFY `id_condition_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `image`
--
ALTER TABLE `image`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `productcondition`
--
ALTER TABLE `productcondition`
  MODIFY `id_product_contidition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `salestatus`
--
ALTER TABLE `salestatus`
  MODIFY `id_sale_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`condition_id`) REFERENCES `productcondition` (`id_product_contidition`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sale_status_id`) REFERENCES `salestatus` (`id_sale_status`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productcondition`
--
ALTER TABLE `productcondition`
  ADD CONSTRAINT `productcondition_ibfk_1` FOREIGN KEY (`condition_type_id`) REFERENCES `conditiontype` (`id_condition_type`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_brand`
--
ALTER TABLE `product_brand`
  ADD CONSTRAINT `product_brand_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_brand_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_catalog`
--
ALTER TABLE `product_catalog`
  ADD CONSTRAINT `product_catalog_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_catalog_ibfk_2` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id_catalog`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_city`
--
ALTER TABLE `product_city`
  ADD CONSTRAINT `product_city_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_city_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id_city`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
