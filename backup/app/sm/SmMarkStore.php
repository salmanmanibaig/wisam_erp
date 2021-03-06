<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmMarkStore extends Model
{

	//SELECT `id`, `school_id`, `class_id`, `section_id`, `subject_id`, `exam_term_id`, `exam_setup_id`, `student_id`, `student_roll_no`, `student_addmission_no`, `total_marks`, `is_absent`, `created_by`, `updated_by`, `created_at`, `updated_at` FROM `sm_mark_stores` WHERE 1

    public static function get_mark_by_part($student_id, $exam_id, $class_id, $section_id, $subject_id, $part_id){
    	$getMark= SmMarkStore::where([
    		['student_id',$student_id], 
    		['exam_term_id',$exam_id], 
    		['class_id',$class_id], 
    		['section_id',$section_id], 
    		['subject_id',$subject_id], 
    		['exam_setup_id',$part_id], 
    	])->first();
    	if(!empty($getMark)){
    		$output= $getMark->total_marks;
    	}else{
    		$output= '0.00';
    	}

    	return $output;
    }
}
