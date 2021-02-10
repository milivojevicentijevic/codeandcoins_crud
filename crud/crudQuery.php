<?php
    $conn = new mysqli("localhost", "root", "", "cac_crud") or die("Error: ".mysqli_error($conn));
    session_start();
    // code to save user's data
    if (isset($_POST['save'])) {
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $insert_query = "INSERT INTO account (username, password) VALUES (?, ?)";

            $statement = $conn->prepare($insert_query);
            $statement->bind_param("ss", $username, $password);
            if($statement->execute()) {
                $_SESSION['msg'] = "New record is successfully inserted";
                $_SESSION['alert'] = "alert alert-success";
            }
            $statement->close();
            $conn->close();
        } else {
            $_SESSION['msg'] = "Username and password should not be empty";
            $_SESSION['alert'] = "alert alert-warning";
        }
        header("location: index.php");
    }
    // delete selected data
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];

        $delete_query = "DELETE FROM account WHERE id = ?";
        $statement = $conn->prepare($delete_query);
        $statement->bind_param("i", $id);
        if($statement->execute()) {
            $_SESSION['msg'] = "Selected record is successfully deleted";
            $_SESSION['alert'] = "alert alert-danger";
        }
        $statement->close();
        $conn->close();
        header("location: index.php");
    }








?>