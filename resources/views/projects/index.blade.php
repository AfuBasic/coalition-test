<x-layout>
    <div class="flex flex-col">
        <div class="flex justify-between items-center mb-5">
            <h2>Projects</h2>
            <div class="">
                <x-button link href="{{ route('projects.create') }}" title="Create Project"></x-button>
            </div>
        </div>
        <div class="">
            @foreach ($projects as $project)
                <div class="flex justify-between items-center py-1 border-b border-gray-200 my-4">
                    <p>{{ $project['name'] }}</p>
                    <div>
                        <a href="{{ route('projects.edit', $project['id']) }}" class="text-xs text-blue-800 hover:text-blue-800/50 transition-all">Edit</a>
                        <a href="{{ route('projects.destroy', $project['id']) }}" class="text-xs text-red-800 hover:text-red-800/50 transition-all">Delete</a>
                    </div>
                </div>
            @endforeach
            <x-paginator :paginator="$projects"></x-paginator>
        </div>
    </div>
</x-layout>