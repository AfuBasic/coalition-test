<x-layout>
    <div class="flex flex-col">
        <div class="flex justify-between items-center">
            <h2>Projects</h2>
            <div class="">
                <x-button link href="{{ route('projects.create') }}" title="Create Project"></x-button>
            </div>
        </div>
    </div>
</x-layout>