<x-layout title="Create Project">
    <div class="flex justify-between items-center mb-5">
        <h2 class="text-2xl font-bold">Create New Project</h2>
        <a href="{{ route('projects.index') }}" class="px-4 py-2 text-blue-500 hover:underline">Back</a>
    </div>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <x-input name="name" label="Project Name" type="text" placeholder="Project Name" />
        </div>
        <div class="mb-5">
            <x-textarea name="description" label="Description" placeholder="Description" />
        </div>
        <x-button type="submit" title="Create Project" />
    </form>
</x-layout>