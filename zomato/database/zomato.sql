-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 08:34 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `address`, `city`, `pin`) VALUES
(9, 12, 'Block A- Bijoya Apartment,Sarada Pally,Bidhhangar', 'Kolkata', 700001),
(11, 13, '23/7 Govinda Street, Ramkrishna Appartment, Newtown', 'Kolkata', 700001);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `food_id`, `user_id`, `quantity`) VALUES
(6, 14, 9, 1),
(21, 5, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_type` varchar(20) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_code`, `coupon_type`, `coupon_value`, `cart_min_value`, `status`) VALUES
(1, 'MAX50', 'FLAT OFF', 50, 550, 0),
(2, '15PER', 'DISCOUNT', 15, 399, 1),
(3, 'CELBRT150', 'FLAT OFF', 150, 999, 1),
(4, 'GRAB25', 'DISCOUNT', 25, 799, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cuisine_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`, `cuisine_pic`) VALUES
(1, 'North Indian', 'https://images.pexels.com/photos/5835353/pexels-photo-5835353.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'),
(2, 'South Indian', 'https://images.pexels.com/photos/941869/pexels-photo-941869.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'),
(3, 'Chinese', 'https://images.pexels.com/photos/2664216/pexels-photo-2664216.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'),
(4, 'Biriyani', 'https://images.pexels.com/photos/6260921/pexels-photo-6260921.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'),
(5, 'Desserts', 'https://images.pexels.com/photos/4652682/pexels-photo-4652682.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `description`, `price`, `res_id`, `cus_id`) VALUES
(1, 'Dhokla', 'https://image.freepik.com/free-photo/gujrati-food-khaman-dhokla_57665-5420.jpg', 'an instant type dish made from gram flour (2 pieces)', 40, 1, 1),
(2, 'Alu Paratha', 'https://media.istockphoto.com/photos/vertical-view-of-indian-dish-alu-paratha-in-a-plate-picture-id1284004522', 'Indian breakfast of unleavened whole wheat savory and spiced potato stuffed flatbread (1 piece)', 60, 1, 1),
(3, 'Hazelnut Bliss Cake', 'https://images.pexels.com/photos/291528/pexels-photo-291528.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260', 'comprised of a layers of chocolate sponge cake, praline mousse, and hazelnut ganache.(1 piece)', 200, 1, 5),
(4, 'Mixed Fried Rice', 'https://images.pexels.com/photos/723198/pexels-photo-723198.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'rice cooked with veges, egg, prawn, chicken (1 plate)', 210, 2, 3),
(5, 'Chilli Chicken', 'https://media.istockphoto.com/photos/indian-chilli-chicken-dry-served-in-a-plate-over-moody-background-picture-id1072959600', 'sweet, spicy and crispy appetizer of crispy chicken (4 pieces)', 170, 2, 3),
(6, 'Chicken Biriyani', 'https://media.istockphoto.com/photos/authentic-chicken-biryani-with-onion-raita-picture-id516401834', 'made by layering marinated chicken and then layered with parboiled rice, herbs,saffron milk & then ghee (1 plate)', 265, 2, 4),
(7, 'Blueberry Cake', 'https://images.pexels.com/photos/827516/pexels-photo-827516.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'wild blueberries and a crunchy brown sugar and cinnamon topping flavour this easy cake (1 pound)', 450, 3, 5),
(8, 'Choco Caramel Cake', 'https://images.pexels.com/photos/697571/pexels-photo-697571.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'a moist and tender chocolate cake layered with a smooth salted caramel! Made without butter, eggs, or milk (qt : 1)', 210, 3, 5),
(9, 'Black Forest Cake', 'https://cdn.pixabay.com/photo/2014/11/16/18/04/german-black-forest-cake-533754_960_720.jpg', 'combines rich chocolate cake layers with fresh cherries, cherry liqueur, and a simple whipped cream frosting.(1 pound)', 240, 3, 5),
(10, 'Dosa', 'https://images.pexels.com/photos/5560763/pexels-photo-5560763.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'a thin pancake or crepe, originating, made from a fermented batter predominantly consisting of lentils and rice (1 piece)', 100, 4, 2),
(11, 'Idli', 'https://images.pexels.com/photos/4331490/pexels-photo-4331490.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'a soft & fluffy steamed cake made of fermented rice & lentil batter (4 pieces)', 90, 4, 2),
(12, 'Mapple Butter Waffle', 'https://media.istockphoto.com/photos/waffles-picture-id479016271', 'Crispy Raised Waffles with Warm Maple Butter (1 piece)', 350, 4, 5),
(13, 'Special Mutton Biriyani', 'https://images.pexels.com/photos/6260921/pexels-photo-6260921.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'a royal dish with beautifully spiced and fragrant layers of biriyani rice centered with juicy, tender mutton (1 plate)', 270, 5, 4),
(14, 'Dum Biriyani', 'https://media.istockphoto.com/photos/biryani-or-biriyani-indian-dish-cooked-basmati-rice-pulav-picture-id913241622', 'Layers of rice and meat cooked with rich and finger licking good masala in it\'s own (1 plate)', 300, 5, 4),
(15, 'Butter Naan', 'https://images.unsplash.com/photo-1565557623262-b51c2513a641?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=924&q=80', 'soft and fluffy and is made from plain flour with a little bit of yeast.(1 piece)', 35, 5, 1),
(16, 'Murgh Seekh Kebab', 'https://cdn.pixabay.com/photo/2018/05/03/05/19/skewer-3370443_960_720.jpg', 'An ally of the royal kitchen, this serving is prepared starting with minced meat, inserted on skewers forming cylindrical shapes.(3 pieces)', 240, 1, 1),
(17, 'Chhole Masala', 'https://images.unsplash.com/photo-1587033649720-6850605eb2f1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=718&q=80', 'It is a delicious & flavorful Indian curry made by cooking chickpeas in a spicy onion tomato masala gravy.(1 plate)', 140, 1, 1),
(18, 'Fried Chicken Wings', 'https://images.unsplash.com/photo-1553557202-e8e60357f061?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=667&q=80', 'Chicken wings are marinated in buttermilk, then coated in seasoned flour and deep fried to golden brown perfection.(2 pieces)', 150, 1, 1),
(19, 'Schezwan Noodles', 'https://images.unsplash.com/photo-1552611052-33e04de081de?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80', ' the most flavorful, spicy & hot noodles made using Szechuan sauce [egg+prawn+chicken]. (1 plate -- serves 1)', 145, 2, 3),
(20, 'Chicken Manchow Soup', 'https://cdn.pixabay.com/photo/2015/02/11/10/02/dumplings-632206_960_720.jpg', 'a dark brown Chinese soup. Chicken, mushrooms, carrots and other veggies simmered in mild flavors.', 175, 2, 3),
(21, 'Phirni', 'https://images.unsplash.com/photo-1589970343009-c6147c707b3d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80', 'It is a thick and creamy pudding made from ground rice, sugar, nuts and many more.(1 plate)', 80, 5, 5),
(22, 'Mutton Chap', 'https://image.shutterstock.com/image-photo/barbecue-leg-lamb-tomato-skewer-600w-1016251933.jpg', 'A mutton gravy dish cooked in cardamom, mace and cinnamon that can be served along with rumali rotis for a brilliant sunday dinner.(1 piece)', 220, 5, 1),
(23, 'Paneer in Hot Garlic Sauce', 'https://images.unsplash.com/photo-1551881192-002e02ad3d87?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80', 'Hot Garlic Sauce is a flavorsome Chinese style gravy, which is often relished with rice or noodles. Cubes of paneer are dipped into it.(1 plate)', 230, 5, 3),
(24, 'Pistachio Roll', 'https://image.shutterstock.com/image-photo/traditional-french-christmas-homemade-pastry-600w-1514737724.jpg', 'Made using 80% high quality pistachio, honey syrup and grade A clarified butter.', 70, 2, 5),
(25, 'Strawberry Mousse Jar', 'https://image.shutterstock.com/image-photo/homemade-delicious-tiramisu-jar-fresh-600w-355330673.jpg', 'A Tart Cheesy base on Graham Cracker Crust topped with a Dreamy strawberries! (1 small jar)', 100, 3, 5),
(26, 'Italian Butterscotch Ice Cream', 'https://image.shutterstock.com/image-photo/salted-caramel-ice-creams-on-600w-665409292.jpg', 'An italian twist on the classic english butterscotch, creamy butterscotch gelato combined with butterscotch drops that add a delightful crunch.', 120, 3, 5),
(27, 'Chocolate Truffle Cake', 'https://images.unsplash.com/photo-1586985289906-406988974504?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80', 'It\'s simple, consisting of chocolate, heavy cream, and butter.(1 pound)', 400, 3, 5),
(28, 'Poha', 'https://image.shutterstock.com/image-photo/alookanda-poha-tarri-pohe-spicy-600w-1282013134.jpg', 'Poha is rice that has been parboiled, rolled, flattened and then dried to produce flakes.\r\n(Serves 1)', 117, 4, 2),
(29, 'Veggie Uttapam\r\n\r\n', 'https://image.shutterstock.com/image-photo/uthappam-type-dosa-south-india-600w-1791640919.jpg', 'Plain Uttapam cooked with layered fresh veggies .. Served with three coconut chutneys and sambar.(2 pieces)', 180, 4, 2),
(30, 'Cheese Curd Rice Platter', 'https://image.shutterstock.com/image-photo/shai-pulao-vegetable-indian-biryani-600w-306820772.jpg', 'Tangy Curd Rice with lots of love and Amul Cheese mixed up, served with Potato Fries and Sambhar and three different Coconut Chutney. (1 plate)', 195, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `food_id`, `quantity`) VALUES
(48, '6078334fb2ae4', 2, 2),
(49, '6078334fb2ae4', 3, 1),
(50, '6078334fb2ae4', 5, 1),
(53, '60784750591a7', 16, 2),
(54, '607938f0a2073', 7, 1),
(55, '607938f0a2073', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_track`
--

CREATE TABLE `order_track` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_total` int(11) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `address` int(11) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_track`
--

INSERT INTO `order_track` (`id`, `user_id`, `order_date`, `order_total`, `coupon`, `address`, `payment_mode`, `payment_status`, `order_status`) VALUES
('6078334fb2ae4', 12, '2021-04-15 06:06:31', 490, '15PER', 9, 'COD', 'Paid', 'Purchased'),
('607938f0a2073', 12, '2021-04-16 12:42:48', 540, '15PER', 9, 'Amazon pay', 'Paid', 'Purchased');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `address`, `image`, `rating`, `rate`) VALUES
(1, 'Food Steps', '70 /, S N Banerjee Road, Entally', 'https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80', '4.2', 200),
(2, 'Tai Wah', 'C-100 Ttc Industrial Area, Krishi Bazaar', 'https://images.unsplash.com/photo-1537047902294-62a40c20a6ae?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=375&q=80', '4.5', 300),
(3, 'Bakers Village', 'Sec-1, Ab-194, Salt Lake', 'https://images.unsplash.com/photo-1590846406792-0adc7f938f1d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=332&q=80', '4.8', 175),
(4, 'Simply Dakshin', 'C-10, Sec-23, Janta Market, Belapur Road', 'https://images.unsplash.com/photo-1585518419759-7fe2e0fbf8a6?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1524&q=80', '4.6', 250),
(5, 'Kolkata Biriyani', '36 , B B Ganguly Street, Bowbazar', 'https://images.unsplash.com/photo-1544148103-0773bf10d330?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=750&q=80', '4.5', 290);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `review_tag` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `review_date` datetime NOT NULL,
  `rating_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `restaurant_id`, `review_tag`, `review_text`, `review_date`, `rating_score`) VALUES
(1, 12, 1, 'Good', 'tastes good, spicy', '2021-04-16 11:43:32', 4),
(2, 12, 3, 'Brilliant', 'tastes amazing', '2021-04-16 11:46:44', 5),
(3, 12, 2, 'Bad', 'not upto the mark', '2021-04-16 11:48:54', 2),
(6, 13, 1, 'Not Good', 'pungent smell', '2021-04-17 10:47:04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `profile_pic`) VALUES
(12, 'Sohini Roy', 'sohini@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Profile-PNG-Icon.png'),
(13, 'Neha Sharma', 'neha@gmail.com', '81fa378af891271754912dac8aa5997c', 'Profile-PNG-Icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',
  `food_pref` varchar(255) NOT NULL,
  `ph_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `profile_pic`, `food_pref`, `ph_no`) VALUES
(2, 12, 'Profile-PNG-Icon.png', 'Chinese', '2578963645'),
(3, 13, 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_track`
--
ALTER TABLE `order_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `cuisines` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
