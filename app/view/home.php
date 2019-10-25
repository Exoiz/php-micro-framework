<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1>Home Page</h1>
	<?=pr($data)?>
	<ul>
	<?php foreach ($data['pages'] as $value) { ?>
		<li><a href="/index.php/<?=$value?>"><?=$value?></a></li>
	<?php } ?>
	</ul>
</body>
</html>
