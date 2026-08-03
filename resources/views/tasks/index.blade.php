<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tasks</h2>
            <a href="{{ route('tasks.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Create Task</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Due Date</th>
                                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($tasks as $task)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $task->title }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $task->user_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $task->status }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $task->due_date ?? '-' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('tasks.show', $task->id) }}" class="rounded-md border border-gray-300 px-3 py-1 text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200">View</a>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="rounded-md border border-indigo-300 px-3 py-1 text-indigo-700 hover:bg-indigo-50 dark:text-indigo-300">Edit</a>
                                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-md border border-red-300 px-3 py-1 text-red-700 hover:bg-red-50 dark:text-red-300">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400">No tasks found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
