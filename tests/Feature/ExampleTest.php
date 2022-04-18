<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Person;
use Illuminate\Support\Facades\Bus;
use App\Jobs\MyJob;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        $id = 1;
        $data = [
            'id' => $id,
            'name' => 'DUMMY',
            'mail' => 'dummy@mail',
            'age' => 0,
        ];
        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people', $data);

        Bus::fake();
        Bus::assertNotDispatched(MyJob::class);
        MyJob::dispatch($id);
        Bus::assertDispatched(MyJob::class);
    }
}
