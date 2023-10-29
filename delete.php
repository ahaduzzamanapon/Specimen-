<?php
include("connction.php");
$id = $_GET['id'];
$sql = "DELETE FROM form_data WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: list.php");
}

