<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: login_form.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login_form.php?error=Password is required");
        
        exit();

    }else{

        $sql = "SELECT * FROM user WHERE user_name='$uname' AND password='$pass'";
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['ID'] = $row['ID'];

                header("Location: mtp2.php");

                exit();

            }else{
              
                header("Location: login_form.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: login_form.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: login_form.php");
    exit();

}