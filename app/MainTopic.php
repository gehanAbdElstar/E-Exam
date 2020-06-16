<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainTopic extends Model
{
    //
    protected $table='main_topics';
    protected $fillable=array('name','created_at','updated_at');
    public function collegeInformation() {
        return $this->hasMany('App\CollegeInformation','main_topic_id'); // this matches the Eloquent model
    }
}
