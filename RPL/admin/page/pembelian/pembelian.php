<h2>Data Pembelian</h2>
<hr>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Halaman Pembelian
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Status Pembelian</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
								<tbody>
									<?php $nomor=1; ?>
									<?php $ambil= $koneksi-> query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_pembelian DESC"); ?>
									<?php while ($pecah = $ambil->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $nomor; ?></td>
											<td><?php echo $pecah ['nama_pelanggan']; ?></td>
											<td><?php echo  $pecah ['tgl_pembelian']; ?></td>
                                            <td><?php echo  $pecah ['status_pembelian']; ?></td>
											<td>Rp. <?php echo  number_format($pecah ['total_pembelian']); ?></td>

                                        <td><a href="?page=pembelian&aksi=detail&id=<?php echo $pecah['id_pembelian'];  ?>" class="btn btn-info">Detail</a>

                                            <?php if ($pecah['status_pembelian']!=="pending") : ?>
                                            <a href="?page=pembelian&aksi=pembayaran&id=<?php echo $pecah ['id_pembelian']; ?>" class="btn btn-success">Lihat Pembayaran</a>
                                            <?php endif ?>

                                        </td> 



										</tr>
										<?php $nomor++; ?>
										<?php } ?>

                                        
		
								</tbody>

                            </div>
                        </div>
                   </div>
            </div>
     </div>

