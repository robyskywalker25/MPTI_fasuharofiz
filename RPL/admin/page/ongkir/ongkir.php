<h2>Data Ongkir</h2>
<hr>

<a href="index.php?page=ongkir&aksi=tambah" class="btn btn-primary">Tambah Data</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Ongkir
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kota</th>
                                            <th>Tarif</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $nomor=1; ?>
                                    	<?php $ambil=$koneksi->query("SELECT * FROM ongkir"); ?>
                                    	<?php while($pecah=$ambil->fetch_assoc()){ ?>
                                    	
                                    	<tr>
                                    		<td><?php echo $nomor; ?></td>
                                    		<td><?php echo $pecah['nama_kota']; ?></td>
                                    		<td>Rp. <?php echo number_format($pecah['tarif']); ?></td>
                                            
                                    		
                                    		<td>
                                    			<a onclick="return confirm('Yakin Akan DiHapus??')" href="index.php?page=ongkir&aksi=hapus&id=<?php echo $pecah['id_ongkir'] ?>" class="btn btn-danger">Hapus</a>
                                    			

                                                <a href="index.php?page=ongkir&aksi=ubah&id=<?php echo $pecah['id_ongkir']; ?>" class="btn btn-primary">Ubah</a>
                                    		</td>

                                    	</tr>
                                    	<?php $nomor++; ?>
                                    	<?php } ?>
                                    	



                                    </tbody>