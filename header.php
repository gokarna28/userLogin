<?php
include("connection.php");
session_start();
if (!isset($_COOKIE['user_id'])) {
    session_destroy();
}
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    //echo $user_id;
    $sql = "SELECT * FROM users WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-slate-200 border-b w-full p-4 flex items-ceter justify-around">
        <div class="">
            <a href="index.php">Logo</a>
        </div>
        <div class="">
            <?php
            if (isset($user_id)) {
                ?>
                <div>
                    <p onclick="showLogout()" class="cursor-pointer text-xl font-medium">
                        <?php echo $row['user_name'] ?>
                    </p>
                    <a id="logoutBtn" class="hidden hover:text-red-500" href="logout.php">Logout</a>
                </div>
                <?php
            } else {
                ?>
                <button class="bg-sky-600 hover:bg-sky-700 rounded-md px-3 py-2 text-white ">
                    <a href="login.php">Login</a>
                </button>
                <?php
            }
            ?>
        </div>

    </header>

    <script>
        function showLogout() {
            document.getElementById("logoutBtn").classList.remove("hidden");
        }
       
    </script>