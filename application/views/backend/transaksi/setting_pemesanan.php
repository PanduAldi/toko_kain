<legend>
	<?php echo ucwords($title) ?>
</legend>

<div class="notif">
	<?php echo $this->session->flashdata('notif') ?>
</div>

<br>
<table class="table table-bordered table-striped" id="datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Invoice</th>
			<th>Nama Pemesan</th>
			<th>Tanggal Beli</th>
			<th>Total Harga</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($pemesanan as $v): ?>
			<tr class="baris_<?php echo $v['id_transaksi'] ?>">
				<td><?php echo $no++ ?></td>
				<td><a href="<?php echo site_url('detail_pemesanan/'.$v['id_transaksi']) ?>"><?php echo $v['no_invoice'] ?></a></td>
				<td><?php echo $v['nama'] ?></td>
				<td><?php echo tgl_indo($v['tgl_transaksi'])?></td>
				<td><?php echo "Rp. ".number_format($v['total_harga']) ?></td>
				<td>
					<?php 
						echo $v['status'];
						if(!empty($v['resi'])) 
						{
							echo "<br> No. Resi : <a href='http://www.cekresi.com/?v=wdg&noresi=".$v['resi']."' target='_blank'>".$v['resi']."</a>";
						}
					?>			
				</td>
				<td>
					<?php if ($v['status'] == "pending"): ?>
						<a href="javascript:void(0)" onclick="cek_pembayaran(<?php echo $v['id_transaksi'].",".$v['id_pelanggan'] ?>)" title="Cek Pemabayaran" class="btn btn-warning"><i class="fa fa-money"></i> Verifikasi Pembayaran</a>
						<a href="javascript:void(0)" onclick="hapus(<?php echo $v['id_transaksi'] ?>, 'hapus-transaksi')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
					<?php elseif($v['status'] == "pembayaran diterima"): ?>
						<a href="javascript:void(0)" onclick="konfirmasi_pengiriman(<?php echo $v['id_transaksi'] ?>)" title="Konfirmasi Pengiriman" class="btn btn-info"><i class="fa fa-truck"></i> Konfirmasi Pengiriman</a>
					<?php elseif($v['status'] == "dalam pengiriman"): ?>
						<a href="javascript:void(0)" onclick="selesaikan_transaksi(<?php echo $v['id_transaksi']; ?>)" title="Selesaikan Transaksi" class="btn btn-success"><i class="fa fa-check"></i> Selesaikan Transaksi</a>
					<?php elseif($v['status'] == "selesai"): ?>
						<p>No Action</p>
					<?php endif ?>
				</td>
			</tr>
		<?php endforeach ?>		
	</tbody>
</table>

<!-- Modal Status -->
<div class="modal fade" id="modal_bayar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">Cek Pembayaran</div>
			<div class="modal-body">

				<div class="cek_bayar"></div>
			</div>
			<div class="modal-footer">
				<div class="btn btn-default" data-dismiss="modal">
					Tutup
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Pengiriman -->
<div class="modal fade" id="modal_pengiriman">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">Konfirmasi Pengiriman</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="id_trans" />
					<label for="" class="control-label">Resi Pengiriman</label>
					<input type="text" class="form-control" id="no_resi" placeholder="Masukan Nomor Resi Pengiriman">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="simpan_resi" class="btn btn-success">Konfirmasi Pengiriman</button>
				<div class="btn btn-default" data-dismiss="modal">
					Tutup
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Selesai -->
<div class="modal fade" id="modal_selesai">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">Konfirmasi Selesai Transaksi</div>
			<div class="modal-body">
				<input type="hidden" id="selesaikan" />
				Apakah yakin menyelesaikan transaksi ini?
				<input type="hidden" id='id_selesai'>
			</div>
			<div class="modal-footer">
				<button type="button" id="simpan_selesai" class="btn btn-success">Konfirmasi Pengiriman</button>
				<div class="btn btn-default" data-dismiss="modal">
					Tutup
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	
	function cek_pembayaran(trans, pel)
	{
		$(function(){
			$("#modal_bayar").modal("show");

			
			$.ajax({
				url : "<?php echo site_url('cek_pembayaran') ?>",
				type : "POST",
				data  : { t : trans, p : pel },
				beforeSend : function(){
					$(".cek_bayar").html('<p align="center"> Tunggu Sebentar .... </p>');
				},
				success : function(e){
					$(".cek_bayar").html(e);
				}
 			});
		});
	}

</script>


<script>
	
	function konfirmasi_pengiriman(trans)
	{
		$(function(){

			$("#id_trans").val(trans);
			$("#modal_pengiriman").modal("show");
		});
	}

	$(function(){
		$("#simpan_resi").click(function(){
			var id = $("#id_trans").val();
			var resi = $("#no_resi").val();

			$.ajax({
				url : "<?php echo site_url('konfirmasi_pengiriman') ?>",
				type : "POST",
				data  : { id : id, resi : resi },
				success : function(){
					location.reload();
				}
			})
		});
	})

</script>

<script>
	
	function selesaikan_transaksi(trans)
	{
		$(function(){

			$("#id_selesai").val(trans);
			$("#modal_selesai").modal("show");
		});
	}

	$(function(){
		$("#simpan_selesai").click(function(){
			var id = $("#id_selesai").val();
			$.ajax({
				url : "<?php echo site_url('konfirmasi_selesai') ?>",
				type : "POST",
				data  : { id : id },
				success : function(){
					location.reload();
				}
			})
		});
	})

</script>


