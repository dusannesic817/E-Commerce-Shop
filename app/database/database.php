
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


$sql="CREATE TABLE IF NOT EXISTS `products`(
  `id`  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  `description` VARCHAR(255),
  `price` DECIMAL(10, 2),
  `image` VARCHAR(255),
  `kolicina` INT,
  `size` CHAR(1),
  `club_id` INT UNSIGNED NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  FOREIGN KEY(`club_id`) REFERENCES `clubs`(`id`),
  FOREIGN KEY(`category_id`) REFERENCES `categories`(`id`)


)ENGINE = InnoDB;

";

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