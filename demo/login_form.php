<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style2.css">

</head>

<body>

     <form action="login.php" method="post">

        <h2>LOGIN</h2>

        <!//his part is check every thign if ok is enything word happend is will show error>
        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>

</body>

</html>