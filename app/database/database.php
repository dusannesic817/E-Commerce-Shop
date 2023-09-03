
<?php
  
  require_once "../config/config.php";

  $sql = "CREATE TABLE IF NOT EXISTS `clubs`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) UNIQUE,
    `image` VARCHAR(255) ,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;";

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
("","Crystal Palas", "crystal_palas"),
("","Everton", "everton.png"),
("","Fulham", "fulham.png"),
("","Liverpool", "liverpool.png"),
("","Luton Town", "luton_town.png"),
("","Manchester City", "man_city.png"),
("","Machester United", "man_utd.png"),
("","Newcastle", "newcastle.png"),
("","Nottingham Forrest", "nottingham_forest.png"),
("","Sheffield United", "sheffield_united"),
("","Totenham", "totenham.png"),
("","Wolves", "wolves.png"),
("","West Ham", "west_ham.png");

';





if($conn->multi_query($sql)){
  echo "<p>Tables created successfull</p>";
}else{
  header("location:index.php");
}

?>