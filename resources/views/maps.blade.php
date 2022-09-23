@extends('layouts.app')

@section('main')
    <section class="px-4 pt-12">
@if ($region == 'nord')
@include('maps.nord')
@include('maps.script')
@elseif ($region == 'sud')
@include('maps.sud')
@include('maps.script')
@elseif ($region == 'est')
@include('maps.est')
@include('maps.script')
@elseif ($region == 'ouest')
@include('maps.ouest')
@include('maps.script')
@elseif($region == 'around')
@include('maps.around')
@endif    
    </section>


@endsection
