<x-layout title="Create New Task">
    <div class="flex justify-between items-center mb-5">
        <h2 class="text-2xl font-bold">Create New Task - {{ $project->name }}</h2>
        <a href="{{ route('project.tasks.index', $project->hashid) }}" class="px-4 py-2 text-blue-500 hover:underline">Back</a>
    </div>
    <form action="{{ route('project.tasks.store', $project->hashid) }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <div class="mb-5">
            <x-input name="name" label="Task Name" type="text" placeholder="Task Name" />
        </div>
        <div class="mb-5">
            <x-input name="priority" label="Priority" type="number" placeholder="Priority" />
        </div>
        <div class="mb-5">
            <x-select name="status" label="Status" :options="['todo' => 'ToDo', 'in_progress' => 'In Progress', 'done' => 'Done']" :selected="'todo'" />
        </div>
        <x-button type="submit" title="Create Task" />
    </form>
</x-layout>