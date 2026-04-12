<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

require_once "../../../config/conn.php";
$query = "SELECT * FROM `users` WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([":username" => $username]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($statement->rowcount()< 1)
{
    die("Error: username bestaat niet");
}
if (!password_verify($password, $user['password']))
{
    die("Error: wachtwoord niet juist");
}

$_SESSION['user_id'] = $user['id'];

header("location: ../../../index.php?msg=je bent ingelogt");