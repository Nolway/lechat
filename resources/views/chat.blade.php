@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <room-component></room-component>
        <chat-component></chat-component>
        <user-component></user-component>
    </div>
</div>
@endsection
