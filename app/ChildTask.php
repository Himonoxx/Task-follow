<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildTask extends Model
{
    protected $fillable=['content','user_id','status','deadline'];
    
    public function user()
    {
     return $this->belongsTo(User::class);   
    }
    
    public function parent(){
        return $this->belongsTo(Task::class);
        
    }

}
