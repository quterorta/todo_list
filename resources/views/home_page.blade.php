@extends('layouts/layouts')

@section('title')
    Home
@endsection

@section('main-content-header')
    Task Manager
@endsection

@section('main-content')

<div class="task_block">
    <div class="task_list_block">
        <table class="table" id="task_list_table">
            <tr>
                <th style="width: 20%">Задание</th>
                <th style="width: 55%">Описание задания</th>
                <th style="width: 25%"></th>
            </tr>
            @foreach ($task_list as $task_item)
            <tr class="@if($task_item->completed == 1) completed_task @endif">
                <td class="table__task_title">{{ $task_item->title }}</td>
                <td class="table__task_description">{{ $task_item->description }}</td>
                <td class="table__task_control">
                    <a href="{{ route('task.edit', $task_item->id) }}" title='Редактировать задание "{{ $task_item->title}}"' class="table__task_control__edit_btn">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    @if ($task_item->completed == 1)
                        <form action="{{ route('uncomplete-task', $task_item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="uncomplete-btn" title='Отменить выполнение задания "{{ $task_item->title}}"'>
                                <i class="fas fa-undo-alt"></i>
                            </button>
                        </form>
                        <form action="{{ route('task.destroy', $task_item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" data-title="{{ $task_item->title }}" title='Удалить задание "{{ $task_item->title}}"'>
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('complete-task', $task_item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="complete-btn" title='Подтвердить выполнение задания "{{ $task_item->title}}"'>
                                <i class="far fa-check-circle"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="paginator">
        {{ $task_list->links() }}
    </div>
</div>

<div class="add_task_block__form">
    <h2 class="mt-5 mb-3">Добавить задание</h2>
    @include('task/form')
</div>

@endsection
