<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

	<ul class="nav menu">

		<?php if ($this->session->userdata('level') == "ADMIN") { ?>
			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>barang/barang_list"><svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use>
			</svg> Data Barang</a></li>
			<li><a href="<?php echo base_url(); ?>barangmasuk/index"><svg class="glyph stroked bag">
    					<use xlink:href="#stroked-bag"></use>
			</svg> Barang Masuk</a></li>
			<li><a href="<?php echo base_url(); ?>barangkeluar/index"><svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use>
			</svg> Barang Keluar</a></li>
			<li><a href="<?php echo base_url(); ?>karyawan/karyawan_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Data Karyawan</a></li>
			<li><a href="<?php echo base_url(); ?>user/user_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Data User</a></li>
			<li><a href="<?php echo base_url(); ?>jabatan/jabatan_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-pen-tip"></use>
					</svg> Jabatan</a></li>
			<li><a href="<?php echo base_url();?>bagian_departemen/bagian_departemen_list"><svg class="glyph stroked line-graph">
				<use xlink:href="#stroked-app-window"></use></svg> Bagian Prodi</a></li>
			<li><a href="<?php echo base_url(); ?>departemen/departemen_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-app-window"></use>
					</svg> Prodi</a></li>
			<li><a href="<?php echo base_url(); ?>sub_kategori/sub_kategori_list"><svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-app-window"></use>
					</svg>Kategori Kerusakan</a></li>
			<li><a href="<?php echo base_url(); ?>teknisi/teknisi_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Data Teknisi</a></li>
			<li><a href="<?php echo base_url(); ?>kondisi/kondisi_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-hourglass"></use>
					</svg> Kondisi</a></li>

		<?php

		} else if ($this->session->userdata('level') == "TEKNISI") { ?>
			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>myassignment/myassignment_list"><svg class="glyph stroked clipboard with paper">
						<use xlink:href="#stroked-clipboard-with-paper" />
					</svg> Task & ToDoList</a></li>
			<li><a href="<?php echo base_url(); ?>barangmasuk/index"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
			</svg> Barang Masuk</a></li>
			<li><a href="<?php echo base_url(); ?>barangkeluar/index"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
			</svg> Barang Keluar</a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Evaluasi Teknisi</a></li>
			<li><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Proses Kinerja Teknisi</a></li>
		<?php

		} else if ($this->session->userdata('level') == "CUSTOMER") { ?>
			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li class="active"><a href="<?php echo base_url(); ?>ticket/add"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg> Membuat Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>myticket/myticket_list"><svg class="glyph stroked open letter">
						<use xlink:href="#stroked-open-letter" />
					</svg> Status Ticketing</a></li>
			<li><a href="<?php echo base_url(); ?>informasi/informasi_list"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Ulasan Untuk Teknisi </a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Evaluasi Ulasan Teknisi </a></li>
		<?php

		} else if ($this->session->userdata('level') == "KEPALAUNIT") { ?>
			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li class="active"><a href="<?php echo base_url(); ?>ticket/add"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg> Membuat Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>approval/approval_list"><svg class="glyph stroked email">
						<use xlink:href="#stroked-email" />
					</svg>
					<use xlink:href="#stroked-male-user"></use></svg> Menyetujui Ticket (<?php if (empty($notif_approval)) {
																								echo "0";
																							} else {
																								echo $notif_approval;
																							} ?>)
				</a></li>
			<li><a href="<?php echo base_url(); ?>myticket/myticket_list"><svg class="glyph stroked open letter">
						<use xlink:href="#stroked-open-letter" />
					</svg> Status Ticketing</a></li>
			<li><a href="<?php echo base_url(); ?>informasi/informasi_list"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Ulasan Untuk Teknisi </a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Evaluasi Ulasan Teknisi </a></li>
		<?php

		} else if ($this->session->userdata('level') == "KASUBAG") { ?>
			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>list_ticket/ticket_list"><svg class="glyph stroked notepad ">
						<use xlink:href="#stroked-notepad" />
					</svg> Ticket Masuk & Pilih Teknisi (<?php if (empty($notif_approval)) {
																echo "0";
															} else {
																echo $notif_list_ticket;
															} ?>)</a></li>
			<li><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Proses Kinerja Teknisi</a></li>
			<li><a href="<?php echo base_url(); ?>myticket/myticket_list"><svg class="glyph stroked open letter">
						<use xlink:href="#stroked-open-letter" />
					</svg> Status Ticketing</a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Evaluasi Ulasan Teknisi </a></li>
		<?php

		} else if ($this->session->userdata('level') == "MANAJEMEN") { ?>
			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Proses Kinerja Teknisi</a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Evaluasi Ulasan Teknisi </a></li>
		<?php

		} else if ($this->session->userdata('level') == "USER" and $this->session->userdata('id_jabatan') == 3) { ?>
			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li class="active"><a href="<?php echo base_url(); ?>ticket/add"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg> New Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>myticket/myticket_list"><svg class="glyph stroked open letter">
						<use xlink:href="#stroked-open-letter" />
					</svg> My Ticket</a></li>

			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li>
		<?php } else if ($this->session->userdata('level') == "USER" and $this->session->userdata('id_jabatan') == 2) { ?>

			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>approval/approval_list"><svg class="glyph stroked email">
						<use xlink:href="#stroked-email" />
					</svg>
					<use xlink:href="#stroked-male-user"></use></svg> Aprroval Ticket
				</a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Evaluasi Teknisi</a></li>
			<li><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Report Teknisi</a></li>

		<?php } ?>
	</ul>

</div><!--/.sidebar-->