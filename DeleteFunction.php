<?php
    include "connect.php";
    $item_id = $_GET['item_id'];
    if($_GET['delete'] == 1){
 
        $query = "DELETE FROM inventory WHERE item_id = '$item_id'";
        
        $cek = mysqli_query($koneksi, $query);
        
        if($cek != false){
            echo "<script> alert('Item Deleted!');
            window.location.href = '123200075.php';
            </script>";
        }
        else{
            echo "<script> alert('Delete Failed!');
            window.location.href = '123200075.php';
            </script>";
        }
    }
    else{
        echo "<script>
        window.location.href = '123200075.php';
        </script>";
    }
?>