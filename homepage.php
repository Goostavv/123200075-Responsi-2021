<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

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
                        <a href="123200075.php?tag=Building">Building</a>
                        <a href="123200075.php?tag=Vehicles">Vehicles</a>
                        <a href="123200075.php?tag=Office stationery">Office Inventory</a>
                        <a href="123200075.php?tag=Electronic">Electronic</a>
                    </div>
                </div>
            </li>
        </ul>

        <?php
      if(empty($_SESSION['username'])){
        echo "<a href='Login.php'><button class='sign-in'>Login</button></a>";
      }else{
        echo "<a href='logout.php'><button class='sign-in'>Logout</button></a>";
      }
    ?>
    </div>

    <div class="content-container">
        <?php
            if(!empty($_SESSION['username'])){
                echo "<h3>Welcome</h3>";
                echo "<h2>".$_SESSION['full_name']."</h2>";
            }else{
                echo "<div class='center'>Must Login First!</div>";
            }
        ?>
    </div>

    <div class="footer">
        <p>Inventory Web 2021</p>
    </div>
</body>
</html>