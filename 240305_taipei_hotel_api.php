<?php
header("Access-Control-Allow-Origin: *");

$servername = "localhost";
$username = "id21959472_hana";
$password = "HanaWeb#04";
$dbname = "id21959472_hanagasumi";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connect Error !" . mysqli_connect_error());
}

$sql = "SELECT * FROM hoteldata";
$result = mysqli_query($conn, $sql);

$jsonDATA = array();

while($row = mysqli_fetch_assoc($result)){

    //確認是否抓到資料
    //echo $row["name"]."<br>"; 
    
    //取後一筆都會取代前一筆資料，所以最後出來的只有最後一筆資料
    //$jsonDATA = $row; 

    //加上"[]"，可以讓資料堆疊起來而不是取代前一筆資料
    $jsonDATA[] = $row;
}
echo json_encode($jsonDATA);

mysqli_close($conn);

// 任何系統都要能做到或支援 "CRUD" *
// Create
// *Read
// Update
// Delete
?>

