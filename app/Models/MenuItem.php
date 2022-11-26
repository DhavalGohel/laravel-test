<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    public function parent() {
        return $this->hasOne(MenuItem::Class, 'id', 'parent_id');
    }

    public function children() {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id');
    }

    public function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', null)->get();
    }
}
