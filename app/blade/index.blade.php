@extends('head')

<img src="{{ asset("dogehouse_logo.svg") }}" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>

@foreach ($data->rooms as $value)
	<div class="card p3 m5">
		<div class="card-header">
			stuff
		</div>
		<div class="card-body">
			<p class="h3">{{ $value->name }}</p>
			<p>{{ $value->description }}</p>
		</div>
	</div>
	@dump($value)
@endforeach

@extends('footer')