<?php 

	
	$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]' ");


 ?>
<script type="text/javascript">
	
	window.location.href="?page=pelanggan";
</script>