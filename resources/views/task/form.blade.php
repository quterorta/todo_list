<form method="POST" @if (isset($task)) action="{{ route('task.update', $task->id) }}" @else action="{{ route('task.store') }}" @endif>
    @csrf
    @isset($task)@method('PUT')@endisset
    <div class="form-group">
        <label for="title">Название задания</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Введите название задания" value="{{ old('title', isset($task) ? $task->title : null) }}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mt-3">
        <label for="description">Описание задания</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Введите описание задания" value="{{ old('description', isset($task) ? $task->description : null) }}">
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group d-grid mt-3">
        <button type="submit" class="btn @if (isset($task)) btn-primary @else btn-success @endif">
            {{ isset($task) ? "Редактировать задание" : "Добавить задание" }}
        </button>
    </div>
</form>
