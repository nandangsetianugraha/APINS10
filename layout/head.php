<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<?php 
		$judul=explode("-",$halaman);
		$judul=implode(" ",$judul);
		if($judul==''){$judul='Beranda';};
		?>
		<title><?=strtoupper($judul);?> | APINS</title>
		<meta name="keywords" content="Aplikasi Penilaian dan Informasi Nilai Siswa" />
		<meta name="description" content="APINS - SD Islam Al Jannah Gabuswetan">
		<meta name="author" content="Nandang Setia Nugraha">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="<?=base_url();?>vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/boxicons/css/boxicons.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/dropzone/basic.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/dropzone/dropzone.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/summernote/summernote-bs4.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/codemirror/theme/monokai.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/morris/morris.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/datatables/media/css/dataTables.bootstrap5.css" />
		<link rel="stylesheet" href="<?=base_url();?>vendor/sweetalert2/sweetalert2.min.css">
		<link rel="stylesheet" href="<?=base_url();?>vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="icon" href="favicon.ico" sizes="16x16">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=base_url();?>css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=base_url();?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=base_url();?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?=base_url();?>vendor/modernizr/modernizr.js"></script>
		<style>
		#loading {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: center no-repeat transparant;
		}

		@-webkit-keyframes spin {
			0% { -webkit-transform: rotate(0deg); }
			100% { -webkit-transform: rotate(360deg); }
		}
		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}

		.no-js #loader { display: none;	}
		.js #loader { display: block; position: absolute; left: 100px; top: 0; }

		.loader {
			border: 10px solid #f3f3f3;
			border-radius: 50%;
			border-top: 10px solid #3498db;
			border-bottom: 10px solid #FFC107;
			width: 150px;
			height: 150px;
			left: 43.5%;
			top: 20%;
			-webkit-animation: spin 2s linear infinite;
			position: fixed;
			animation: spin 2s linear infinite;
		}

		.textLoader{
			position: fixed;
			top: 56%;
			left: 45.6%;
			color: #34495e;
		}
			
		/*-- responsive --*/
			@media screen and (max-width: 1034px){
				.textLoader{
					left: 46.2%;
				}
			}

			@media screen and (max-width: 824px){
				.textLoader {
					left: 47.2%;
				}
			}

			@media screen and (max-width: 732px){
				.textLoader {
					left: 48.2%;
				}
			}

			@media screen and (max-width: 500px){
				.loader{
					left: 36.5%;;
				}
				.textLoader {
					left: 40.5%;
				}
			}

			@media screen and (max-height: 432px){
				.textLoader {
					top: 65%;
				}
			}

			@media screen and (max-height: 350px){
				.textLoader {
					top: 75%;
				}
			}

			@media screen and (max-height: 312px){
				.textLoader {
					display: none;
				}
			}
		/*-- responsive --*/

		</style>