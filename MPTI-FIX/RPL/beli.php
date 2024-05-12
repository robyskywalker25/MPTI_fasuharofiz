<?php 
include 'koneksi.php';
session_start();
// mendapatkan id_produk dari url
$id_produk= $_GET['id'];
//
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil->fetch_assoc();

if($detail["stok_produk"] > 0){

		if(isset($_SESSION['keranjang'][$id_produk])  )
	{
		$_SESSION['keranjang'][$id_produk]+=1;
	}

// selain itu (belum ada dikeranjang), maka produk dianggap dibeli 1
	else 
	{
		$_SESSION['keranjang'][$id_produk]= 1;
	}

}
else{
	echo "<script>alert ('Stok Produk Kosong');</script>";
	echo "<script>location='index.php';</script>";

}





//jika sudah ada produk itu dikeranjang, maka produk itu jumlahnya di +1


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script> alert('Produk Sudah Ditambah Ke Keranjang Belanja');</script>";

echo "<script>location='keranjang.php';</script>";


 ?>