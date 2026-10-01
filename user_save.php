<?php
// CivilFix - Save Login/Register, Contact and Report data in userdata.txt
$form_type = $_POST['form_type'] ?? '';
$dataFile = __DIR__ . DIRECTORY_SEPARATOR . 'userdata.txt';

function openDataFile($dataFile) {
    $file = fopen($dataFile, "a");
    if ($file === false) {
        die("ERROR: Cannot open userdata.txt. Make sure it is in the same folder as user_save.php.");
    }
    return $file;
}
    if ($form_type === "login") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        die("Please enter email and password.");
    }

    $file = openDataFile($dataFile);
    fwrite($file, "========== LOGIN ==========\n");
    if ($name !== '') fwrite($file, "Name: " . $name . "\n");
    fwrite($file, "Email: " . $email . "\n");
    fwrite($file, "Login Time: " . date("Y-m-d H:i:s") . "\n");
    fwrite($file, "Password: " . $password . "\n");
    fwrite($file, "===========================\n\n");
    fclose($file);

    echo '
    <!DOCTYPE HTML>
    <html><head>
    <title>Report | submit </title></head>
    <link rel="stylesheet" href="style.css">
    <body class="success-body">
    <div class="output-page">
        <p class=submit-text> Login information saved! </p>
        <a class="home-btn" href="index.html"> Go to Home Page </a>
    </div>
    ';
}
elseif ($form_type === "contact") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        die("Please fill all contact fields.");
    }

    $file = openDataFile($dataFile);
    fwrite($file, "========== CONTACT ==========\n");
    fwrite($file, "Name: " . $name . "\n");
    fwrite($file, "Email: " . $email . "\n");
    fwrite($file, "Message: " . $message . "\n");
    fwrite($file, "Date: " . date("Y-m-d H:i:s") . "\n");
    fwrite($file, "=============================\n\n");
    fclose($file);

    echo '
    <!DOCTYPE HTML>
    <html><head>
    <title>Report | submit </title></head>
    <link rel="stylesheet" href="style.css">
    <body class="success-body">
    <div class="output-page">
        <p class=submit-text> Message sent successfully! </p>
        <a class="home-btn" href="index.html"> Go to Home Page </a>
    </div>
    ';
}
elseif ($form_type === "report") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $issue = trim($_POST['issue'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($name === '' || $email === '' || $issue === '' || $location === '' || $description === '') {
        die("Please fill all report fields.");
    }

    $file = openDataFile($dataFile);
    fwrite($file, "========== CIVIC REPORT ==========\n");
    fwrite($file, "Name: " . $name . "\n");
    fwrite($file, "Email: " . $email . "\n");
    fwrite($file, "Issue: " . $issue . "\n");
    fwrite($file, "Location: " . $location . "\n");
    fwrite($file, "Description: " . $description . "\n");
    fwrite($file, "Date: " . date("Y-m-d H:i:s") . "\n");
    fwrite($file, "==================================\n\n");
    fclose($file);

    echo '
    <!DOCTYPE HTML>
    <html><head>
    <title>Report | submit </title></head>
    <link rel="stylesheet" href="style.css">
    <body class="success-body">
    <div class="output-page">
        <p class=submit-text> Report submitted successfully </p>
        <a class="home-btn" href="index.html"> Go to Home Page </a>
    </div>
    ';
}
else {
    echo "Invalid form submission.";
}
?>