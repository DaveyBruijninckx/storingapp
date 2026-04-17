<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$passwordCheck = $_POST['passwordCheck'];

if(isset($_SESSION['user_id']))
{
die("Kan niet registreren - je bent al ingelogd");
}

if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
{
    die('Email is ongeldig!');
}

if(!$password == $passwordCheck)
{
    die("Wachtwoord moet hetzelfde zijn!");
}

require_once '../../../config/conn.php';
$sql = "SELECT * FROM users WHERE username = :email";
$statement = $conn->prepare($sql);
$statement->execute([":email" => $email]);
if($statement->rowCount() > 0)
{
    die("De email is al ingebruik!");
}

if(empty($password))
{
    die("Wachtwoord mag niet leeg zijn!");
}
$hash = password_hash($password, PASSWORD_DEFAULT);

require_once('../../../config/conn.php');
$query = "INSERT INTO `users`(username, password, admin) VALUES (:email, :hash, 0)";
$statement = $conn->prepare($query);
$statement->execute([
    ":email" => $email,
    ":hash" => $hash,
]);

$msg = "Je account is gemaakt";
header("Location: ../../../resources/views/login/index.php?msg=$msg");