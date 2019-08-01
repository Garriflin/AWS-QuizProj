<?php
    if(isset($_POST['d-submit'])) // This makes sure that no one can access the page directly.
    {
        require("dbh.cfg.php");
        $uid = $_POST['uid'];
        $name = $_POST['uname'];

        $sql = "INSERT INTO `details` (pUID, pName) VALUES (?,?);"; // SQL Query Statement.
        $stmt = mysqli_stmt_init($conn); // Initates connection

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ..index.php?error=sql"); // If connection is not successful then it will give error.
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $uid, $name);// Bind parameters
            mysqli_stmt_execute($stmt); // Executes statemtn
            
            // Here we start session.
            session_start();
            $_SESSION['id'] = $uid;
            $_SESSION['Name'] = $name;

            header("location: ../quiz.php");
        }
    }
    