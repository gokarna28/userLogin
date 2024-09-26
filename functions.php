<?php
include("connection.php");
session_start();

//var_dump($_POST);
$data = json_decode(file_get_contents('php://input'), true);

//register 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $data['form_name'] == 'register_form') {

    //check is the email is already exist
    $sql = "SELECT * FROM users WHERE user_email=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $data['user_email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            echo "User with this email address is already exist";
        } else {
            //insert query
            $sql = "INSERT INTO users(user_name, user_email, user_password) VALUES(?,?,?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sss", $data['user_name'], $data['user_email'], $data['user_password']);

                if ($stmt->execute()) {
                    $last_id = $conn->insert_id;
                    $_SESSION['user_id'] = $last_id;

                    echo "successfully registered";
                    // exit();
                } else {
                    echo "Failed to register";
                }
            }
        }
    }
}


//login
if ($_SERVER['REQUEST_METHOD'] == "POST" && $data['form_name'] == 'login_form') {

    $sql = "SELECT * FROM users WHERE user_email=? && user_password=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $data['user_email'], $data['user_password']);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                echo "loginSuccess";
                $_SESSION['user_id'] = $row['user_id'];

                // coookie expires in 1 week 
                setcookie('user_id', $row['user_id'], time() + (7 * 24 * 60 * 60));
            } else {
                echo "Email or password is wrong";
            }
        }
    }
}