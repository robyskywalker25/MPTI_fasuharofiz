<h2>Data Produk</h2> <hr>

<a href="index.php?page=produk&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h3>Data Produk</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori Produk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Berat</th>
                                            <th>Foto Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $nomor=1; ?>
                                    	<?php $ambil=$koneksi->query("SELECT * FROM produk JOIN kategori 
                                                                     ON produk.id_kategori=kategori.id_kategori"); ?>
                                    	<?php while($pecah=$ambil->fetch_assoc()){ ?>
                                    	
                                    	<tr>
                                    		<td><?php echo $nomor; ?></td>
                                    		<td><?php echo $pecah['nama_produk']; ?></td>
                                            <td><?php echo $pecah['kategori']; ?></td>
                                    		<td> Rp.<?php echo number_format($pecah['harga']); ?></td>
                                            <td><?php echo $pecah['stok_produk']; ?></td>
                                    		<td><?php echo $pecah['berat']; ?></td>
                                            
                                    		<td>
                                                <img src="../foto_produk/<?php  echo $pecah['foto_produk']; ?>" width="100">      
                                            </td>
                                    		<td>
                                    			<a onclick="return confirm('Yakin akan dihapus??')" href="index.php?page=produk&aksi=hapus&id=<?php echo $pecah['id_produk'] ?>" class="btn btn-danger">Hapus</a>
                                    			

                                                <a href="index.php?page=produk&aksi=ubah&id=<?php echo $pecah['id_produk'] ?>" class="btn btn-primary">Ubah</a>
                                    		</td>

                                    	</tr>
                                    	<?php $nomor++; ?>
                                    	<?php } ?>
                                    	



                                    </tbody>