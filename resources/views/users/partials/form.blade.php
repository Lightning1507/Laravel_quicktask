@php
    $editing = isset($user);
@endphp

<div>
    <x-input-label for="name" value="Name" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name ?? '')" required />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="grid gap-4 md:grid-cols-2">
    <div>
        <x-input-label for="first_name" value="First Name" />
        <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name ?? '')" />
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="last_name" value="Last Name" />
        <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name ?? '')" />
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>
</div>

<div>
    <x-input-label for="username" value="Username" />
    <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username ?? '')" />
    <x-input-error :messages="$errors->get('username')" class="mt-2" />
</div>

<div>
    <x-input-label for="email" value="Email" />
    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email ?? '')" required />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div>
    <x-input-label for="password" :value="$editing ? 'Password (leave blank to keep current)' : 'Password'" />
    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :required="! $editing" />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<div>
    <x-input-label for="password_confirmation" value="Confirm Password" />
    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" :required="! $editing" />
</div>

<div class="flex gap-6">
    <label class="inline-flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $user->is_active ?? true)) class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
        Active
    </label>

    <label class="inline-flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
        <input type="checkbox" name="is_admin" value="1" @checked(old('is_admin', $user->is_admin ?? false)) class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
        Admin
    </label>
</div>
