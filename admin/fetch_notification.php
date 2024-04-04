<?php
require_once "../app/config/config.php";
require_once __DIR__ . '/../app/classes/Notification.php';
require_once 'header.php';



$notification= new Notification();

$list=$notification->fetch_notification();


foreach($list as $value){
    $pdf_path= $value['pdf_path'];

    echo "<p><a href='get_pdf.php?file=$pdf_path' target='_blank'>New Order</a></p>";
}
