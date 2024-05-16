@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    {{ $user->name }}
@endsection