<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function newCollection(array $models = []) {
        return new MyCollection($models);
    }
}

class MyCollection extends Collection
{
    public function fields() {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
