<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Based Inventory Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    
    <div class="header">
            <h1>Web Based Inventory Application</h1>
        </div>

        <div class="nav-container">
            <ul class="nav-item">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="123200075.php">Inventory List</a></li>
                <li>
                    <div class="dropdown">
                        <a href="">List Per Category</a>
                        <div class="dropdown-content">
                            <a href="123200075.php?cat=Building">Building</a>
                            <a href="123200075.php?cat=Vehicles">Vehicles</a>
                            <a href="123200075.php?cat=Office stationery">Office Inventory</a>
                            <a href="123200075.php?cat=Electronic">Electronic</a>
                        </div>
                    </div>
                </li>
            </ul>

            <?php
        if(!empty($_SESSION['username'])){
            echo "<a href='Login.php'><button class='sign-in'>Login</button></a>";
        }else{
            echo "<a href='Logout.php'><button class='sign-in'>Logout</button></a>";
        }
        ?>
    </div>
    


    <?php
        // Melakukan koneksi dengan database
        include "connect.php";
        $query = "SELECT * FROM inventory";
        $data = mysqli_query($koneksi, $query);
        
        if(isset($_GET['cat'])){
            $cat = $_GET['cat'];
            $query = "SELECT * FROM inventory WHERE category='$cat'";
            $data = mysqli_query($koneksi, $query);
        }else{
            $query = "SELECT * FROM inventory";
            $data = mysqli_query($koneksi, $query);
        }

        $totalPrice=0;
        $no=0;
    
    ?>

    <div class="mt-2 container">

        <a href="add.php"><button class="btn btn-success">
                Add++
            </button></a>

    </div>
    <div class="container text-center">
        <div class="head">
            <h1>Data Inventory</h1>
        </div>
        <div class="main">
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Item Code</th>
                    <th>Name of Goods</th>
                    <th>Amount</th>
                    <th>Unit</th>
                    <th>Coming Date</th>
                    <th>Category</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($data)) {
                        $total=$row['price']*$row['amount'];

                        $totalPrice+=$total;

                        $formattedPrice = number_format($row['price'], 2);
                        $formattedTotal = number_format($total, 2);
                    ?>
                        <tr>
                            <td><?= $row['No'] ?></td>
                            <td><?= $row['item_id'] ?></td>
                            <td><?= $row['item_name'] ?></td>
                            <td><?= $row['amount'] ?></td>
                            <td><?= $row['unit'] ?></td>
                            <td><?= $row['arrival_date'] ?></td>
                            <td><?= $row['category'] ?></td>
                            <td> <p>Rp.<?= $formattedPrice ?></p></td>
                            <td> <p>Rp.<?= $formattedTotal ?></p></td>
                            <td>
                                <form action="update.php" class="m-1">
                                    <button class="btn btn-warning">Update</button>
                                    <input type="hidden" name="item_id" value="<?= $row['item_id'] ?>">
                                </form>
                                <form action="delete.php">
                                    <button class="btn btn-danger">Delete</button>
                                    <input type="hidden" name="item_id" value="<?= $row['item_id'] ?>">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    $formattedTotalPrice = number_format($totalPrice, 2);
                    ?>
                </tbody>
            </table>
        </div>

        <div class="row">
            <p>Total Inventory = Rp. <?php echo $formattedTotalPrice ?></p>
        </div>

        
  
    </body>

    <div class="footer">
        <p>Inventory Web 2021</p>
    </div>
</html>