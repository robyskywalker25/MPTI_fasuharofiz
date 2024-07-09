 <h2>Data Kategori</h2>
<hr>

<a href="index.php?page=kategori&aksi=tambah" class="btn btn-primary">Tambah Data</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Kategori
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $nomor=1; ?>
                                    	<?php $ambil=$koneksi->query("SELECT * FROM kategori"); ?>
                                    	<?php while($pecah=$ambil->fetch_assoc()){ ?>
                                    	
                                    	<tr>
                                    		<td><?php echo $nomor; ?></td>
                                    		<td><?php echo $pecah['kategori']; ?></td>
                                    		
                                            
                                    		<td>
                                    			<a onclick="return confirm('Yakin Akan DiHapus??')" href="index.php?page=kategori&aksi=hapus&id=<?php echo $pecah['id_kategori'] ?>" class="btn btn-danger" >Hapus</a>
                                    			

                                                <a href="index.php?page=kategori&aksi=ubah&id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-primary" ><i class="fa fa-edit"></i>Ubah</a>
                                    		</td>

                                    	</tr>
                                    	<?php $nomor++; ?>
                                    	<?php } ?>
                                    	



                                    </tbody>