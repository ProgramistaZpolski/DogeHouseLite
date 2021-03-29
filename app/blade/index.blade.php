@extends('head')

<img src="{{ asset("dogehouse_logo.svg") }}" alt="DogeHouse logo" loading="lazy" decoding="async" width="336" height="80"><span>Lite</span>

@foreach ($data->rooms as $value)
	@dump($value);
@endforeach

@extends('footer')