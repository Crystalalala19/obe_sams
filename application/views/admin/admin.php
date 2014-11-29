<div id="container">
	<h1>Admin Page</h1>
		<?php
			echo "<pre>";
			print_r($this->session->all_userdata());
			echo "</pre>";
		?>

		<a href="<?php echo base_url()."site/logout" ?>">Logout</a>
</div>
