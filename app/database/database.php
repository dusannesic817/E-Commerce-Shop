
<?php
  
  require_once "../config/config.php";

  $sql = "CREATE TABLE IF NOT EXISTS `clubs`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) UNIQUE,
    `image` VARCHAR(255) ,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;";
/*
$sql='
INSERT INTO `clubs`(`id`, `name`, `image`)
VALUES
("","Arsenal","arsenal.png"),
("","Aston Villa", "aston_vila.png"),
("","Bornemouth", "bornemouth.png"),
("","Brenford", "brenford.png"),
("","Brighton", "brighton.png"),
("","Burnley", "burnley.png"),
("","Chelsea", "chelsea.png"),
("","Crystal Palas", "crystal_palas.png"),
("","Everton", "everton.png"),
("","Fulham", "fulham.png"),
("","Liverpool", "liverpool.png"),
("","Luton Town", "luton_town.png"),
("","Manchester City", "man_city.png"),
("","Machester United", "man_utd.png"),
("","Newcastle", "newcastle.png"),
("","Nottingham Forrest", "nottingham_forest.png"),
("","Sheffield United", "sheffield_united.png"),
("","Totenham", "totenham.png"),
("","Wolves", "wolves.png"),
("","West Ham", "west_ham.png");

';
*/


$sql= "CREATE TABLE IF NOT EXISTS `countries`(
        `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        `country` VARCHAR(255),
        `zip` VARCHAR(255)
)ENGINE = InnoDB;

";

$sql=" CREATE TABLE IF NOT EXISTS `users`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL UNIQUE,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `number` VARCHAR(255) NOT NULL,
  `adress` VARCHAR(255) NOT NULL,
  `is_admin` BIT DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `coutry_id` INT UNSIGNED NOT NULL,
  FOREIGN KEY(`coutry_id`) REFERENCES `countries`(`id`)
  

)ENGINE = InnoDB;";


$sql = " CREATE TABLE IF NOT EXISTS `categories`
(`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR(255)

)ENGINE = InnoDB;
";




$sql="CREATE TABLE IF NOT EXISTS `size`(
  `id`INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `size_name` CHAR(3)


); ";

$sql="CREATE TABLE IF NOT EXISTS `products`(
  `id`  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  `description` VARCHAR(255),
  `price` DECIMAL(10, 2),
  `image` VARCHAR(255),
  `quantity` INT,
  `club_id` INT UNSIGNED NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  FOREIGN KEY(`club_id`) REFERENCES `clubs`(`id`),
  FOREIGN KEY(`category_id`) REFERENCES `categories`(`id`)

)ENGINE = InnoDB;

";



$sql="CREATE TABLE IF NOT EXISTS `cart` (
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `quantity` VARCHAR(255),
  `user_id` INT UNSIGNED,
  `product_id` INT UNSIGNED,
  `size_id` INT UNSIGNED,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`),
  FOREIGN KEY (`size_id`) REFERENCES `size`(`id`)
) ENGINE = InnoDB;";

/*
$sql="CREATE TABLE IF NOT EXISTS `orders`(
  `id`INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED,
  `delivery_adress` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
)ENGINE = InnoDB;";

$sql="CREATE TABLE IF NOT EXISTS `order_items`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `order_id` INT UNSIGNED,
  `product_id` INT UNSIGNED,
  `quantity` VARCHAR(255),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`),
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`)


)ENGINE = InnoDB;";*/


$sql="CREATE TABLE IF NOT EXISTS `delivery_adreses`(
  `id`INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `first_name` VARCHAR(255),
  `last_name` VARCHAR(255),
  `email` VARCHAR(255),
  `adress` VARCHAR(255),
  `country` VARCHAR(255),
  `number` VARCHAR(255)

)";



$sql="CREATE TABLE IF NOT EXISTS `orders`(
  `id`INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED,
  `delivery_adress_id` INT UNSIGNED,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`delivery_adress_id`) REFERENCES `delivery_adreses`(`id`)

)ENGINE = InnoDB;";

$sql="CREATE TABLE IF NOT EXISTS `order_items`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `order_id` INT UNSIGNED,
  `product_id` INT UNSIGNED,
  `quantity` VARCHAR(255),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`),
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`)


)ENGINE = InnoDB;";

/*
$sql="INSERT INTO `size`(`id`,`size_name`)
VALUES
 ('','S'),
 ('','M'),
 ('','L'),
 ('','XL'),
 ('','XXL')
";*/
/*
$sql="INSERT INTO products (id, name, description, price, image, quantity, club_id, category_id)
VALUES
    (1, 'Home Jersey ', "The Adidas Arsenal Football Club 2022-23 jersey is red and white, without any blue detailing for the first since Adidas", 79.99, 'arsenal_home.jpg', 10, 1, 1),
    (2, 'Away Jersey', "The Adidas Arsenal FC 23-24 away football shirt has a bright and modern look. It combines a fluo-green-yellow base color with black/bright blue for logos and applications.", 59.99, 'aresnal_away.jpg', 20, 1, 1),
    (3, 'Home Jersey', 'New Aston Villa Jersey', 9.99, 'aston_vila_home.jpg', 15, 2, 1),
    (4, 'Souvenir 4', 'Opis proizvoda 4', 39.99, 'slika4.jpg', 30, 2, 2),
    (5, 'Proizvod 5', 'Opis proizvoda 5', 14.99, 'slika5.jpg', 25, 5, 2);";*/


/*
$sql="INSERT INTO `categories`(`id`,`name`)
VALUES
('','Jersey'),
('', 'Souvenir')


";*/

/*
$sql='
INSERT INTO `countries`(`id`, `country`, `zip`)
VALUES
("","Serbia", "+381"),
("","France", "+333"),
("","Bosnia", "+334"),
("","Montenegro", "+383")


';*/


if($conn->multi_query($sql)){
  echo "<p>Tables created successfully</p>";
}else{
  header("location:index.php");
}

?>