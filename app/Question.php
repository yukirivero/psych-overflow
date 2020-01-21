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

    //this is called a mutator, it starts with the word "set", followed by a camel case of the attribute name, then the word "Attribute"
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value); //convert string to slug format
    }

    public function getUrlAttribute(){
        return route("questions.show", $this->id);
    }

    public function getCreatedDateAttribute(){
        //return $this->created_at->diffForHumans();
        return $this->created_at->format("d/m/Y");
    }
} 
