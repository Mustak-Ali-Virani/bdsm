<?php

$name = $_POST['fullname'];
$number = $_POST['mobileno'];
$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$address = $_POST['address'];


$image_path = "image/";

$conn = mysqli_connect("localhost", "root", "", "blood_donation") or die("Connection error");


if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    
    
    $upload_dir = "admin/image/";
    
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }
    
    
    if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
        $image_path = $upload_dir . $file_name;
    } else {
        die("File upload failed");
    }
}

$sql = "INSERT INTO donor_details (donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address, donor_image_path) VALUES ('{$name}', '{$number}', '{$email}', '{$age}', '{$gender}', '{$blood_group}', '{$address}', '{$image_path}')";

$result = mysqli_query($conn, $sql) or die("Query unsuccessful.");

header("Location: http://localhost/bdsm/home.php");

mysqli_close($conn);
 ?>
