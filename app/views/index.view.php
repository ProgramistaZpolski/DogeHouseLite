<?php /* Compiled from a Blade Template on 29-03-2021 11:14:46 */ ?>
<?php require_once 'partials/head.php'; ?>

<img src="<?= htmlspecialchars(asset("dogehouse_logo.svg")) ?>" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>

<?php foreach ($data->rooms as $value) : ?>
	<?php dump($value) ?>;
<?php endforeach; ?>

<?php require_once 'partials/footer.php'; ?>