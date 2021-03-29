<?php /* Compiled from a Blade Template on 29-03-2021 12:53:08 */ ?>
<?php require_once 'partials/head.php'; ?>

<header class="text-center">
	<img src="<?= htmlspecialchars(asset("dogehouse_logo.svg")) ?>" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>
	<br><br><p>Optimized for GPRS & Orange Neostrada connections.</p>
</header>

<?php foreach ($data->rooms as $value) : ?>
	<div class="card p3 m5">
		<div class="card-header">
			stuff
		</div>
		<div class="card-body">
			<p class="h3"><?= htmlspecialchars($value->name) ?></p>
			<p><?= htmlspecialchars($value->description) ?></p>
		</div>
	</div>
	<?php dump($value) ?>
<?php endforeach; ?>

<?php require_once 'partials/footer.php'; ?>