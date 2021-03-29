<?php /* Compiled from a Blade Template on 29-03-2021 14:33:00 */ ?>
<?php require_once 'partials/head.php'; ?>

<header class="text-center">
	<img src="<?= htmlspecialchars(asset("dogehouse_logo.svg")) ?>" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>
	<br><br><p>Optimized for GPRS & Orange Neostrada connections.</p>
	<br><nav>
		<a href="home"><button>Popular Rooms</button></a>
		<a href="scheduled"><button>Scheduled Rooms</button></a>
		<a href="stats"><button>Statistics</button></a>
		<a href="bots"><button data-current>Bots (Very Slow)</button></a>
	</nav>
</header>

<?php foreach ($data as $value) : ?>
	<div class="card">
		<div class="card-header">
			In room: <?= htmlspecialchars($value->room->name) ?>
		</div>
		<div class="card-body">
			<img src="<?= htmlspecialchars($value->bot->avatar) ?>" alt="Avatar" loading="lazy" decoding="async">
			<p class="h3"><?= htmlspecialchars($value->bot->username) ?></p>
			<pre>UUID: <?= htmlspecialchars($value->bot->uuid) ?></pre>
		</div>
	</div>
<?php endforeach; ?>

<?php require_once 'partials/footer.php'; ?>