<?php echo $script_captcha; ?>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-48">
						<img src="<?php echo base_url('foto/logobsg.png') ?>" height="100">
					</span>
					<span class="login100-form-title p-b-26">
						E-SURAT LOGIN
					</span>
					<small>
						<?php echo $this->session->flashdata('msg'); ?>
					</small>
					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-assignment-account"></i>
						</span>
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" name="btnlogin">Masuk</button>
						</div>
						<p class="mt-2">Lupa Password? Hubungi admin!</p>
					</div>
				</form>