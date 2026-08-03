<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $task->title }}</h2>
            <div class="flex gap-2">
                <a href="{{ route('tasks.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 dark:border-gray-600 dark:text-gray-200">Back</a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Edit Task</a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <dl class="space-y-4 text-sm">
                    <div>
                        <dt class="font-medium text-gray-500 dark:text-gray-400">Assigned User</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $task->user_name }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-500 dark:text-gray-400">Status</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $task->status }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-500 dark:text-gray-400">Due Date</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $task->due_date ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-500 dark:text-gray-400">Description</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $task->description ?? '-' }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
