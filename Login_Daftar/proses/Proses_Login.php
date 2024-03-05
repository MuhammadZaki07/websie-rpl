<?php
session_start();
include("../../connect.php");
$nama=$_POST['nama'];
$password =$_POST['password'];

$nama=mysqli_real_escape_string($koneksi,$nama);
$sql="SELECT * FROM user WHERE nama='$nama'";
$result=mysqli_query($koneksi,$sql);
if($result){
    if($result->num_rows > 0) {
        $user=$result->fetch_assoc();
        if(password_verify($password,$user['password'])){
            $_SESSION['username'] = $user['nama'];
            if($user['nama'] === 'admin' && $password === 'admin123'){
                $_SESSION['pengguna'] = 'admin';
                header("Location:../../page/indexadmin.html");
                exit();
            }else{
                $_SESSION["pengguna"] = "user";
                header("Location:../../page/index.html");
                exit();
            }
        }else{
            echo"<script>alert('password e pean salah mas/mbak, pean coba neh aowkawok'); window.location.href='../html/login.html'</script>";
            exit();
        }
    }else{
        echo "<script>alert('ta golek i ganok mas/mbak pean daftar sek ae yo...'); window.location.href='../html/daftar.html'</script>";
        exit();
    }
}else{
    echo "<script>alert('aku kekeselen mas rusak iki koyok e, sek tak benakno SQL e sabar yo minggu ngarep pean coba neh'); window.location.href='../html/daftar.html'</script>". mysqli_error($koneksi);
    exit();
}

$koneksi->close();