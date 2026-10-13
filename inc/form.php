<?php
$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];

if (isset($_POST['submit'])) {

    $firstName = $_POST['firstName'];
    $lastName  = $_POST['lastName'];
    $email     = $_POST['email'];

    if (empty($firstName)) {
        $errors['firstNameError'] = 'يرجى إدخال الاسم الأول';
    }

    if (empty($lastName)) {
        $errors['lastNameError'] = 'يرجى إدخال الاسم الأخير';
    }

    if (empty($email)) {
        $errors['emailError'] = 'يرجى إدخال البريد الإلكتروني';
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'يرجى إدخال بريد إلكتروني صحيح';
    }

    if (!array_filter($errors)) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName  = mysqli_real_escape_string($conn, $_POST['lastName']);
        $email     = mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "INSERT INTO users(firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";
        
        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'خطأ في السيرفر: ' . mysqli_error($conn);
        }
    }
}