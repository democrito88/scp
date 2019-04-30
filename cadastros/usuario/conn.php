<?php


include_once ($_SERVER['DOCUMENT_ROOT'] . '/scp/util/conexaoBD.php');
$conn = conectarBD();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>