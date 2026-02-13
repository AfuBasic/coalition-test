<x-layout title="Tasks">
    <div class="flex flex-col">
        <div class="flex justify-between border-b border-b-gray-300 mb-8">
            <p>Projects</p>
            <div>
                <x-select name="project" onchange="window.location = this.value" :options="$all_projects" :selected="route('project.tasks.index', $project->id)"/>
            </div>
        </div>
        <div class="flex justify-between items-center mb-5">
            <h2>Tasks | {{ $project->name }}</h2>
            <div class="">
                <x-button link href="{{ route('project.tasks.create', $project->id) }}" title="Create Task"></x-button>
            </div>
        </div>
        @if($tasks->count() === 0)
        <div class="text-center my-5 text-gray-500">
            <x-alert>No Tasks found for the project {{ $project->name }}</x-alert>
        </div>
        @else
        <div class="">
            @foreach ($tasks as $task)
                <div class="flex justify-between items-center py-1 border-b border-gray-200 my-4">
                    <p>{{ $task['name'] }}</p>
                    <div class="flex gap-3">
                        <a href="{{ route('project.tasks.index', $task['id']) }}" class="text-xs text-blue-800 hover:text-blue-800/50 transition-all">View</a>
                        <a href="{{ route('projects.edit', $task['id']) }}" class="text-xs text-blue-800 hover:text-blue-800/50 transition-all">Edit</a>
                        <button data-confirm-url="{{ route('projects.destroy', $task['id']) }}" class="text-xs text-red-800 hover:text-red-800/50 transition-all">Delete</button>
                    </div>
                </div>
            @endforeach
            <x-paginator :paginator="$tasks"></x-paginator>
        </div>
        @endif
    </div>
    <x-confirmdialog title="Delete Project" message="This action cannot be undone. Are you sure you want to delete this project?"/>
</x-layout>