<x-layout title="Tasks">
    
    <div class="max-w-5xl mx-auto px-4 space-y-6">
        <div class="bg-gray-50 border border-gray-200 rounded-xl px-6 py-5">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                        Current Project
                    </p>
                    
                    <h2 class="text-lg font-semibold text-gray-900">
                        {{ $project->name }}
                    </h2>
                </div>
                
                <div class="w-full sm:w-64">
                    <x-select
                    name="project"
                    onchange="window.location = this.value"
                    :options="$all_projects"
                    :selected="route('project.tasks.index', $project->hashid)"
                    />
                </div>
                
            </div>
        </div>
        
        <div class="flex flex-row items-center justify-between gap-4">
            <h3 class="text-xl font-semibold text-gray-900">
                Tasks
            </h3>
            
            <div>
            <x-button
            link
            href="{{ route('project.tasks.create', $project->hashid) }}"
            title="Create Task"
            />
            </div>

            
        </div>
        
        @if($tasks->isEmpty())
        
        <div class="border border-dashed border-gray-300 rounded-xl p-14 text-center bg-white">
            
            <p class="text-gray-500 mb-6">
                No tasks yet for this project.
            </p>
        </div>
        
        @else
        
        <div class="bg-white overflow-hidden" id="sortable" >
            
            @foreach ($tasks as $task)
            
            @php
            $statusMap = [
            'todo' => [
            'border' => 'border-l-gray-300',
            'badge' => 'bg-gray-100 text-gray-600'
            ],
            'in_progress' => [
            'border' => 'border-l-amber-400',
            'badge' => 'bg-amber-100 text-amber-700'
            ],
            'done' => [
            'border' => 'border-l-emerald-500',
            'badge' => 'bg-emerald-100 text-emerald-700'
            ],
            ];
            
            $style = $statusMap[$task->status] ?? $statusMap['todo'];
            @endphp

            <div data-id="{{ $task->hashid }}" class="cursor-pointer mb-5 border border-gray-200 rounded-l-md border-l-4 {{ $style['border'] }}
                        flex flex-col sm:flex-row sm:justify-between gap-4 px-6 py-4 hover:bg-gray-50 transition
                    ">
            <div class="space-y-1">
                <p class="text-sm font-medium text-gray-900">
                    {{ $task->name }}
                </p>
                <span class="inline-block text-xs px-2 py-1 rounded-md {{ $style['badge'] }}">
                    {{ str_replace('_', ' ', ucfirst($task->status)) }}
                </span>
                <span class="text-xs text-gray-500">Priority: {{ $task->priority }}</span>
                
            </div>
            
            <div class="flex items-center justify-end gap-5 text-xs">
                
                <a href="{{ route('tasks.edit', $task->hashid) }}"
                    class="text-gray-500 hover:text-gray-800 transition">
                    Update Task
                </a>
                
                <button
                data-confirm-url="{{ route('tasks.destroy', $task->hashid) }}"
                class="text-red-500 hover:text-red-700 transition">
                Delete
            </button>
            
        </div>
        
    </div>
    
    @endforeach
    
</div>

@endif

</div>



<x-confirmdialog
title="Delete Task"
message="This action cannot be undone. Are you sure you want to delete this task?"
/>
<script>
    $("#sortable").sortable({
        revert: true,
        update: function() {
            let order = [];
            $("#sortable > div").each(function(){
                order.push($(this).data('id'));
            })
            console.log(order);

            $.ajax({
                url: "{{ route('project.tasks.reorder', $project->hashid) }}",
                type: "POST",
                data: {
                    task_ids: order,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                }
            });
        }
    })
</script>
</x-layout>