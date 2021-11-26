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

    
    if(!empty($item_id) && !empty($item_name) && !empty($amount) && !empty($unit) && !empty($arrival_date) && !empty($category) && !empty($item_status) && !empty($price)){
        $query = "INSERT INTO inventory 
        (item_id, item_name, amount, unit, arrival_date, category, item_status, price) 
        values 
        ('$item_id', '$item_name', '$amount', '$unit', '$arrival_date', '$category', '$item_status', '$price')";
        $data = mysqli_query($koneksi, $query);
    
        if($data){
            header("location:123200075.php");
        }else{
            header("location:add.php?message=invalid");
        }
        }else{
        header("location:add.php?message=empty");
   

    }
    
?>