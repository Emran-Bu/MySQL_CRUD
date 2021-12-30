<?php

$stu_id = $_POST['sid'];
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];
$Namerror = "";
$errorAdd = "";
$phoneError = "";

if(strlen($stu_name) > 30) {
    $Namerror = "name fill must be 1 to 30 character";
}

if($stu_address == "") {
    $errorAdd = "Address field required";
}

if(strlen($stu_phone) != 11) {
    $phoneError = "Phone number must be 11 digit";
}
// or $stu_phone == 0
// $Namerror != "" || $errorAdd != "" or $stu_phone != ""

if($Namerror > 30 || $errorAdd != "" or strlen($stu_phone) != 11) {
    header("location: http://localhost/CRUD/edit.php?error={$Namerror}&error1={$errorAdd}&error2={$phoneError}&id={$stu_id}");
}

else{
$conn = mysqli_connect("localhost", "root",  "", "crud2") or die("Connection Failed");

$sql = "UPDATE student SET sname = '{$stu_name}', saddress = '{$stu_address}', sclass = '{$stu_class}', sphone = '{$stu_phone}' WHERE sid = {$stu_id}";


$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

header("location: http://localhost/CRUD/index.php");

mysqli_close($conn);
}

?>