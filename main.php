<?php
	ob_start();
	session_start();
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	include "database/koneksi.php";
	
	if ($_SESSION['username'] || $_SESSION['status']){
		?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Trappsila Jaya</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="stylemain.css">
<style>
  .adaptive-glass {
  --glass-lightness: 100%;
  background: hsl(0 0% var(--glass-lightness) / 50%);
  -webkit-backdrop-filter: blur(40px);
          backdrop-filter: blur(40px);
}
  
  @media (prefers-color-scheme: dark) {.adaptive-glass {
    --glass-lightness: 0%
}
  }
  
  @supports not ((-webkit-backdrop-filter: blur(1px)) or (backdrop-filter: blur(1px))) {.adaptive-glass {
    background: hsl(0 0% var(--glass-lightness) / 90%)
}
  }

figure {
  --on-glass-primary: hsl(220 50% 20%);
  --on-glass-secondary: hsl(220 40% 30%);
  
  border-radius: .5ch;
  overflow: hidden;
  
  /*  https://shadows.brumm.af/  */
  box-shadow:
    0 3px   2px  hsl(0 0% 0% / 2%),
    0 7px   5px  hsl(0 0% 0% / 3%),
    0 13px  10px hsl(0 0% 0% / 4%),
    0 22px  18px hsl(0 0% 0% / 5%),
    0 42px  33px hsl(0 0% 0% / 6%),
    0 100px 80px hsl(0 0% 0% / 7%)
  ;
}

@media (prefers-color-scheme: dark) {

figure {
    --on-glass-primary: hsl(220 50% 90%);
    --on-glass-secondary: hsl(220 30% 75%)
}
  }

figure img {
    display: block;
    inline-size: 100%;
    block-size: auto;
    -o-object-fit: cover;
       object-fit: cover;
  }

figcaption {
  display: grid;
  grid: [stack] 1fr / [stack] 1fr;
  position: relative;
}

figcaption > * {
    grid-area: stack;
  }

figcaption > img {
    position: absolute;
    inset: 0;
    /*   reflect hero image for a nice effect!   */
    transform: scaleY(-1);
  }

figcaption > section {
    z-index: 1;
    padding-inline: 2ch;
    padding-block: 2ch 2.5ch;
    color: var(--on-glass-primary);
    display: grid;
    gap: 1ch;
  }

@media (prefers-color-scheme: dark) {

figcaption > section {
      text-shadow: 0 1px 0 hsl(0 0% 0% / 20%)
  }
    }

figcaption h3 {
    font-size: clamp(1.25rem, calc(1rem + 2vw), 2.5rem);
  }

figcaption date {
    color: var(--on-glass-secondary);
  }

* {
  box-sizing: border-box;
  margin: 0;
}
	.dropdown {
  position: relative;
  width: 200px;
  filter: url(#goo);
}
.dropdown__face {
  padding: 15px;
  border-radius: 25px;
}
.dropdown__face {
  display: block;
  position: relative;
}
.dropdown__items {
  background-color:#0c010d;
  padding: 15px;
  border-radius: 25px;
  margin: 0;
  position: absolute;
  right: 0;
  top: 50%;
  width: 100%;
  list-style: none;
  list-style-type: none;
  display: flex;
  justify-content: space-between;
  visibility: hidden;
  z-index: -1;
  opacity: 0;
  transition: all 0.4s cubic-bezier(0.93, 0.88, 0.1, 0.8);
}

.dropdown__text {
	color: blac;
}
.dropdown__arrow {
  border-bottom: 2px solid #000;
  border-right: 2px solid #000;
  position: absolute;
  top: 50%;
  right: 30px;
  width: 7px;
  height: 7px;
  transform: rotate(45deg) translateY(-50%);
  transform-origin: right;
}
.dropdown input {
  display: none;
}
.dropdown input:checked ~ .dropdown__items {
  top: calc(100% + 10px);
  visibility: visible;
  opacity: 1;
}



* {
  box-sizing: border-box;
}

svg {
  display: none;
}
.responsive-table li {
  border-radius: 3px;
  padding: 25px 30px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 25px;
}
.responsive-table .table-header {
  background-color: #95A5A6;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}
.responsive-table .table-row {
  background-color: #ffffff;
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}
.responsive-table .col-1 {
  flex-basis: 10%;
}
.responsive-table .col-2 {
  flex-basis: 40%;
}
.responsive-table .col-3 {
  flex-basis: 25%;
}
.responsive-table .col-4 {
  flex-basis: 25%;
}
@media all and (max-width: 767px) {
  .responsive-table .table-header {
    display: none;
  }
  .responsive-table li {
    display: block;
  }
  .responsive-table .col {
    flex-basis: 100%;
  }
  .responsive-table .col {
    display: flex;
    padding: 10px 0;
  }
  .responsive-table .col:before {
    color: #6C7A89;
    padding-right: 10px;
    content: attr(data-label);
    flex-basis: 50%;
    text-align: right;
  }
}
	</style>

<script>
  // Fungsi untuk mengambil data secara real-time
// Fungsi untuk mengambil data secara real-time
function loadDataHariIni() {
    fetch('get_data.php')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.querySelector("#tamu tbody");
            tableBody.innerHTML = ""; // Kosongkan tabel terlebih dahulu

            data.forEach((row, index) => {
                let newRow = document.createElement("tr");
                
                newRow.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${row.haritgl}</td>
                    <td>${row.namatamu}</td>
                    <td>${row.nohp}</td>
                    <td>${row.instansi}</td>
                    <td>${row.keperluan}</td>
                    <td>${row.namatemu}</td>
                    <td>${row.waktu}</td>
                    <td>${row.validasi}</td>
                    <td><a href="?pages=tamuuserini&act=bisa&id=${row.idtamu}" role="button" onclick="return confirm('Anda yakin bisa menemui tamu?')">Bisa</a></td>
							<td><a href="?pages=tamuuserini&act=tidakbisa&id=${row.idtamu}" role="button" onclick="return confirm('Anda yakin tidak bisa menemui tamu?')">TidakBisa</a></td>
                `;
                tableBody.appendChild(newRow);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}
function loadDataHariIniadmin() {
    fetch('tamuiniall.php')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.querySelector("#tamuall tbody");
            tableBody.innerHTML = ""; // Kosongkan tabel terlebih dahulu

            data.forEach((row, index) => {
                let newRow = document.createElement("tr");
                
                newRow.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${row.haritgl}</td>
                    <td>${row.namatamu}</td>
                    <td>${row.nohp}</td>
                    <td>${row.instansi}</td>
                    <td>${row.keperluan}</td>
                    <td>${row.namatemu}</td>
                    <td>${row.waktu}</td>
                    <td>${row.validasi}</td>
                    <td><a href="?pages=tamuuseriniadmin&act=hapus&id=${row.idtamu}" role="button" onclick="return confirm('Anda yakin data tamu akan dihapus?')">Hapus</a></td>
                `;
                tableBody.appendChild(newRow);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}

// Fungsi untuk memuat data mendatang dari datatamudepan.php
function loadDataKedepan() {
    fetch('datatamudepan.php')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.querySelector("#tamudepan tbody");
            tableBody.innerHTML = ""; // Kosongkan tabel terlebih dahulu

            data.forEach((row, index) => {
                let newRow = document.createElement("tr");
                
                newRow.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${row.haritgl}</td>
                    <td>${row.namatamu}</td>
                    <td>${row.nohp}</td>
                    <td>${row.instansi}</td>
                    <td>${row.keperluan}</td>
                    <td>${row.namatemu}</td>
                    <td>${row.waktu}</td>
                    <td>${row.validasi}</td>
                    <td><a href="?pages=tamuuserkedepannya&act=bisa&id=${row.idtamu}" role="button" onclick="return confirm('Anda yakin bisa menemui tamu?')">Bisa</a></td>
							<td><a href="?pages=tamuuserkedepannya&act=tidakbisa&id=${row.idtamu}" role="button" onclick="return confirm('Anda yakin tidak bisa menemui tamu?')">TidakBisa</a></td>
                `;
                tableBody.appendChild(newRow);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}
function loadDataKedepanadmin() {
    fetch('datatamudepanall.php')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.querySelector("#tamudepanall tbody");
            tableBody.innerHTML = ""; // Kosongkan tabel terlebih dahulu

            data.forEach((row, index) => {
                let newRow = document.createElement("tr");
                
                newRow.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${row.haritgl}</td>
                    <td>${row.namatamu}</td>
                    <td>${row.nohp}</td>
                    <td>${row.instansi}</td>
                    <td>${row.keperluan}</td>
                    <td>${row.namatemu}</td>
                    <td>${row.waktu}</td>
                    <td>${row.validasi}</td>
                    <td><a href="?pages=tamuuserkedepannyaadmin&act=hapus&id=${row.idtamu}" role="button" onclick="return confirm('Anda yakin data tamu akan dihapus?')">Hapus</a></td>
                `;
                tableBody.appendChild(newRow);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}

// Panggil kedua fungsi untuk memuat data ke tabel masing-masing
loadDataHariIniadmin();
loadDataHariIni();
loadDataKedepan();
loadDataKedepanadmin();
// Panggil fungsi loadData setiap 5 detik (5000 ms)

loadData(); // Panggil loadData pertama kali saat halaman dimuat

// Fungsi untuk filter data di tabel
function filterSearchTamuadmindepan() {
    var input, filter, table, rows, td, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tamudepanall");
    rows = table.getElementsByTagName("tr");

    for (i = 1; i < rows.length; i++) {
        rows[i].style.display = "none";
        td = rows[i].getElementsByTagName("td");

        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                    break;
                }
            }
        }
    }
}
function filterSearchTamuadminin() {
    var input, filter, table, rows, td, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tamudepanall");
    rows = table.getElementsByTagName("tr");

    for (i = 1; i < rows.length; i++) {
        rows[i].style.display = "none";
        td = rows[i].getElementsByTagName("td");

        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                    break;
                }
            }
        }
    }
}
function filterSearchMyTable() {
    var input, filter, table, rows, td, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    rows = table.getElementsByTagName("tr");

    for (i = 1; i < rows.length; i++) {
        rows[i].style.display = "none";
        td = rows[i].getElementsByTagName("td");

        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                    break;
                }
            }
        }
    }
}
function filterSearchTamu() {
    var input, filter, table, rows, td, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tamu");
    rows = table.getElementsByTagName("tr");

    for (i = 1; i < rows.length; i++) {
        rows[i].style.display = "none";
        td = rows[i].getElementsByTagName("td");

        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                    break;
                }
            }
        }
    }
  }
  function filterSearchTamuDepan() {
    var input, filter, table, rows, td, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tamudepan");
    rows = table.getElementsByTagName("tr");

    for (i = 1; i < rows.length; i++) {
        rows[i].style.display = "none";
        td = rows[i].getElementsByTagName("td");

        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                    break;
                }
            }
        }
    }
  }
  function filterSearchJadwal() {
    var input, filter, table, figures, figcaption, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    figures = table.getElementsByTagName("figure"); // Ambil semua elemen figure

    for (i = 0; i < figures.length; i++) {
        figcaption = figures[i].getElementsByTagName("figcaption")[0];
        
        if (figcaption) {
            txtValue = figcaption.textContent || figcaption.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                figures[i].style.display = ""; // Tampilkan figure jika cocok
            } else {
                figures[i].style.display = "none"; // Sembunyikan jika tidak cocok
            }
        }
    }
}
// Event listener for the dropdown to update chart
document.getElementById("tanggalDropdown").addEventListener("change", function() {
    const selectedDate = this.value;
    if (selectedDate) {
        // AJAX request to get data for the selected date
        fetch(`datastatistik.php?haritgl=${selectedDate}`)
            .then(response => response.json())
            .then(data => {
                // Update chart with new data
                updateChart(data.instansi, data.jumlah);
            })
            .catch(error => console.error('Error fetching data:', error));
    }
});

