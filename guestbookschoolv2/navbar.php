
<nav class="navbar navbar-expand-lg nav-orange">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'home' ? 'active' : '' ?>" href="index.php">HOME</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'bukutamu' ? 'active' : '' ?>" href="bukutamu.php">BUKUTAMU</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'list_bukutamu' ? 'active' : '' ?>" href="list_bukutamu.php">LIST TAMU</a>
		</div>
	</div>
</nav>