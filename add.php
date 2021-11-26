<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<?php
include "connect.php";
// Melakukan query pada tabel kategori agar proses memasukkan buku bagian kategori semakin mudah
$query = "SELECT * from inventory";
$data = mysqli_query($koneksi, $query);
?>

<body>
    <div class="container">
        <h1>Add Inventory Data</h1>
        <form action="addFunction.php">
            <div class="modal-body">
            <?php
                if ($row = mysqli_fetch_assoc($data)) {
            ?>
                <div class="form-group">
                    <label for="idForm">Item Code</label>
                    <input type="text" class="form-control" id="idForm" name="item_id">
                </div>

                <div class="form-group">
                    <label for="item_name">Name of Goods</label>
                    <input type="text" class="form-control" id="item_name" name="item_name">
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount">
                </div>

                <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit">
                </div>

                <div class="form-group">
                    <label for="arrival_date">Coming Date</label>
                    <input type="date" class="form-control" id="arrival_date" name="arrival_date">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category" id="category">
                        <option value="Building">Building</option>
                        <option value="Vehicles">Vehicles</option>
                        <option value="Office stationery">Office stationery</option>
                        <option value="Electronic">Electronic</option>
                    </select>
                </div>

                <div class="form-group">
                <label for="item_status">Status</label><br>
                    <input type="radio" id="well" name="item_status" value="Well"><label for="well">Well</label>
                    <input type="radio" id="maintenance" name="item_status" value="Maintenance"><label for="maintenance">Maintenante</label>
                    <input type="radio" id="damaged" name="item_status" value="Damaged"><label for="damaged">Damaged</label>
                </div>

                <div class="form-group">
                    <label for="price">Unit Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                
                <button class="btn btn-success">Save</button>
                <button type="submit" class="btn btn-warning" name="cancel" value="1">Cancel</button>
            <?php
            }
            ?>
            </div>
        </form>
    </div>
</body>

</html>