// Initialize the chart
const ctx = document.getElementById('myChart').getContext('2d');
let myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [],
        datasets: [{
            backgroundColor: ["#b91d47", "#00aba9", "#2b5797", "#e8c3b9", "#1e7145"],
            data: []
        }]
    },
    options: {
        title: {
            display: true,
            text: "Jumlah Pengunjung per Instansi"
        }
    }
});

// Function to update chart with new data
function updateChart(labels, data) {
    myChart.data.labels = labels;
    myChart.data.datasets[0].data = data;
    myChart.update();
}

</script>
	</head>
	<body>
				
<div class="page" >
    <nav id="colorlib-main-nav" role="navigation">
      <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active" ><i></i></a>
      <div class="js-fullheight colorlib-table">
        <div class="img" style="background-image: url(images/bg_3.jpg);"></div>
        <div class="colorlib-table-cell js-fullheight">
          <div class="row no-gutters">
            <div class="col-md-12 text-center">
              <h1 class="mb-4"><a class="logo">Pick</a></h1>
              <ul>
              <?php
	    if($_SESSION['status']=='admin'){
	    ?>
                <li class="active"><a href="?pages=home"><span>Home</span></a></li>
				 <li class="active"><a href="?pages=historyall"><span>History</span></a></li>
				  <li class="active"><a href="?pages=jadwalsiswa"><span>Jadwal siswa</span></a></li>
          <li class="active"><a href="?pages=jadwalguru"><span>Jadwal guru</span></a></li>
          <?php
	  }else if($_SESSION['status']=='karyawan'){
	    ?>
                <li class="active"><a href="?pages=home"><span>Home</span></a></li>
				 <li class="active"><a href="?pages=historyuser"><span>History</span></a></li>
          <?php
	  }else{
	  ?>
    <li class="active"><a href="?pages=home"><span>Home</span></a></li>
				 <li class="active"><a href="?pages=historyuser"><span>History</span></a></li>
				  <li class="active"><a href="?pages=jadwaluser"><span>Jadwal</span></a></li>
   <?php } ?>

   
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <div id="colorlib-page">
      <header>
      	<div class="container">
	        <div class="colorlib-navbar-brand">
			<div class="dropdown">
  <input type="checkbox" id="dropdown">

  <label class="dropdown__face" for="dropdown">
    <div class="dropdown__text" style="font-size:20px;" ><?php echo $_SESSION['username']; ?></div>

    <div class="dropdown__arrow"></div>
  </label>

  <ul class="dropdown__items">
    <li><a class="button"  href="./database/logout.php">Log out</a></li>

  </ul>
