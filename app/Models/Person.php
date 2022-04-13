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

    public function getNameAndAttribute() {
        return $this->name . '[id=' . $this->id . ']';
    }

    public function getNameAndMailAttribute() {
        return $this->name . '（' . $this->mail . '）';
    }

    public function getNameAndAgeAttribute() {
        return $this->name . '（' . $this->age . '）';
    }

    public function getAllDataAttribute() {
        return $this->name . '（' . $this->mail . '）' . '[' . $this->mail . ']';
    }
}

class MyCollection extends Collection
{
    public function fields() {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
