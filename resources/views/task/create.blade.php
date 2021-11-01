@extends('layouts/layouts')

@section('title')
    Добавть задание
@endsection

@section('main-content-header')
    Добавить задание
@endsection

@section('breadcrumbs')
    <ul class="breadcrumbs">
        <li><a href="{{ route('home') }}">На главную</a></li>
        <li>/</li>
        <li><a href="" class="active">Добавление задания</a></li>
    </ul>
@endsection

@section('main-content')
    <div class="edit_task_block">
        @include('task/form')
    </div>
@endsection
