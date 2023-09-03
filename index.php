<?php

    require_once "inc/header.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>PL Shop</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="margine_bottom">Premier League Shop</h1>
        <div class="row gy-4">
            <?php
            $teams = [
                     ["name"=>"Arsenal", "image"=>"arsenal.png"],
                     ["name"=>"Aston Villa", "image"=>"aston_vila.png"],
                     ["name"=>"Bournemouth", "image"=>"bornemouth.png"],
                     ["name"=>"Brentford", "image"=>"brenford.png"],
                     ["name"=>"Brighton & Hove Albion","image"=>"brighton.png"],
                     ["name"=>"Burnley","image"=>"burnley.png"],
                     ["name"=>"Chelsea","image"=>"chelsea.png"],
                     ["name"=>"Crystal Palace","image"=>"crystal_palas.png"],
                     ["name"=>"Everton","image"=>"everton.png"],
                     ["name"=>"Fulham","image"=>"fulham.png"],
                     ["name"=>"Liverpool","image"=>"liverpool.png"],
                     ["name"=>"Luton Town","image"=>"luton_town.png"],
                     ["name"=>"Manchester City","image"=>"man_city.png"],
                     ["name"=>"Manchester United","image"=>"man_utd.png"],
                     ["name"=>"Newcastle United","image"=>"newcastle.png"],
                     ["name"=>"Nottingham Forest","image"=>"nottingham_forest.png"],
                     ["name"=>"Sheffield United","image"=>"sheffield_united.png"],
                     ["name"=>"Tottenham Hotspur","image"=>"totenham.png"],
                     ["name"=>"West Ham United","image"=>"west_ham.png"],
                     ["name"=>"Woverhampton Wanderers","image"=>"wolves.png"]
            ];
            foreach ($teams as $team) {
                echo '<div class="col-md-3">';
                echo '<div class="card">';
                echo '<img src="public/images/' . $team["image"] . '" class="card-img" alt="' . $team["name"] . '">';
                echo '<div class="card-title shadow">';
                echo '<h5>' . $team["name"] . '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>



</html>