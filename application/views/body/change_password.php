<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li class="active">Ubah Kata Sandi</li>
    </ol>
</div><!--/.row-->

<br>


<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">Form</div>
            <div class="panel-body">
                <form class="form-horizontal row-border" method="post" action="<?php echo base_url(); ?><?php echo $url; ?>">
                <div class="form-group">
                        <label class="col-md-2 control-label" for="old_password">Password Lama</label>
                        <div class="col-md-10">
                            <input type="password" name="old_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Password Baru</label>
                        <div class="col-md-10">
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Konfirmasi Password Baru</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" name="pass_confirm" required>
                        </div>
                    </div>

                    <div class="col-md-12 widget-right">
                        <button type="submit" class="btn btn-primary btn-md pull-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div><!--/.row-->

<?php echo $this->session->flashdata("msg"); ?>