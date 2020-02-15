<?php

namespace OSD;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'surname', 'email', 'ci', 'score'
    ];


     public function knowledge_area() {

        return $this->belongsTo('OSD\KnowledgeArea', 'knowledge_area_id');
    }

   /* student_programming relation*/
    public function subject_programming() {

       return $this->belongsToMany('OSD\SubjectProgramming','student_programmings')->withPivot('id');
    }

    /*survey evaluation relation*/
    public function semester_survey() {
      
       return $this->belongsToMany('OSD\SemesterSurvey','survey_evaluations')->withPivot('date','description');
    }

    /*public function student_programming() {
       return $this->belongsToMany('OSD\StudentProgramming','survey_evaluations')->withPivot('date','description');
    }*/

}
