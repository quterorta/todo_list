@extends('layouts/layouts')

@section('title')
    Просмотр задания "{{ $task->title }}"
@endsection

@section('main-content-header')
    Просмотр задания "{{ $task->title }}"
@endsection

@section('breadcrumbs')
    <ul class="breadcrumbs">
        <li><a href="{{ route('home') }}">На главную</a></li>
        <li>/</li>
        <li><a href="" class="active">Просмотр задания</a></li>
    </ul>
@endsection

@section('main-content')
    <div class="show_task_block">
        <div class="show_task_block__content">
            <p class="show_task_block__content__title">{{ $task->title }}</p>
            <p class="show_task_block__content__description">{{ $task->description }}</p>
            <div class="show_task_block__content__controll">
                <a href="{{ route('task.edit', $task->id) }}" title='Редактировать задание "{{ $task->title}}"' class="table__task_control__edit_btn">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                @if($task->completed == 1)
                <form action="{{ route('uncomplete-task', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="uncomplete-btn" title='Отменить выполнение задания "{{ $task->title}}"'>
                        <i class="fas fa-undo-alt"></i>
                    </button>
                </form>
                <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" data-title="{{ $task->title }}" title='Удалить задание "{{ $task->title}}"'>
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
                @else
                <form action="{{ route('complete-task', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="complete-btn" title='Подтвердить выполнение задания "{{ $task->title}}"'>
                        <i class="far fa-check-circle"></i>
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection
