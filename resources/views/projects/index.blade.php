<x-layout>
    <div class="flex flex-col">
        <div class="flex justify-between items-center mb-5">
            <h2>Projects</h2>
            <div class="">
                <x-button link href="{{ route('projects.create') }}" title="Create Project"></x-button>
            </div>
        </div>
        @if($projects->count() === 0)
        <div class="text-center my-5 text-gray-500">
            <p>No projects found</p>
        </div>
        @else
        <div class="">
            @foreach ($projects as $project)
                <div class="flex justify-between items-center py-1 border-b border-gray-200 my-4">
                    <p>{{ $project['name'] }}</p>
                    <div class="flex gap-3">
                        <a href="{{ route('project.tasks.index', $project['id']) }}" class="text-xs text-blue-800 hover:text-blue-800/50 transition-all">View</a>
                        <a href="{{ route('projects.edit', $project['id']) }}" class="text-xs text-blue-800 hover:text-blue-800/50 transition-all">Edit</a>
                        <button data-confirm-url="{{ route('projects.destroy', $project['id']) }}" class="text-xs text-red-800 hover:text-red-800/50 transition-all">Delete</button>
                    </div>
                </div>
            @endforeach
            <x-paginator :paginator="$projects"></x-paginator>
        </div>
        @endif
    </div>
    <x-confirmdialog title="Delete Project" message="This action cannot be undone. Are you sure you want to delete this project?"/>
</x-layout>