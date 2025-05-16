<?php

use Illuminate\Support\Facades\Route;
use FzlxTech\LaravelWso2\Tests\TestCase;

beforeEach(function () {
    Route::middleware(['wso2.auth'])->get('/protected-endpoint', function () {
        return response()->json(['message' => 'You are authenticated']);
    });
});

it('blocks request without Authorization header', function () {
    $this->getJson('/protected-endpoint')
        ->assertStatus(401)
        ->assertJson(['error' => 'Unauthorized']);
});

it('blocks request with invalid JWT', function () {
    $this->withHeaders([
        'Authorization' => 'Bearer invalid-token',
    ])->getJson('/protected-endpoint')
        ->assertStatus(401)
        ->assertJsonStructure(['error', 'message']);
});
