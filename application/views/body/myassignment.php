<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home">
					<use xlink:href="#stroked-home"></use>
				</svg></a></li>
		<li class="active">My Assignment Ticket</li>
	</ol>
</div><!--/.row-->

<br>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><svg class="glyph stroked male user ">
					<use xlink:href="#stroked-male-user" />
				</svg>
				<a href="#" style="text-decoration:none">My Assignment Ticket</a>
			</div>
			<div class="panel-body">
				<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-field="no" data-sortable="true" width="10px"> No</th>
							<th data-field="idd" data-sortable="true">Id Ticket</th>
							<th data-field="iddd" data-sortable="true">Tanggal</th>
							<th data-field="idddd" data-sortable="true">Nama Kategori</th>
							<th data-field="iddddd" data-sortable="true">Nama Sub Kategori</th>
							<th data-field="idddddd" data-sortable="true">Progress</th>
							<th data-field="iddddddC" data-sortable="true">Gambar</th>
							<th data-field="iddddddd" data-sortable="true">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0;
						foreach ($datamyassignment as $row) : $no++; ?>
							<tr>
								<td data-field="no" width="10px"><?php echo $no + 1; ?></td>
								<td data-field="id">
									<?php if ($row->status == 4) { ?>
										<a href="<?php echo base_url(); ?>myassignment/ticket_detail/<?php echo $row->id_ticket; ?>"><?php echo $row->id_ticket; ?></a>
									<?php } else {
										echo $row->id_ticket;
									} ?>
								</td>
								<td data-field="id"><?php echo $row->tanggal; ?></td>
								<td data-field="idddd"><?php echo $row->nama_kategori; ?></td>
								<td data-field="id"><?php echo $row->nama_sub_kategori; ?></td>
								<td data-field="iddddd">
									<?php
									if ($row->status == 4) {
										echo $row->progress; // Tampilkan nilai angka jika status = 4
									} else {
										// Ubah nilai angka menjadi teks sesuai dengan kondisi yang diinginkan
										if ($row->progress == 0) {
											echo 'Pending';
										} elseif ($row->progress == 50) {
											echo 'On Progress';
										} elseif ($row->progress == 100) {
											echo 'Done';
										} else {
											echo $row->progress; // Tampilkan nilai aslinya jika tidak sesuai kondisi di atas
										}
									}
									?>
								</td>
								<td data-field="idcfdddd">
									<img src="<?php echo base_url('assets/uploads/' . $row->foto); ?>" alt="Tidak ada gambar" width="100">
									<!-- <?php echo $row->foto; ?> -->
								</td>
								<td data-field="id">
									<?php
									if ($row->status == 3) { ?>
										<a class="ubah btn btn-success btn-xs" href="<?php echo base_url(); ?>myassignment/terima/<?php echo $row->id_ticket; ?>"><span class="glyphicon glyphicon-thumbs-up"></span></a>
										<a class="ubah btn btn-danger btn-xs" href="<?php echo base_url(); ?>myassignment/pending/<?php echo $row->id_ticket; ?>"><span class="glyphicon glyphicon-minus-sign"></span></a>
									<?php } else if ($row->status == 5) { ?>
										<a class="ubah btn btn-success btn-xs" href="<?php echo base_url(); ?>myassignment/terima/<?php echo $row->id_ticket; ?>"><span class="glyphicon glyphicon-thumbs-up"></span></a>
									<?php } ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><!--/.row-->

<?php echo $this->session->flashdata("msg"); ?>

<script>
	$(function() {
		$('#hover, #striped, #condensed').click(function() {
			var classes = 'table';

			if ($('#hover').prop('checked')) {
				classes += ' table-hover';
			}
			if ($('#condensed').prop('checked')) {
				classes += ' table-condensed';
			}
			$('#table-style').bootstrapTable('destroy')
				.bootstrapTable({
					classes: classes,
					striped: $('#striped').prop('checked')
				});
		});
	});

	function rowStyle(row, index) {
		var classes = ['active', 'success', 'info', 'warning', 'danger'];

		if (index % 2 === 0 && index / 2 < classes.length) {
			return {
				classes: classes[index / 2]
			};
		}
		return {};
	}
</script>

<?php $this->load->view('konfirmasi'); ?>

<script type="text/javascript">
	$(document).ready(function() {

		$(".hapus").click(function() {
			var id = $(this).data('id');

			$(".modal-body #mod").text(id);

		});

	});
</script>