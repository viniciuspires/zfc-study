<?php
$dir = scandir('./');

$itens = array();
foreach( $dir as $d ) {
	if ( strpos($d, '.php') !== false && $d != 'index.php' ) {
		array_push($itens, $d);
	}
}

?>

<h1>Choose your destiny:</h1>

<ul>
<?php foreach($itens as $item): ?>
	<li>
		<a href="<?= $item; ?>"><?= $item; ?></a>
	</li>
<?php endforeach; ?>
</ul>