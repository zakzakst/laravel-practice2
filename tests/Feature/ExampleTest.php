<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        $list = [];
        for($i = 0; $i < 10; $i++) {
            $p1 = factory(Person::class)->create();
            $p2 = factory(Person::class)->states('upper')->create();
            $p3 = factory(Person::class)->states('lower')->create();
            $p4 = factory(Person::class)->states('upper')->states('lower')->create();
            $list = array_merge($list, [
                $p1->id,
                $p2->id,
                $p3->id,
                $p4->id,
            ]);
        }

        for($i = 0; $i < 10; $i++) {
            shuffle($list);
            $item = array_shift($list);
            $person = Person::find($item);
            $data = $person->toArray();
            print_r($data);

            $this->assertDatabaseHas('people', $data);

            $person->delete();
            $this->assertDatabaseMissing('people', $data);
        }
    }
}
