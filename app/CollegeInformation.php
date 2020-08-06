<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeInformation extends Model
{
    //
    protected $table='college_information';
    protected $fillable=array('main_topic_id','topic',
    'contents','media1_path','media2_path',
    'created_at','updated_at');
    public function mainTopic() {
        return $this->belongsTo('App\MainTopic','main_topic_id'); // this matches the Eloquent model
    }
}
