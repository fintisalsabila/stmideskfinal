<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="display: flex; align-items: center;">
                <!-- Use base_url() for the image source -->
                <img src="<?php echo base_url('asset/images/STMIDESK.png'); ?>" style="height: 50px; margin-right: 70px; margin-left: 70px;" loading="lazy" decoding="async">
                <span>E-Ticketing</span>| Pengadaan Barang di Politeknik STMI Jakarta</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg> <?php echo $this->session->userdata('nama'); ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url(); ?>profile/view">
                                <svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg> Profile
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>profile/change_password">
                                <svg class="glyph stroked lock">
                                    <use xlink:href="#stroked-lock"></use>
                                </svg>
                                Change Password
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>login/logout">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>