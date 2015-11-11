<?= $this->load->view('templates/header.php');?>


	<div class = "container">
		<h3>Welcome</h3>

		<h5 class = "red-text text-darken-2"><?=  $this->session->flashdata("errors")?></h5>
		<h5 class = "green-text text-lighten-1"><?=  $this->session->flashdata("success")?></h5>


		<div class = "container">
			<form action = "/qusers/login" method = "post">
				<p class = "bigger">Email: <input type = "text" name = "email"></p>
				<p class = "bigger">Password: <input type = "password" name = "password"></p>
				<input type = "submit" value = "Log me in!">
			</form>
		</div>
		<br>
		<div class="divider"></div>
	
		<h3>Register</h3>
		<div class = "container">
	
			<form action = "/qusers/register" method = "post">
				<p class = "bigger">First Name: <input type = "text" name = "first"></p>
				<p class = "bigger">Alias: <input type = "text" name = "alias"></p>
				<p class = "bigger">Email: <input type = "text" name = "email"></p>
				<p class = "bigger">Password: <input type = "password" name = "password"></p>
				<p class = "bigger">Confirm Password: <input type = "password" name = "confirm"></p>
				<p class = "bigger">Birthday: <input type = "date" name = "birthday"></p>
				<input type = "submit" value = "Register!">
			</form>
		</div>
		<br>
	</div>



<?= $this->load->view('templates/footer.php');?>
