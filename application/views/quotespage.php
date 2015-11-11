
<?= $this->load->view('templates/header.php');?>


	<div id= "head" class = "row">
		<h3 class = "col s12 m8 l10">Welcome, <?= $uzah['alias'] ?></h3>
		<a "col s12 m8 l10" href="/quotes/logout"><i class="small material-icons">exit_to_app</i>
            Logout</a>
	</div>	

	<div class = "row">
		<div id = "longbox" class = "col s12 m6 l6">
			<h4>Quotable Quotes</h4>
			<?php 
					foreach ($quos as $quo) { 
						?>
						<div id = "quotebox">
							<p class = "bigger"><b><?= $quo['quote_by'] ?></b>: "<?= $quo['quote'] ?>"</p>
							<span id = "tiny">Posted by <?= $quo['posted_by']?></span>
							<button><a href="/quotes/addto/<?= $quo['id'] ?>">Add to My List</a></button>
						</div>
			<?php  	} ?>
		</div>
	
		<div id = "favebox" class = "col s12 m6 l6">
			<h4>Your Favorites</h4>
			<?php 
					foreach ($faves as $fave) { 
						// var_dump($fave); ?>
						<div id = "qavebox">
							<p class = "bigger"><b><?= $fave['quote_by'] ?></b>: "<?= $fave['quote'] ?>"</p>
							<span id = "tiny">Posted by <?= $fave['posted_by']?></span>
							<button><a href="/quotes/remove/<?= $fave['quote_id']?>">Remove From My List</a></button>
						</div>
			<?php  	} ?>
		</div>
	</div>


	<div class="divider"></div>
	<div class = "container right-align contribute">
		<h3>Contribute a Quote:</h3>
		<h5 class = "red-text text-darken-2"><?=  $this->session->flashdata("error")?></h5>
		<form action = "/quotes/contribute" method = "post" class = "col s12">

			<h4>Quoted By: <input type = "text" name = "quoteby"></h4>
			<h4>Message: <textarea name = "message"></textarea></h4>
			<input class = "waves-effect waves-blue btn-large" type = "submit" value = "Submit Quote">
		</form>
	</div>



<?= $this->load->view('templates/footer.php');?>

