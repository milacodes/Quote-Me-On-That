<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quotes Page</title>

	<style type="text/css">
	#head{
		margin-bottom: 25px;
	}
	#quotebox{
		width: 200px;
		border: 2px solid green;
		margin-bottom: 5px;
	}
	#qavebox{
		width: 200px;
		border: 2px solid darkorchid;
		margin-bottom: 5px;
	}
	#longbox{
		overflow: scroll;
		outline: 2px solid black;
		padding: 2px;
		margin-right: 3px;
		width: 215px;
		height: 610px;
	}
	#favebox{
		vertical-align: top;
		overflow: scroll;
		outline: 2px solid black;
		padding: 2px;
		width: 215px;
		height: 610px;
	}
	#tiny{
		font-size: 12px;
	}
	.inline{
		display: inline-block;
	}
	</style>
</head>
<body>

	<div id= "head">
		<h2>Welcome, <?= $uzah['alias'] ?></h2>
		<a href="/quotes/logout">Logout</a>
	</div>	

	<div id = "longbox" class = "inline">
		<h4>Quotable Quotes</h4>
		<?php 
				foreach ($quos as $quo) { 
					?>
					<div id = "quotebox">
						<p><?= $quo['quote_by'] ?>: <?= $quo['quote'] ?></p>
						<span id = "tiny">Posted by <?= $quo['posted_by']?></span>
						<button><a href="/quotes/addto/<?= $quo['id'] ?>">Add to My List</a></button>
					</div>
		<?php  	} ?>
	</div>

	<div id = "favebox" class = "inline">
		<h4>Your Favorites</h4>
		<?php 
				foreach ($faves as $fave) { 
					// var_dump($fave); ?>
					<div id = "qavebox">
						<p><?= $fave['quote_by'] ?>: <?= $fave['quote'] ?></p>
						<span id = "tiny">Posted by <?= $fave['posted_by']?></span>
						<button><a href="/quotes/remove/<?= $fave['quote_id']?>">Remove From My List</a></button>
					</div>
		<?php  	} ?>
	</div>

	<p>Contribute a Quote:</p>
	<?=  $this->session->flashdata("error")?>
	<form action = "/quotes/contribute" method = "post">
		<p>Quoted By: <input type = "text" name = "quoteby"></p>
		<p>Message: <textarea name = "message"></textarea></p>
		<input type = "submit" value = "Submit Quote">
	</form>
</body>
</html>