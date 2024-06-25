<div class="login-box-body">
	<div class="login-title-box">
		<a>
			<img src="<?= base_url(); ?>assets/themes/img/logo.png" alt="Logo" class="img-responsive">
		</a>
		<div class="title-login">
			<h1>KLINIK UMKM KOTA BAUBAU</h1>
		</div>
		<hr />
	</div>

	<div class="login-form">
		<div id="responseDiv" class="alert alert-dismissible text-center" role="alert" style="display:none;">
			<span id="message"></span>
		</div>

		<form id="logForm">
			<fieldset>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" id="username" name="username" placeholder="Masukan Nama Pengguna">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" id="password" name="password" placeholder="Masukan Kata Sandi">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<button id="submit" type="submit" class="btn btn-primary btn-block btn-flat"><span id="logText"></span></button>
					</div>
				</div>
			</fieldset>
		</form>
		<hr />
		<div class="footer-login-form">&copy; 2022 GULAMANISTA - <a href="https://diskominfo.baubaukota.go.id" target="_blank">Dinas Komunikasi dan Informatika Kota Baubau</a></div>
	</div>
</div>