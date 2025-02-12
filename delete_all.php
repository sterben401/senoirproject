<?php
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli($servername, $username, $password, $dbname = "PROJECT");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // สร้างคำสั่ง SQL เพื่อลบข้อมูลที่ status เป็น ORANGE หรือ RED
    $delete_sql = "DELETE FROM detec_history WHERE status IN ('ORANGE', 'RED')";

    if ($conn->query($delete_sql) === TRUE) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false, 'error' => $conn->error];
    }

    echo json_encode($response);
}
?>

