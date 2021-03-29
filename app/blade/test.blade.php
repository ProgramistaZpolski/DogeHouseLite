@php
$kukanq = "kukanq to kasztan";
$math = mt_rand(0, 50);
@endphp

@extends('head')

@if ($math > 25)

<h1>{{ $kukanq }}</h1>

@endif

@foreach ($kukank as $kasztan)
{{ $kasztan }}
@endforeach

<script>
	let app = @json($array);
</script>

@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif

@unless (false)
    You are not signed in.
@endunless

@isset($records)
    // $records is defined and is not null...
@endisset

@empty($records)
    // $records is "empty"...
@endempty

@production
    // Production specific content...
@endproduction

@for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@while (true)
    <p>I'm looping forever.</p>
@endwhile

@foreach ($users as $user)
    @if ($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if ($user->number == 5)
        @break
    @endif
@endforeach

{{-- This comment will not be present in the rendered HTML --}}
{{-- This comment will not be present in the rendered PHP --}}

{!! $xss !!}

<form method="POST" action="submit">
	@csrf
	@method("PUT")
	<button type="submit">Say hello</button>
</form>

@extends('footer')

@dump($myvariable2)

@dd($myvariable)
