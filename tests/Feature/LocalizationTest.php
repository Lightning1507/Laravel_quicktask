<?php

test('user can switch application language to vietnamese', function () {
    $response = $this->get('/locale/vi');

    $response->assertRedirect();
    $this->assertSame('vi', session('locale'));

    $this->get('/login')
        ->assertOk()
        ->assertSee('Đăng nhập')
        ->assertSee('Ghi nhớ đăng nhập');
});

test('user can switch application language to english', function () {
    $this->withSession(['locale' => 'vi'])
        ->get('/locale/en')
        ->assertRedirect();

    $this->assertSame('en', session('locale'));

    $this->get('/login')
        ->assertOk()
        ->assertSee('Log in')
        ->assertSee('Remember me');
});
