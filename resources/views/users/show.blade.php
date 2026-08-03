<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $user->name }}
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('users.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200">Back</a>
                <a href="{{ route('users.edit', $user) }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Edit User</a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto grid max-w-7xl gap-6 sm:px-6 lg:grid-cols-3 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">User Information</h3>

                <dl class="mt-4 space-y-3 text-sm">
                    <div>
                        <dt class="font-medium text-gray-500 dark:text-gray-400">Username</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $user->username ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-500 dark:text-gray-400">Status</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $user->is_active ? 'Active' : 'Inactive' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-500 dark:text-gray-400">Role</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $user->is_admin ? 'Admin' : 'User' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg dark:bg-gray-800 lg:col-span-2">
                <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 dark:border-gray-700">
                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">Related Tasks</h3>
                    <a href="{{ route('tasks.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Create Task</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Due Date</th>
                                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($user->tasks as $task)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $task->title }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $task->status }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $task->due_date ?? '-' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('tasks.show', $task) }}" class="rounded-md border border-gray-300 px-3 py-1 text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200">View</a>
                                            <a href="{{ route('tasks.edit', $task) }}" class="rounded-md border border-indigo-300 px-3 py-1 text-indigo-700 hover:bg-indigo-50 dark:text-indigo-300">Edit</a>
                                            <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-md border border-red-300 px-3 py-1 text-red-700 hover:bg-red-50 dark:text-red-300">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                        This user does not have related tasks yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
