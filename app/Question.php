<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
	protected $fillable = ['title', 'body'];

    public function user(){
    	return $this->belongsTo(User::class); //this model belongs to user model
    }
    //$question = Question::find(1);
    //$question->user->email;

    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value); //convert string to slug format
    }
} 
