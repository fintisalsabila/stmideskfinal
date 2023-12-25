		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Dashboard <?php echo $this->session->userdata('id_jabatan'); ?></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<style>
			.panel-widget:hover {
				border: 2px solid #333;
				cursor: pointer;
				transition: all 0.3s ease;
			}

			.panel-widget a:hover {
				text-decoration: none;
			}

			.panel-widget:hover .widget-left svg,
			.panel-widget:hover .widget-right {
				color: #333;
				/* ubah warna bebas */
			}
		</style>

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<a href="<?php echo base_url(); ?>myticket/myticket_list">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked bag">
									<use xlink:href="#stroked-bag"></use>
								</svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large"><?php echo $jml_ticket; ?></div>
								<div class="text-muted">Total Tiket</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<a href="<?php echo base_url(); ?>karyawan/karyawan_list">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked male-user">
									<use xlink:href="#stroked-male-user"></use>
								</svg>
							</div>

							<div class="col-sm-9 col-lg-7 widget-right">

								<div class="large"><?php echo $jml_karyawan; ?></div>
								<div class="text-muted">Total Karyawan</div>

							</div>

					</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<a href="<?php echo base_url(); ?>user/user_list">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked male-user">
									<use xlink:href="#stroked-male-user"></use>
								</svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large"><?php echo $jml_user; ?></div>
								<div class="text-muted">Total Pengguna</div>
							</div>
					</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<a href="<?php echo base_url(); ?>teknisi/teknisi_list">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked male-user">
									<use xlink:href="#stroked-male-user"></use>
								</svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large"><?php echo $jml_teknisi; ?></div>
								<div class="text-muted">Total Teknisi</div>
							</div>
					</div>
					</a>
				</div>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<a href="<?php echo base_url(); ?>myticket/feedback_filterdone">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<h4>Tiket Selesai</h4>
							<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $jml_ticket_solved; ?>"><span class="percent"><?php echo ceil($jml_ticket_solved); ?> %</span>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xs-6 col-md-3">
				<a href="<?php echo base_url(); ?>myticket/feedback_filterwaitkunit" class="panel-link">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<h4>Tiket Menunggu <br> Persetujuan Kepala Unit</h4>
							<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $jml_ticket_process; ?>"><span class="percent"><?php echo ceil($jml_ticket_process); ?> %</span>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xs-6 col-md-3">
				<a href="<?php echo base_url(); ?>myticket/feedback_filterWaitKasubag" class="panel-link">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<h4>Tiket Menunggu <br> Persetujuan Kasubag</h4>
							<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $jml_ticket_app_int; ?>">
								<span class="percent"><?php echo ceil($jml_ticket_app_int); ?> %</span>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xs-6 col-md-3">
				<a href="<?php echo base_url(); ?>myticket/feedback_filterprogress" class="panel-link">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<h4>Tiket Sedang <br> Proses Pengerjaan</h4>
							<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $jml_ticket_app_tek; ?>"><span class="percent"><?php echo ceil($jml_ticket_app_tek); ?>%</span>
							</div>
						</div>
					</div>
				</a>
			</div>



		</div><!--/.row-->


		<div class="row">




			<div class="col-xs-6 col-md-6">


				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<a href="<?php echo base_url(); ?>myticket/feedback_filteryes">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked star">
									<use xlink:href="#stroked-star" />
								</svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large"><?php echo ceil($jml_feedback_positiv); ?>%</div>
								<div class="text-muted">Feedback Positif</div>
							</div>
						</a>
					</div>
				</div>

			</div>


			<div class="col-xs-6 col-md-6">


				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<a href="<?php echo base_url(); ?>myticket/feedback_filterno">
							<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked cancel">
									<use xlink:href="#stroked-cancel" />
								</svg>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large"><?php echo ceil($jml_feedback_negativ); ?>%</div>
								<div class="text-muted">Feedback Negatif</div>
							</div>
						</a>
					</div>
				</div>

			</div>





		</div><!--/.row-->



		</div><!--/.col-->
		</div><!--/.row-->
		</div> <!--/.main-->