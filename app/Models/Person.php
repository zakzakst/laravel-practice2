<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer',
    ];

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

    public function getNameAttribute($value) {
        return strtoupper($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setAllDataAttribute(Array $value) {
        $this->attributes['name'] = $value[0];
        $this->attributes['mail'] = $value[1];
        $this->attributes['age'] = $value[2];
    }
}

class MyCollection extends Collection
{
    public function fields() {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
