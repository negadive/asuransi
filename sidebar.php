<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar"> 
	<button class="w3-bar-item w3-button w3-xlarge"
	onclick="w3_close()">Close &times;</button>

	<button onclick="myFunction('Demo1')" class="w3-button w3-block w3-text-blue-grey w3-left-align w3-large js-arrow"><i class=" fas fa-copy"></i>
	Master</button>
	<div id="Demo1" class="w3-hide w3-animate-zoom"> 
		<a class="w3-button w3-block w3-text-indigo w3-left-align w3-medium" href="home_nasabah.php">Data Nasabah</a>
	</div>

	<button onclick="myFunction('Demo2')" class="w3-button w3-block w3-text-blue-grey w3-left-align w3-large js-arrow"><i class="fas fa-clock"></i> 
	Transaksi</button>
	<div id="Demo2" class="w3-hide w3-animate-zoom">
		<a class="w3-button w3-block w3-text-indigo w3-left-align js-arrow" href="home_penjualan_polis.php">Polis</a>
	</div>

	<button onclick="myFunction('Demo3')" class="w3-button w3-block w3-text-blue-grey w3-left-align w3-large js-arrow"><i class = "fas fa-table"></i> 
	Laporan</button>
	<div id="Demo3" class="w3-hide w3-animate-zoom">
		<a href="lap_nasabah.php" class="w3-button w3-block w3-text-indigo w3-left-align js-arrow">Laporan Nasabah</a>
		<a href="lap_penjualan.php" class="w3-button w3-block w3-text-indigo w3-left-align js-arrow">Laporan Penjualan</a>
		<a href="lap_pembayaran.php" class="w3-button w3-block w3-text-indigo w3-left-align js-arrow">Laporan Pembayaran</a>
		<a href="lap_klaim.php" class="w3-button w3-block w3-text-indigo w3-left-align js-arrow">Laporan Klaim</a>
	</div>

	<button onclick="myFunction('Demo4')" class="w3-button w3-block w3-text-blue-grey w3-left-align w3-large js-arrow"><i class = "fas fa-user"></i> 
	Akun</button>
	<div id="Demo4" class="w3-hide w3-animate-zoom">
		<a href="logout.php" class="w3-button w3-block w3-text-indigo w3-left-align js-arrow">Logout</a>
	</div>
</div>