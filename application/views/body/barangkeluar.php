<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Barang Keluar</li>
    </ol>
</div><!--/.row-->

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 15px; font-weight: bold;">
                DATA BARANG KELUAR
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="no" data-sortable="true" width="10px">No</th>
                                <th data-field="id_barang_keluar" data-sortable="true">ID Barang Keluar</th>
                                <th data-field="nama_barang" data-sortable="true">Nama Barang</th>
                                <th data-field="jumlah_keluar" data-sortable="true">Jumlah Keluar</th>
                                <th data-field="tanggal_keluar" data-sortable="true">Tanggal Keluar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; foreach ($databarangkeluar as $row) : $no++; ?>
                                <tr>
                                    <td data-field="no" width="10px"><?php echo $no; ?></td>
                                    <td data-field="id_barang_keluar"><?php echo $row->id_barang_keluar; ?></td>
                                    <td data-field="nama_barang"><?php echo $row->nama_barang; ?></td>
                                    <td data-field="jumlah_keluar"><?php echo $row->jumlah_keluar; ?></td>
                                    <td data-field="tanggal_keluar"><?php echo $row->tanggal_keluar; ?></td>
                                    <td>
                                        <!-- Your action buttons here -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<?php echo $this->session->flashdata("msg"); ?>

<script>
    // ... Your existing JavaScript code
</script>

<?php $this->load->view('konfirmasi'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $(".hapus").click(function () {
            var id = $(this).data('id');
            $(".modal-body #mod").text(id);
        });
    });
</script>
