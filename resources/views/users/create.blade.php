<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create User</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                    @csrf

                    @include('users.partials.form')

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('users.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 dark:border-gray-600 dark:text-gray-200">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
