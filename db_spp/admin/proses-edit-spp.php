<?php

$id_spp = $_GET['id_spp'];
$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

// include'../koneksi.php';
// $sql = "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp='$id_spp'";
// $query = mysqli_query($koneksi, $sql);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/API_SERVER/phprestapi.php?function=update_spp&id_spp=$id_spp",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "tahun=$tahun&nominal=$nominal",
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

if($curl){
    header("Location:?url=spp");
}else{
    echo"<script>alert('Maaf Data Anda Tidak Tesimpan'); window.location.assign('?url=spp');</script>";
}