<?php 
include "koneksi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(!empty($id)){
    $query = mysqli_query($koneksi, "SELECT * FROM users where id='$id'");
    if(mysqli_num_rows($query)>0){
        $sukses = true;
        $pesan = "Jadi gan";
        $kode = 200;
      }
    elseif($id<31){
        $sukses = false;
        $pesan = "Tidak Ada ID ";
        $kode = 204;
    }
      else{
        $sukses = false;
        $pesan = "Gagal";
        $kode = 204;
      }
    };
    $respon = array();
    $respon["success"] = $sukses;
    $respon["data"] = array();
    $respon["message"] = $pesan;
    $respon["code"] = $kode;
    while($row = mysqli_fetch_assoc($query)){
      $data['id'] = $row["id"];
      $data['username'] = $row["username"];
      $data['password'] = $row["password"];
      $data['level'] = $row["level"];
      $data['fullname'] = $row["fullname"];
    array_push($respon["data"],$data);
    }
    echo json_encode($respon);















?>