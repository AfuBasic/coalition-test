<div id="{{ $modalId }}"
class="fixed p-5 inset-0 z-50 hidden items-center justify-center bg-black/40">

<div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">
    <h2 class="text-lg font-semibold mb-2">
        {{ $title }}
    </h2>
    <p class="text-sm text-gray-500 mb-6">
        {{ $message }}
    </p>
    <div class="flex justify-end gap-3">
        <button
        type="button"
        class="cancel px-4 py-2 border rounded-lg hover:bg-gray-50">
        Cancel
    </button>
    <form action="" id="delete-form-{{ $modalId }}" method="post">
        @csrf
        @method('DELETE')
        <button
        type="submit"
        class="confirm px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
        Confirm
    </button></form>
</div>

</div>
</div>