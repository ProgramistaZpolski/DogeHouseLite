<?php /* Compiled from a Blade Template on 29-03-2021 14:43:52 */ ?>
<?php require_once 'partials/head.php'; ?>

<header class="text-center">
	<img src="<?= htmlspecialchars(asset("dogehouse_logo.svg")) ?>" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>
	<br><br><p>Optimized for GPRS & Orange Neostrada connections.</p>
	<br><nav>
		<a href="home"><button data-current>Popular Rooms</button></a>
		<a href="scheduled"><button>Scheduled Rooms</button></a>
		<a href="stats"><button>Statistics</button></a>
		<a href="bots"><button>Bots (Very Slow)</button></a>
	</nav>
</header>

<?php foreach ($data->rooms as $value) : ?>
	<a href="http://dogehouse.tv/room/<?= htmlspecialchars($value->id) ?>">
		<div class="card">
			<div class="card-header">
				Created on: <?= htmlspecialchars($value->inserted_at) ?> | <?= htmlspecialchars($value->isPrivate ? "Private" : "Public") ?>
			</div>
			<div class="card-body">
				<p class="h3"><?= htmlspecialchars($value->name) ?></p>
				<pre><?= htmlspecialchars($value->description) ?></pre>
				<b><?= htmlspecialchars($value->numPeopleInside) ?> people</b>
			</div>
		</div>
	</a>
<?php endforeach; ?>

<?php require_once 'partials/footer.php'; ?>