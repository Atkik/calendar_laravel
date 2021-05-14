<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
	//テーブル名
    protected $table = 'schedules';
    
    //主キー
    protected $primaryKey = 'No';
    //保存項目
    protected $fillable = 
    [
    	'date',
    	'start',
    	'end',
    	'schedule',
        'userID'
    ];
    
    public $timestamps = false;
}
