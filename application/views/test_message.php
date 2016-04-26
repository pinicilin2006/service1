<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>
<body>

<div id="container">
	<h1>Тестовая страница</h1>
	<pre>
		<?php print_r($table)?>
	</pre>
<!-- 	<?php foreach($table as $t): ?>
		<p><?= $t['name'] ?></p>
	<?php endforeach;?> -->
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>