@extends('layouts.app')

@section('content')
    <div class="container pb-3">
        @if (isset($Examen))
        <miexamen-component _id="{{$Examen->_id}}"></miexamen-component>
        @else
        <estmateria-component></estmateria-component>
        @endif
    </div>
@endsection
