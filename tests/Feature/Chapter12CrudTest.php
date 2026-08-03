<?php

use App\Models\Task;
use App\Models\User;

function adminUser(): User
{
    $user = User::factory()->create();
    $user->forceFill(['is_admin' => true])->save();

    return $user;
}

test('users can be listed with eager loaded tasks', function () {
    $admin = adminUser();
    $user = User::factory()->create(['name' => 'Chapter User']);
    Task::factory()->create([
        'user_id' => $user->id,
        'title' => 'Chapter Task',
    ]);

    $this->actingAs($admin)
        ->get('/users')
        ->assertOk()
        ->assertSee('Chapter User')
        ->assertSee('1');
});

test('user can be created with form request validation', function () {
    $admin = adminUser();

    $this->actingAs($admin)
        ->post('/users', [
            'name' => 'Created User',
            'first_name' => 'Created',
            'last_name' => 'User',
            'username' => 'created_user',
            'email' => 'created@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'is_active' => '1',
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('users', [
        'email' => 'created@example.com',
        'username' => 'created_user',
    ]);
});

test('task can be created using query builder controller', function () {
    $user = User::factory()->create();

    $this->post('/tasks', [
        'user_id' => $user->id,
        'title' => 'Query Builder Task',
        'description' => 'Created from chapter 12 test.',
        'status' => 'pending',
        'due_date' => '2026-08-03',
    ])
        ->assertRedirect();

    $this->assertDatabaseHas('tasks', [
        'user_id' => $user->id,
        'title' => 'Query Builder Task',
    ]);
});
