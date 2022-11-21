<?php 
include 'conexao.php';
$Registro = $_POST['Registro'];
$Nome = $_POST['Nome'];
$Cargo = $_POST['Cargo'];
$Area = $_POST['Area'];
$Salario = $_POST['Salario'];
$Status = $_POST['Status'];

$update=$cn->query("UPDATE tbl_empregos set Nome = $Nome, Cargo = $Cargo, Area = $Area, Salario = $Salario, Status = $Status from tbl_empregos where Registro='$Registro'");
header('location: index.php');
?>
