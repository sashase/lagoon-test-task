<?php

$registeredUsers = [
    ["email" => "john.smith@gmail.com", "id" => 1, "name" => "John Smith", "password" => "password123"],
    ["email" => "jane.doe@gmail.com", "id" => 2, "name" => "Jane Doe", "password" => "secret123"],
    ["email" => "bob.johnson@gmail.com", "id" => 3, "name" => "Bob Johnson", "password" => "s3cur3p@ssword"],
    ["email" => "alice.lee@gmail.com", "id" => 4, "name" => "Alice Lee", "password" => "mypassword"],
    ["email" => "tom.smith@gmail.com", "id" => 5, "name" => "Tom Smith", "password" => "letmein123"]
];

function findEmail($email, $registeredUsers)
{
    $emails = array_column($registeredUsers, "email");
    return in_array($email, $emails);
};

$fname = $_POST['first-name'];
$lname = $_POST['last-name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordRepeat = $_POST['password-repeat'];

if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
    echo json_encode(array('success' => '0', 'error' => 'Fill in all fields!'));
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array('success' => '0', 'error' => 'Provide a valid email address!'));
} elseif ($password != $passwordRepeat) {
    echo json_encode(array('success' => '0', 'error' => 'Passwords do not match!'));
} elseif (findEmail($email, $registeredUsers)) {
    echo json_encode(array('success' => '0', 'error' => 'User with this email already exists!'));
} else {
    $registeredUsers[] = ["email" => $email, "id" => count($registeredUsers) + 1, "name" => $fname . ' ' . $lname, "password" => $password];
    echo json_encode(array('success' => '1'));
}
