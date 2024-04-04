<?php

require_once "../app/config/config.php";
require_once __DIR__ . '/../app/classes/Notification.php';


$notification= new Notification();
$list_all= $notification->fetch_all_notification();

?>
<?php require_once 'header.php'?>
<body>
    <div class='container'>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Order</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <?php 
  foreach($list_all as $value){


    $pdf_path= $value['pdf_path'];
    $order_id= $value['id'];
    $created_at= $value['created_at'];


    $file_name = basename($pdf_path);

    $pdf_path_abs='../'.$pdf_path;
  
  
  ?>
  <tbody id="list">
    <tr>
      <th scope="row"><?php echo $order_id?></th>
      <td><?php echo "<p><a href='get_pdf.php?files=$pdf_path' target='_blank'>$file_name</a></p>";?></td>
      <td><?php echo $created_at?></td>
    </tr>
  </tbody>
  <?php
  }
  
  ?>
</table>
</div>
</body>

