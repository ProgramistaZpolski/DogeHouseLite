<?php /* Compiled from a Blade Template on 29-03-2021 14:33:04 */ ?>
<?php require_once 'partials/head.php'; ?>

<header class="text-center">
	<img src="<?= htmlspecialchars(asset("dogehouse_logo.svg")) ?>" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>
	<br><br><p>Optimized for GPRS & Orange Neostrada connections.</p>
	<br><nav>
		<a href="home"><button>Popular Rooms</button></a>
		<a href="scheduled"><button>Scheduled Rooms</button></a>
		<a href="stats"><button data-current>Statistics</button></a>
		<a href="bots"><button>Bots (Very Slow)</button></a>
	</nav>
</header>

<div class="card">
	<div class="card-body">
		<p class="h3">Total Rooms: <?= htmlspecialchars($data->totalRooms) ?></p>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<p class="h3">Total Scheduled Rooms: <?= htmlspecialchars($data->totalScheduledRooms) ?></p>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<p class="h3">Total Online: <?= htmlspecialchars($data->totalOnline) ?></p>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<p class="h3">Total Bots Online: <?= htmlspecialchars($data->totalBotsOnline) ?></p>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<p class="h3">Total Bots Sending Telemetry: <?= htmlspecialchars($data->totalBotsSendingTelemetry) ?></p>
	</div>
</div>

<?php require_once 'partials/footer.php'; ?>