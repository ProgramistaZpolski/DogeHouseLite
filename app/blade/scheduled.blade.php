@extends('head')

<header class="text-center">
	<img src="{{ asset("dogehouse_logo.svg") }}" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>
	<br><br><p>Optimized for GPRS & Orange Neostrada connections.</p>
	<br><nav>
		<a href="home"><button>Popular Rooms</button></a>
		<a href="scheduled"><button data-current>Scheduled Rooms</button></a>
		<a href="stats"><button>Statistics</button></a>
		<a href="bots"><button>Bots (Very Slow)</button></a>
	</nav>
</header>

@foreach ($data->scheduledRooms as $value)
	<a href="http://dogehouse.tv/{{ $value->id }}">
		<div class="card">
			<div class="card-header">
				Created by: {{ $value->creator->displayName }}
			</div>
			<div class="card-body">
				<p class="h3">{{ $value->name }}</p>
				<pre>{{ $value->description }}</pre>
			</div>
		</div>
	</a>
@endforeach

@extends('footer')