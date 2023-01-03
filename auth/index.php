<?php 
session_start();
if (isset($_SESSION['userid'])) {
    header("location:../");
	exit();
};
include '../config/versi.php';
include '../config/config.php'; 
include '../config/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Log In | APINS</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css">

  <!-- CSS Front Template -->

  <link rel="preload" href="../assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="../assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

  <style data-hs-appearance-onload-styles>
    *
    {
      transition: unset !important;
    }

    body
    {
      opacity: 0;
    }
  </style>

  <script>
            window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","assets/js/demo.js"],"build":["assets/css/theme.css","assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js","assets/js/demo.js","assets/css/theme-dark.css","assets/css/docs.css","assets/vendor/icon-set/style.css","assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js","assets/js/demo.js"]},"minifyCSSFiles":["assets/css/theme.css","assets/css/theme-dark.css"],"copyDependencies":{"dist":{"*assets/js/theme-custom.js":""},"build":{"*assets/js/theme-custom.js":"","node_modules/bootstrap-icons/font/*fonts/**":"assets/css"}},"buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"./src","dist":"./dist","build":"./build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}
            window.hs_config.gulpRGBA = (p1) => {
  const options = p1.split(',')
  const hex = options[0].toString()
  const transparent = options[1].toString()

  var c;
  if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
    c= hex.substring(1).split('');
    if(c.length== 3){
      c= [c[0], c[0], c[1], c[1], c[2], c[2]];
    }
    c= '0x'+c.join('');
    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
  }
  throw new Error('Bad Hex');
}
            window.hs_config.gulpDarken = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = -parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            window.hs_config.gulpLighten = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            </script>
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
</head>

<body class="d-flex align-items-center min-h-100">

  <script src="../assets/js/hs.theme-appearance.js"></script>
	<div id="loading">
		<div class="logoLoader"></div>
		<span class="loader"></span>
		<div class="textLoader">
			<center>
			<b>Please Wait ... </b>
			</center>
		</div>
	</div>
  <!-- ========== HEADER ========== -->
  <header class="position-absolute top-0 start-0 end-0 mt-3 mx-3">
    <div class="d-flex d-lg-none justify-content-between">
      <a href="../">
        <img class="w-100" src="../assets/logo.png" alt="Image Description" data-hs-theme-appearance="default" style="min-width: 4rem; max-width:4rem;">
        <img class="w-100" src="../assets/logo.png" alt="Image Description" data-hs-theme-appearance="dark" style="min-width: 4rem; max-width: 4rem;">
      </a>

      <!-- Select -->
      
      <!-- End Select -->
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main pt-0">
    <!-- Content -->
    <div class="container-fluid px-3">
      <div class="row">
        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-light px-0">
          <!-- Logo & Language -->
          <div class="position-absolute top-0 start-0 end-0 mt-3 mx-3">
            <div class="d-none d-lg-flex justify-content-between">
              <a href="../">
                <img class="w-100" src="../assets/logo.png" alt="Image Description" data-hs-theme-appearance="default" style="min-width: 4rem; max-width:4rem;">
                <img class="w-100" src="../assets/logo.png" alt="Image Description" data-hs-theme-appearance="dark" style="min-width: 4rem; max-width: 4rem;">
              </a>

              <!-- Select -->
              <!-- End Select -->
            </div>
          </div>
          <!-- End Logo & Language -->

          <div style="max-width: 23rem;">
            <div class="text-center mb-5">
              <img class="img-fluid" src="../assets/img1.png" alt="Image Description" style="width: 12rem;" data-hs-theme-appearance="default">
              <img class="img-fluid" src="../assets/img1.png" alt="Image Description" style="width: 12rem;" data-hs-theme-appearance="dark">
            </div>

            <div class="mb-5">
              <h2 class="display-5">Membangun Sistem Digital Dunia Pendidikan:</h2>
            </div>

            <!-- List Checked -->
            <ul class="list-checked list-checked-lg list-checked-primary list-py-2">
              <li class="list-checked-item">
                <span class="d-block fw-semibold mb-1">Satu alat untuk semua jenis penilaian</span>
                APINS dapat digunakan untuk mengolah penilaian baik itu Kurikulum 2013 maupun Kurikulum Merdeka.
              </li>

              <li class="list-checked-item">
                <span class="d-block fw-semibold mb-1">Mudah dan Fleksibel penggunaannya</span>
                APINS tidak hanya mudah dalam pengoperasiannya juga fleksibel dalam memproses penilaian.
              </li>
            </ul>
            <!-- End List Checked -->

            <div class="row justify-content-between mt-5 gx-3">
              <div class="col">
                <img class="img-fluid" src="../assets/logo.png" alt="Logo">
              </div>
              <!-- End Col -->

              <div class="col">
                <img class="img-fluid" src="../assets/logo-indramayu.png" alt="Logo">
              </div>
              <!-- End Col -->

              <div class="col">
                <img class="img-fluid" src="../assets/logo-jabar.svg" alt="Logo">
              </div>
              <!-- End Col -->

              
            </div>
            <!-- End Row -->
          </div>
        </div>
        <!-- End Col -->

        <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100">
          <div class="w-100 content-space-t-4 content-space-t-lg-2 content-space-b-1" style="max-width: 25rem;">
            <!-- Form -->
			
            <form method="POST" name="form1" action="checklogin.php" class="js-validate needs-validation" novalidate>
              <div class="text-center">
                <div class="mb-5">
                  <h1 class="display-5">A P I N S</h1>
                  <p>Gunakan Username dan Password Anda</p>
                </div>
              </div>
				<?php if($maintenis==1){ ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<h1>Server Maintenance</h1><br/>Anda dapat masuk tetapi tidak bisa merubah dan memasukkan nilai.
				</div>
				<?php } ?>

              <!-- Form -->
              <div class="mb-4">
                <label class="form-label" for="username">Username</label>
                <input type="text" class="form-control form-control-lg" name="username" id="username" tabindex="1" placeholder="Username" aria-label="" required>
                <span class="invalid-feedback">Masukkan Username.</span>
              </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-4">
                <label class="form-label w-100" for="password" tabindex="0">
                  <span class="d-flex justify-content-between align-items-center">
                    <span>Password</span>
                  </span>
                </label>

                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                  <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="password" placeholder="8+ characters required" aria-label="4+ characters required" required minlength="4" data-hs-toggle-password-options='{
                           "target": "#changePassTarget",
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": "#changePassIcon"
                         }'>
                  <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                    <i id="changePassIcon" class="bi-eye"></i>
                  </a>
                </div>

                <span class="invalid-feedback">Masukkan Password yang benar!.</span>
              </div>
              <!-- End Form -->
			  <div class="row">
				  <div class="col-6">
				  <div class="mb-4">
					<label class="form-label" for="username">Tahun Ajaran</label>
					<select class="form-select" id="tapel" name="tapel">
						<?php 
						$tapels = $connect->query("SELECT * FROM tapel");
						//$cfg=$cekconfig->fetch_assoc();
						while($t=$tapels->fetch_assoc()){
						?>
						<option value="<?=$t['nama_tapel']?>" <?php if($t['nama_tapel']==$tapel_aktif){echo "selected";} ?>><?=$t['nama_tapel'];?></option>
						<?php } ?>
					</select>
				  </div>
				  </div>
				  <div class="col-6">
				  <div class="mb-4">
					<label class="form-label" for="username">Semester</label>
					<select class="form-select" id="smt" name="smt">
						<option value="1" <?php if($smt_aktif==1){echo "selected";} ?>>Semester 1</option>
						<option value="2" <?php if($smt_aktif==2){echo "selected";} ?>>Semester 2</option>
					</select>
				  </div>
				  </div>
			  </div>
			  <div class="d-grid">
                <button name="Submit" id="submit" type="submit" class="btn btn-primary btn-lg">Masuk</button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
	<!-- Toast -->
<div id="liveToast" class="position-fixed toast hide" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
  <div class="toast-header">
    <div class="d-flex align-items-center flex-grow-1">
      <div class="flex-shrink-0">
        <img class="avatar avatar-sm avatar-circle" src="../assets/logo.png" alt="Image description">
      </div>
      <div class="flex-grow-1 ms-3">
        <h5 class="mb-0">APINS</h5>
        <small class="ms-auto">Informasi</small>
      </div>
      <div class="text-end">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <div class="toast-body">
    Username atau Password tidak boleh kosong!!
  </div>
</div>
<div id="liveToast1" class="position-fixed toast hide" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
  <div class="toast-header">
        <div class="d-flex align-items-center flex-grow-1">
      <div class="flex-shrink-0">
        <img class="avatar avatar-sm avatar-circle" src="../assets/logo.png" alt="Image description">
      </div>
      <div class="flex-grow-1 ms-3">
        <h5 class="mb-0">APINS</h5>
        <small class="ms-auto">Informasi</small>
      </div>
      <div class="text-end">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <div class="toast-body">
    <div id="pesan"></div>
  </div>
</div>
<!-- End Toast -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- JS Global Compulsory  -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="../assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>
  <script src="../assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>

  <!-- JS Front -->
  <script src="../assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      window.onload = function () {
        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate', {
          onSubmit: data => {
            data.event.preventDefault()
            alert('Submited')
          }
        })


        // INITIALIZATION OF TOGGLE PASSWORD
        // =======================================================
        new HSTogglePassword('.js-toggle-password')


        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')
      }
    })()
  </script>
  <script src="login.js"></script>
  <script>
	$("#loading").hide();
	$(".loader").hide();
	</script>
</body>
</html>