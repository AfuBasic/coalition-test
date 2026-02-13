<x-layout>
    <div class="max-w-5xl mx-auto px-4 space-y-6">
        <div class="flex justify-between items-center gap-4 mb-8">
            <h3 class="text-xl font-semibold text-gray-900">Projects</h3>
            <div class="">
                <x-button link href="{{ route('projects.create') }}" title="Create Project"></x-button>
            </div>
        </div>
        @if($projects->count() === 0)
        <div class="text-center my-8 text-gray-500">
            <x-alert>No projects found</x-alert>
        </div>
        @else
        <div class="">
            @foreach ($projects as $project)
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between
                        gap-4 px-6 py-4
                        hover:bg-gray-50
                        transition">
                    <p>{{ $project['name'] }}</p>
                    <div class="flex gap-3">
                        <a href="{{ route('project.tasks.index', $project['hashid']) }}" class="text-xs text-blue-800 hover:text-blue-800/50 transition-all">View</a>
                        <a href="{{ route('projects.edit', $project['hashid']) }}" class="text-xs text-blue-800 hover:text-blue-800/50 transition-all">Edit</a>
                        <button data-confirm-url="{{ route('projects.destroy', $project['hashid']) }}" class="text-xs text-red-800 hover:text-red-800/50 transition-all">Delete</button>
                    </div>
                </div>
            @endforeach
            <x-paginator :paginator="$projects"></x-paginator>
        </div>
        @endif
    </div>
    <x-confirmdialog title="Delete Project" message="This action cannot be undone. Are you sure you want to delete this project?"/>
</x-layout>