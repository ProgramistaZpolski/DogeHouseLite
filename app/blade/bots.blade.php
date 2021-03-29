@extends('head')

<header class="text-center">
	<img src="{{ asset("dogehouse_logo.svg") }}" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>
	<br><br><p>Optimized for GPRS & Orange Neostrada connections.</p>
	<br><nav>
		<a href="home"><button>Popular Rooms</button></a>
		<a href="scheduled"><button>Scheduled Rooms</button></a>
		<a href="stats"><button>Statistics</button></a>
		<a href="bots"><button data-current>Bots (Very Slow)</button></a>
	</nav>
</header>

@foreach ($data as $value)
	<div class="card">
		<div class="card-header">
			In room: {{ $value->room->name }}
		</div>
		<div class="card-body">
			<img src="{{ $value->bot->avatar }}" alt="Avatar" loading="lazy" decoding="async">
			<p class="h3">{{ $value->bot->username }}</p>
			<pre>UUID: {{ $value->bot->uuid }}</pre>
		</div>
	</div>
@endforeach

@extends('footer')