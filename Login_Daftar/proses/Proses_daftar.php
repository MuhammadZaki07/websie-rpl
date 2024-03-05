<?php
include("../../connect.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $Confirm_Password = $_POST["password2"];
    if ($password !== $Confirm_Password) {
        echo "<script>alert('Password Anda Tidak Sama'); window.location.href='../html/daftar.html';</script>";
        exit();
    }
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO user (nama,email,password) VALUES ('$nama','$email','$hash')";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        echo "<script>alert('Daftar Berhasil'); window.location.href='../html/login.html';</script>";
        exit();
    } else {
        echo "<script>alert('Pendaftaran Gagal Mohon Coba Lagi'); window.location.href='../html/daftar.html';</script>";
        exit();
    }
}
