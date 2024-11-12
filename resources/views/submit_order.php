<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $table_number = $_POST['table-number'];
    $amount = $_POST['amount'];
    $noodle = $_POST['noodle'];
    $protein = $_POST['protein'];
    $soup = $_POST['soup'];
    $extra = $_POST['extra'];
    $comments = $_POST['comments'];

    // เชื่อมต่อกับฐานข้อมูล
    $conn = new mysqli('localhost', 'root', '', 'small_dog');

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
    }

    // เตรียมคำสั่ง SQL
    $sql = "INSERT INTO noodles (table_number, amount, noodle, protein, soup, extra, comments)
            VALUES ('$table_number', '$amount', '$noodle', '$protein', '$soup', '$extra', '$comments')";

    // ตรวจสอบการบันทึกข้อมูล
    if ($conn->query($sql) === TRUE) {
        echo "สั่งอาหารสำเร็จ!";
    } else {
        echo "ข้อผิดพลาด: " . $sql . "<br>" . $conn->error;
    }

    // ปิดการเชื่อมต่อ
    $conn->close();
}
?>
