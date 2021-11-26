<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            <li><a href="login.php">Home</a></li>
        </ul>

        <?php
      if(!empty($_SESSION['username'])){
        echo "<a href='register.php'><button class='sign-in'>Register</button></a>";
      }else{
        echo "<a href='logout.php'><button class='sign-in'>Logout</button></a>";
      }
    ?>
    </div>

    <div class="content-container">
        
        
        <form action="verivied.php" method="post">
            
            <div class="row justify-content-center">
                <div class="col-6" >
                    <label>Username</label> <br>
                    <input class="input-form" type="text" name="username" placeholder="username">
                    <br>
                    <label>Password</label> <br>
                    <input class="input-form" type="password" name="password" placeholder="password">
                    <?php
                    if(isset($_GET['message'])){
                            echo "<p>username/password wrong!</p>";  
                    }else{
                        echo "<br>";
                    }
                    ?>
                    <div class="center">
                        <button class="btn-input" type="submit" value="login">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="footer">
        <p>Inventory Web 2021</p>
    </div>
</body>
</body>
</html>