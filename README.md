# Fabelio Price Monitor App

This app specialize to capture fabelio product data such as item name, price, description, images and capture price every hour using cron job.

## Demo
[Link to Demo](https://pricemonitorandre.herokuapp.com/) 

## Technology Stack
Front-End : CSS, HTML, JS, Bootstrap Template customized by [creative-tim.com](https://www.creative-tim.com/product/argon-dashboard) <br/>
Back-End : PHP 7.3, Codeigniter Framework

## Installation - Local

Assume you already install xampp then go to htdocs directory and type this CLI command :

```bash
git clone https://github.com/andreagrifap/price_monitor_app.git
composer update
```

## Installation - Mysql Database
Run this sql script :

```mysql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `price_monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `img_url` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_link`
--

CREATE TABLE `product_link` (
  `id` int(10) NOT NULL,
  `url` varchar(250) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_price_history`
--

CREATE TABLE `product_price_history` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_link`
--
ALTER TABLE `product_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_price_history`
--
ALTER TABLE `product_price_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_link`
--
ALTER TABLE `product_link`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_price_history`
--
ALTER TABLE `product_price_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;
```

## Cron Job - Price History
The price history is stored every hour through cron job function located on controller **Cron/getPriceScrape**

## Unit Testing
For unit testing this project use PHPUnit 9.1 . You can run the unit testing using CLI in directory **application/tests/** using this command :
```bash
../../vendor/bin/phpunit
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)