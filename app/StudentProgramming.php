<?php

namespace OSD;

use Illuminate\Database\Eloquent\Model;

class StudentProgramming extends Model
{


    protected $fillable = [
        'id', 'evaluated', 'student_id', 'subject_programming_id',
    ];



   /* public function student() {
       return $this->belongsTo('OSD\Student', 'student_id');
    }
*/

  /*  survey evaluation relation*/
    public function student_survey() {
       return $this->belongsToMany('OSD\Student','survey_evaluations')->withPivot('date','description');
    }

    public function semester_survey() {
       return $this->belongsToMany('OSD\SemesterSurvey','survey_evaluations')->withPivot('date','description');
    }
  

}