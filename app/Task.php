<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=['content','user_id','status','deadline'];
    
    public function user()
    {
     return $this->belongsTo(User::class);   
    }
    
    public function parent(){
        return $this->hasMany(Task::class);
        
    }
    
     public function child(){
        return $this->belongsTo(Task::class);
        
    }
}
