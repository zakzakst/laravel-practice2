<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/hello')->assertOk();
        $this->post('/hello')->assertOk();
        $this->get('/hello/1')->assertOk();
        $this->get('/hoge')->assertStatus(400);
        $this->get('/hello')->assertSeeText('Index');
        $this->get('/hello')->assertSee('<h1>');
        $this->get('/hello')->assertSeeInOrder(['<html','<head','<body','<h1>']);
        $this->get('/hello/json/1')->assertSeeText('YAMADA-TARO');
        $this->get('/hello/json/2')->assertExactJson([
            'id' => 2,
            'name' => 'HANAKO',
            'mail' => 'hanako@flower',
            'age' => '19',
            'created_at' => '2019-05-16 02:10:10',
            'updated_at' => '2019-05-16 02:10:10',
        ]);
    }
}
