<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Barang</li>
    </ol>
</div><!--/.row-->

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 15px; font-weight: bold;">
                DATA BARANG
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="no" data-sortable="true" width="10px">No</th>
                                <th data-field="id_barang" data-sortable="true">ID Barang</th>
                                <th data-field="nama_barang" data-sortable="true">Nama Barang</th>
                                <th data-field="jenis_barang" data-sortable="true">Jenis Barang</th>
                                <th data-field="stok" data-sortable="true">Stok</th>
                                <th data-field="stok" data-sortable="true">QR Code</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; foreach ($datauser as $row) : $no++; ?>
                                <tr>
                                    <td data-field="no" width="10px"><?php echo $no; ?></td>
                                    <td data-field="id_barang"><?php echo $row->id_barang; ?></td>
                                    <td data-field="nama_barang"><?php echo $row->nama_barang; ?></td>
                                    <td data-field="jenis_barang"><?php echo $row->jenis_barang; ?></td>
                                    <td data-field="stok"><?php echo $row->stok; ?></td>
                                    <td data-field="qr_code">
                                    <?php
                                    // Generate QR Code
                                    $qrCode = new BaconQrCode\Encoder\QrCode($row->id_barang);
                                    echo '<img src="data:image/png;base64,' . base64_encode($qrCode->output()) . '" alt="QR Code">';
                                    ?>
                                    </td>
                                    <td>
                                        <a class="ubah btn btn-primary btn-xs" href="<?php echo base_url(); ?>barang/edit/<?php echo $row->id_barang; ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                                        <a data-toggle="modal" title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row->id_barang; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
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
    $(function () {
        $('#hover, #striped, #condensed').click(function () {
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
    $(document).ready(function () {

        $(".hapus").click(function () {
            var id = $(this).data('id');

            $(".modal-body #mod").text(id);

        });

    });
</script>
