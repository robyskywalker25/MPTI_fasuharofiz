<?php 

	
	$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]' ");


 ?>
<script type="text/javascript">
	
	window.location.href="?page=kategori";
</script>