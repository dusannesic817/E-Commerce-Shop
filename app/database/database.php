
<?php
  
  require_once "../config/config.php";

  $sql = "CREATE TABLE IF NOT EXISTS `clubs`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) UNIQUE,
    `image` VARCHAR(255) ,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;";
<<<<<<< HEAD

/*$sql='
=======
/*
$sql='
>>>>>>> 86b01233fae10f3982987cd187f29fc443484422
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

<<<<<<< HEAD
';*/
=======
';
*/
>>>>>>> 86b01233fae10f3982987cd187f29fc443484422

$sql = 'CREATE TABLE IF NOT EXISTS `jerseys`(
        `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `type` VARCHAR(255),
        `year` INT,
        `price` DECIMAL(10, 2),
        `image` VARCHAR(255),
        `club_id` INT UNSIGNED NOT NULL UNIQUE,
        FOREIGN KEY(club_id) REFERENCES clubs(id) 
        ) ENGINE = InnoDB;';

<<<<<<< HEAD
$sql="CREATE TABLE IF NOT EXISTS `users`(

  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `username` VARCHAR (255) UNIQUE NOT NULL,
  `password` VARCHAR (255) NOT NULL,
  `email` VARCHAR(255) UNIQUE NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  `zip`  VARCHAR(255),
  `number` VARCHAR(255) NOT NULL,
  `adress` VARCHAR(255) NOT NULL,
  `is_admin` BIT DEFAULT 0,
  `crated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)

) ENGINE= InnoDB;";

/*$sql.="ALTER TABLE `users` 
ADD `zip` VARCHAR(255) NOT NULL;
";*/
=======
$sql = 'CREATE TABLE IF NOT EXISTS `souvenirs`(
        `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `type` VARCHAR(255),
        `price` DECIMAL(10,2),
        `image` VARCHAR(255),
        `club_id` INT UNSIGNED NOT NULL UNIQUE,
        FOREIGN KEY(club_id) REFERENCES clubs(id)
        ) ENGINE = InnoDB;';
>>>>>>> 86b01233fae10f3982987cd187f29fc443484422


if($conn->multi_query($sql)){
  echo "<p>Tables created successfully</p>";
}else{
  header("location:index.php");
}

?>