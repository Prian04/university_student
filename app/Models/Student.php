<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory; 
     use SoftDeletes;

    protected $table= "students";

    protected $fillable = [
        'student_name',
        'class_teacher_id',
        'class',
        'admission_date',
        'yearly_fees'
    ];

    protected $dates = [
        'admission_date',  
    ];

     protected $datess = ['deleted_at'];

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'class_teacher_id');
    }
}
