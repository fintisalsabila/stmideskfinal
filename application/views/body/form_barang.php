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
            <div class="panel-heading">
                <svg class="glyph stroked male user">
                    <use xlink:href="#stroked-male-user"/>
                </svg>
                <a href="#" style="text-decoration:none">Tambah Data Barang</a>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <form method="post" action="<?php echo base_url() . $url; ?>">
                        <input type="hidden" class="form-control" name="id_barang" value="<?php echo $id_barang; ?>">

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <?php echo form_dropdown('id_jenis', $dd_jenis_barang, $id_jenis_barang, 'id="id_jenis" required class="form-control"'); ?>
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" class="form-control" name="stok" value="<?php echo $stok; ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>barang/barang_list" class="btn btn-default">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->
