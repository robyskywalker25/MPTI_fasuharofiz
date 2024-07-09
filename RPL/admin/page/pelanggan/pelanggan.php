
<h2>Data Pelanggan</h2>

<hr>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data pelanggan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>email</th>
                                            <th>No. Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor=1; ?>
                                    	<?php $ambil =$koneksi->query("select * from pelanggan"); ?>
                                    	<?php while ($pecah =$ambil->fetch_assoc()) {?>
                                    
                                   		<tr>
                                            <td><?php echo $nomor; ?></td>
                                   			<td><?php echo $pecah['nama_pelanggan']; ?></td>
                                            <td><?php echo $pecah['email']; ?></td>
                                            <td><?php echo $pecah['telepon']; ?></td>
                                            <td>
                                                <a onclick=" return confirm('Yakin Akan DiHapus??')" href="?page=pelanggan&aksi=hapus&id=<?php echo $pecah['id_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                            
                                   		</tr>
                                          <?php $nomor++; ?>

                                    <?php } ?>
                                  


                                    </tbody>