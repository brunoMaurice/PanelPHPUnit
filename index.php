<?php
	include 'config.php';
?>

<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <title>Panel Phpunit</title>

	    <link rel="stylesheet" href="public/css/base.css" type="text/css" media="all">
	</head>

	<body>
		<select name="project" class="project">
		<?php 
			foreach ($projectList as $key => $value) 
				print '<option value="'.$key.'">'.$key.'</option>';
		?>
		</select>
		<button class="gen" rel="phpunit">Generer Phpunit</button>
		<button class="gen" rel="phpunit-coverage">Generer Phpunit with Coverage</button>
		<div class="progress-bar blue stripes clear">
		    <span class="progress" style="width: 0%;"></span>
		</div>
		<pre id="phpunit">

		</pre>

		<script src="public/js/jquery.js"></script>
		<script src="public/js/base.js"></script>
	</body>

</html>