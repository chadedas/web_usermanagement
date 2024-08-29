<?php 
include_once("db.php");

if (isset($_POST["username"]) && !empty($_POST["username"]) && 
    isset($_POST["password"]) && !empty($_POST["password"])) {

    Login($_POST["username"], $_POST["password"]);
} else {
    echo "SERVER: error, enter a valid username & password";
    exit();
}

function Login($username, $password) {
    GLOBAL $con;

    $sql = "SELECT username, password ,firstname,lastname,permission FROM login WHERE username=?";
    $st = $con->prepare($sql);
    $st->execute([$username]);
    $user = $st->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        echo "ECHO DATABASE" . " - " . $user["username"] . " - ชื่อ-นามสกุล " . $user["firstname"] . " " . $user["lastname"] . " สิทธิ์เข้าถึง " . $user["permission"];
        exit();
    }

    // If username or password is incorrect
    echo "SERVER: error, invalid username or password";
    exit();
}
?>
