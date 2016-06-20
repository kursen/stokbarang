<?php
session_start();
include("Model/config.php");
$username=mysqli_real_escape_string($connection,$_POST['username']);
$password=mysqli_real_escape_string($connection,$_POST['password']);
$status = $_POST['status'];
$cek=mysqli_query($connection,"select distinct(username),(password) from user_login where (username='".$username."') and (password='".$password."') and (status='".$status."') ")	;

if ($username == "")
{
echo"<script>window.alert('Silakan Isi Username Anda'); document.location.href='javascript:history.back(0)'; </script>";
}
if ($password == "")
{
echo"<script>window.alert('Silakan Isi Password Anda'); document.location.href='javascript:history.back(0)'; </script>";
}
if ($status == "")
{
echo"<script>window.alert('Silakan Isi Password Anda'); document.location.href='javascript:history.back(0)'; </script>";
}
$rows=mysqli_num_rows($cek);
mysqli_free_result($cek);
if ($rows == 1)
{
$_SESSION['username'] =$username;
$_SESSION['password']=$password;
$_SESSION['status']=$status;
header("location:View/index.php");
}
else
{
echo "<script>window.alert('Maaf Data Anda Tidak Sesuai'); document.location.href='javascript:history.back(0)'; </script>";
}

?>