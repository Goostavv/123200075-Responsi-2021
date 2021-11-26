<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Inventory Data : <?= $_GET['item_id'] ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <?php
            include "connect.php";
            $item_id = $_GET['item_id'];
            $query = "SELECT * from inventory WHERE item_id = '$item_id'";
            $data = mysqli_query($koneksi, $query);
            ?>
            <h1>Change Inventory Data</h1>
            <form action="updateFunction.php">
                <div class="modal-body">
                    <?php
                    if ($row = mysqli_fetch_assoc($data)) {
                    ?>
                        <div class="form-group">
                            <label for="idForm">Item Code</label>
                            <input type="text" class="form-control" id="idForm" name="item_id" readonly value="<?= $row['item_id'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="item_name">Name of Goods</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $row['item_name'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" value="<?= $row['amount'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit" value="<?= $row['unit'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="arrival_date">Coming Date</label>
                            <input type="date" class="form-control" id="arrival_date" name="arrival_date" value="<?= $row['arrival_date'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" id="category">
                                <option 
                                    <?php
                                    if($row['category']=="Building"){
                                        echo "selected";
                                    }
                                    ?> 
                                    value="Building">Building
                                </option>

                                    <option 
                                        <?php
                                        if($row['category']=="Vehicles"){
                                            echo "selected";
                                        }
                                        ?>
                                        value="Vehicles">Vehicles
                                    </option>

                                    <option 
                                        <?php
                                        if($row['category']=="Office stationery"){
                                            echo "selected";
                                        }
                                        ?>
                                        value="Office stationery">Office stationery
                                    </option>

                                    <option <?php
                                        if($row['category']=="Electronic"){
                                            echo "selected";
                                        }
                                        ?>
                                        value="Electronic">Electronic
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="item_status">Status</label><br>
                                <input 
                                    type="radio" id="well" name="item_status" value="Well"
                            
                                    <?php 
                                        if($row['item_status']=="Well"){
                                            echo "checked";
                                        }
                                    ?>
                                >
                            <label for="well">Well</label>

                                <input 
                                    type="radio" id="maintenance" name="item_status" value="Maintenance"
                                    
                                    <?php 
                                        if($row['item_status']=="Maintenance"){
                                            echo "checked";
                                        }
                                    ?>
                                    
                                >
                            <label for="maintenance">Maintenante</label>

                                <input 
                                    type="radio" id="damaged" name="item_status" value="Damaged"
                                    
                                    <?php 
                                        if($row['item_status']=="Damaged"){
                                            echo "checked";
                                        }
                                    ?>
                                >
                            <label for="damaged">Damaged</label>
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price"  value="<?= $row['price'] ?>">
                        </div>
                        <button class="btn btn-success">Change</button>
                    
                </div>
            </form>
        </div>
    </body>

</html>