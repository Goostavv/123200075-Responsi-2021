<?php
    include "connect.php";
    $item_id = $_GET['item_id'];
    $category = $_GET['category'];
    $item_name = $_GET['item_name'];
    $amount = $_GET['amount'];
    $unit = $_GET['unit'];
    $arrival_date = $_GET['arrival_date'];
    $item_status = $_GET['item_status'];
    $price = $_GET['price'];

   
    $query = "UPDATE inventory SET category = '$category',
     item_name = '$item_name', 
     amount = '$amount', 
     unit = '$unit', 
     arrival_date = '$arrival_date', 
     item_status = '$item_status', 
     price = '$price' WHERE item_id = '$item_id'";

    
    $cek = mysqli_query($koneksi,$query);

    if($cek != false){
        echo "<script> alert('Edit Success!');
        window.location.href = '123200075.php';
        </script>";
    }
    else{
        echo "<script> alert('Edit Fail!');
        window.location.href = '123200075.php';
        </script>";
    }
?>