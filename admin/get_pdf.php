<?php

require_once "../app/config/config.php";
require_once __DIR__ . '/../app/classes/Notification.php';

$notification= new Notification();


if(isset($_GET['file']) || isset($_GET['files'])) {

    if(isset($_GET['file'])){
        $pdf_path=$_GET['file'];
   // $pdf_path_abs='../'.$pdf_path;

    }elseif(isset($_GET['files'])){
        $pdf_path=$_GET['files'];
    }else{

        echo "File doesn't exist";
    }
    
    $pdf_path_abs='../'.$pdf_path;

    $file_name = basename($pdf_path);
   
    if (file_exists($pdf_path_abs)) {
      
        header('Content-type: application/pdf');
    
        header('Content-Disposition: inline; filename="' . $file_name . '"');
    
        readfile($pdf_path_abs);
    } else {
      
        echo "PDF doesn't exist!.";
    }
}