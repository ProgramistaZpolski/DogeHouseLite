<?php /* Compiled from a Blade Template on 29-03-2021 14:33:01 */ ?>
<?php require_once 'partials/head.php'; ?>

<header class="text-center">
	<img src="<?= htmlspecialchars(asset("dogehouse_logo.svg")) ?>" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>
	<br><br><p>Optimized for GPRS & Orange Neostrada connections.</p>
	<br><nav>
		<a href="home"><button>Popular Rooms</button></a>
		<a href="scheduled"><button data-current>Scheduled Rooms</button></a>
		<a href="stats"><button>Statistics</button></a>
		<a href="bots"><button>Bots (Very Slow)</button></a>
	</nav>
</header>

<?php foreach ($data->scheduledRooms as $value) : ?>
	<a href="http://dogehouse.tv/<?= htmlspecialchars($value->id) ?>">
		<div class="card">
			<div class="card-header">
				Created by: <?= htmlspecialchars($value->creator->displayName) ?>
			</div>
			<div class="card-body">
				<p class="h3"><?= htmlspecialchars($value->name) ?></p>
				<pre><?= htmlspecialchars($value->description) ?></pre>
			</div>
		</div>
	</a>
<?php endforeach; ?>

<?php require_once 'partials/footer.php'; ?>