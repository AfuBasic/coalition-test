<x-layout title="Edit Task">
    <div class="flex justify-between items-center mb-5">
        <h2 class="text-2xl font-bold">Edit Task</h2>
        <a href="{{ route('project.tasks.index', $project->hashid) }}" class="px-4 py-2 text-blue-500 hover:underline">Back</a>
    </div>
    <form action="{{ route('tasks.update', $task->hashid) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <x-input name="name" label="Task Name" type="text" placeholder="Task Name" value="{{ $task->name }}" />
        </div>
        <div class="mb-5">
            <x-input name="priority" label="Priority" type="number" placeholder="Priority" value="{{ $task->priority }}" />
        </div>
        <div class="mb-5">
            <x-select name="status" label="Status" :options="['todo' => 'ToDo', 'in_progress' => 'In Progress', 'done' => 'Done']" :selected="'todo'" />
        </div>
        <x-button type="submit" title="Update Task" />
    </form>
</x-layout>