</div>

	        </div>
	        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        </div>
      </header>
      <?php
				$pages=$_GET['pages'];
				$act=$_GET['act'];
				
				//--PAGE USER--

        if ($pages=="tamuuserkedepannya") {
					if ($act==""){
						include "pages/tamuuserkedepannya/index.php";
          }if ($act=="bisa"){
						include "pages/tamuuserkedepannya/bisa.php";
					}if ($act=="tidakbisa"){
						include "pages/tamuuserkedepannya/tidakbisa.php";
					}
				}
        if ($pages=="tamuuserini") {
					if ($act==""){
						include "pages/tamuuserini/index.php";
          }if ($act=="bisa"){
						include "pages/tamuuserini/bisa.php";
					}if ($act=="tidakbisa"){
						include "pages/tamuuserini/tidakbisa.php";
					}
				}
        if ($pages=="tamuuserkedepannyaadmin") {
					if ($act==""){
						include "pages/tamuuserkedepannyaadmin/index.php";
          }if ($act=="hapus"){
						include "pages/tamuuserkedepannyaadmin/hapus.php";
					}
				}
        if ($pages=="tamuuseriniadmin") {
					if ($act==""){
						include "pages/tamuuseriniadmin/index.php";
          }if ($act=="hapus"){
						include "pages/tamuuseriniadmin/hapus.php";
					}
				}
        if ($pages=="home") {
					if ($act==""){
						include "pages/home/index.php";
					}if ($act=="bisa"){
						include "pages/home/bisa.php";
					}if ($act=="tidakbisa"){
						include "pages/home/tidakbisa.php";
					}
				}
				if ($pages=="historyall") {
					if ($act==""){
						include "pages/historyall/index.php";
					}
				}
        if ($pages=="historyuser") {
					if ($act==""){
						include "pages/historyuser/index.php";
					}
				}
        if ($pages=="jadwalsiswa") {
					if ($act==""){
						include "pages/jadwalsiswa/index.php";
					}
				}
        if ($pages=="jadwalguru") {
					if ($act==""){
						include "pages/jadwalguru/index.php";
					}
				}
        if ($pages=="jadwaluser") {
					if ($act==""){
						include "pages/jadwaluser/index.php";
					}
				}
				
				?>

    </div>
  </div>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
<?php
	}else{
		header("location:index.php");
	}
?>
