<x-layout title="Create Project">
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