<?php 

	
	$koneksi->query("DELETE FROM ongkir WHERE id_ongkir='$_GET[id]' ");


 ?>
<script type="text/javascript">
	
	window.location.href="?page=ongkir";
</script>