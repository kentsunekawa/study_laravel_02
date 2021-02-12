<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Person extends Model
{
    use Searchable;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer',
    ];

    public function toSearchableArray() {
        $array = $this->toArray();
        $array['reverse'] = strrev($array['name']);
        return $array;
    }

    public function newCollection(array $models = []){
        return new MyCollection($models);
    }

    public function getNameAttribute($value) {
        return strtoupper($value);
    }

    public function setAllDataAttribute(Array $value) {
        $this->attributes['name'] = $value[0];
        $this->attributes['mail'] = $value[1];
        $this->attributes['age'] = $value[2];
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }


    public function getNameAndIdAttribute()
    {
        return $this->name . ' [id=' . $this->id . ']';
    }


    public function getNameAndMailAttribute()
    {
        return $this->name . ' (' . $this->mail . ')';
    }


    public function getNameAndAgeAttribute()
    {
        return $this->name . '(' . $this->age . ')';
    }
    public function getAllDataAttribute()
    {
        return $this->name . '(' . $this->age . ')'
            . ' [' . $this->mail . ']';
    }
}

class MyCollection extends Collection {
    public function fields() {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
