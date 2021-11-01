@extends('layouts/layouts')

@section('title')
    Редактировать задание "{{ $task->title }}"
@endsection

@section('main-content-header')
    Редактировать задание "{{ $task->title }}"
@endsection

@section('breadcrumbs')
    <ul class="breadcrumbs">
        <li><a href="{{ route('home') }}">На главную</a></li>
        <li>/</li>
        <li><a href="" class="active">Редактирование задания</a></li>
    </ul>
@endsection

@section('main-content')
    <div class="edit_task_block">
        @include('task/form')
    </div>
@endsection
