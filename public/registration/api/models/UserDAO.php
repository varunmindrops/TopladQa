<?php

class UserDAO extends Database {

    private $tbl_user = 'users';
    private $tbl_mst_subject = 'mst_subject';
    private $tbl_teachers = 'teachers';
    private $tbl_mst_course = 'mst_course';
    private $tbl_mst_course_level = 'mst_course_level';
    private $tbl_course_language = 'mst_language';
    private $tbl_mst_experience = 'mst_experience';
    private $tbl_teacher_course = 'teacher_course';
    private $tbl_teacher_course_level = 'teacher_course_level';
    private $tbl_teacher_language = 'teacher_language';
    private $tbl_teacher_subject = 'teacher_subject';
    private $tbl_attempt = 'mst_attempt';
    
    function userLogin($req) {
        $sql = " SELECT id, role, email FROM $this->tbl_user";
        $sql .= " WHERE phone=:phone AND password=:password";
        $this->query($sql);
        $this->bind(':phone', $req['phone']);
        $this->bind(':password', md5($req['password']));
        return $this->single();
    }
 
    function checkExistingCredentials($req) {
        $sql = " SELECT name, phone, email, secondary_email, secondary_phone FROM $this->tbl_user";
        $sql .= " WHERE email=:email1 OR phone = :phone1";
        $this->query($sql);
        $this->bind(':email1', trim($req['email1']));
        $this->bind(':phone1', trim($req['phone1']));
        // $this->bind(':email2', trim($req['email2']));
        // $this->bind(':phone2', trim($req['phone2']));
        return $this->single();
    }

    // function getAllSubject() {
    //     $sql = "SELECT * FROM $this->tbl_mst_subject";
    //     $this->query($sql);
        
    //     return $this->resultset();
    // }

    function getAllCourse() {
        $sql = "SELECT * FROM $this->tbl_mst_course";
        $this->query($sql);
        
        return $this->resultset();
    }

    function getAllCourseLevel($req) {
        $sql = "SELECT * FROM $this->tbl_mst_course_level";
        $sql .= " WHERE course_id IN (".implode(',',$req).") ";
        $this->query($sql);
        
        return $this->resultset();
    }

    function getSubject($req) {
        $sql = "SELECT * FROM $this->tbl_mst_subject";
        $sql .= " WHERE course_level_id IN (".implode(',',$req).") ";
        $this->query($sql);
        
        return $this->resultset();
    }
    
    function getCourseLanguage() {
        $sql = "SELECT * FROM $this->tbl_course_language";
        $this->query($sql);
        
        return $this->resultset();
    }

    function insertUser($req) {
        $sql = "INSERT INTO $this->tbl_user (role, name, email, secondary_email, phone, secondary_phone, photo, status , created_at, updated_at, is_product_mail_sent)";
        $sql .= " VALUES(:role, :name, :email1, :email2, :phone1, :phone2, :photo, :status, :created_at, :updated_at, :is_product_mail_sent)";
        $this->query($sql);
        
        $this->bind(':role', 'teacher');
        $this->bind(':name',  trim($req['name']) );
        $this->bind(':email1', trim($req['email1']) );
        $this->bind(':phone1', trim($req['phone1']) );
        $this->bind(':email2', trim($req['email2']) );
        $this->bind(':phone2', trim($req['phone2']) );
        $this->bind(':photo', trim($req['photo']) );
        $this->bind(':is_product_mail_sent', 0 );
        $this->bind(':status', 1);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        $this->execute();
        return $this->lastInsertId();
    }

    function teacherRegistration($req) {
        $sql = "INSERT INTO $this->tbl_teachers (user_id , after_sales_phone, after_sales_person, ";
        $sql .= " tech_supp_phone, tech_supp_person, experience_id, teaching_experience_id, edu_qualification, prof_achievement, award_honour, area_of_interest, bio, created_at, updated_at, resume_url)";
        $sql .= " VALUES(:user_id , :sales_phone, :sales_name, ";
        $sql .= " :tech_phone, :tech_name, :total_experience, :teach_experience, :qualification, :achievement, :award, :interest, :bio, :created_at, :updated_at, :resume_url)";
        $this->query($sql);
        
        $this->bind(':user_id', $req['user_id'] );
        $this->bind(':sales_phone', $req['sales_phone']);
        $this->bind(':sales_name', $req['sales_name']);
        $this->bind(':tech_phone', $req['tech_phone']);
        $this->bind(':tech_name', $req['tech_name']);
        $this->bind(':total_experience', $req['total_experience']);
        $this->bind(':teach_experience', $req['teach_experience']);
        $this->bind(':qualification', $req['qualification']);
        $this->bind(':achievement', $req['achievement']);
        $this->bind(':award', $req['award']);
        $this->bind(':interest', $req['interest']);
        $this->bind(':bio', $req['bio']);
        $this->bind(':resume_url', $req['resume_url']);
        $this->bind(':created_at', date('Y-m-d H:i:s'));
        $this->bind(':updated_at', date('Y-m-d H:i:s'));
        return $this->execute();
    }

    function addTeacherCourse($req, $course_id) {
        $sql = "INSERT INTO $this->tbl_teacher_course (user_id, course_id)";
        $sql .= " VALUES(:user_id, :course_id)";
        $this->query($sql);
        
        $this->bind(':user_id', $req['user_id'] );
        $this->bind(':course_id', $course_id );
        return $this->execute();
    }

    function addTeacherCourseLevel($req, $course_level_id) {
        $sql = "INSERT INTO $this->tbl_teacher_course_level (user_id, course_level_id)";
        $sql .= " VALUES(:user_id, :course_level_id)";
        $this->query($sql);
        
        $this->bind(':user_id', $req['user_id'] );
        $this->bind(':course_level_id', $course_level_id );
        return $this->execute();
    }

    function addTeacherSubject($req, $subject_id) {
        $sql = "INSERT INTO $this->tbl_teacher_subject (user_id, subject_id)";
        $sql .= " VALUES(:user_id, :subject_id)";
        $this->query($sql);
        
        $this->bind(':user_id', $req['user_id'] );
        $this->bind(':subject_id', $subject_id );
        return $this->execute();
    }

    // function addTeacherLanguage($req, $language_id) {
    //     $sql = "INSERT INTO $this->tbl_teacher_language (user_id, language_id)";
    //     $sql .= " VALUES(:user_id, :language_id)";
    //     $this->query($sql);
        
    //     $this->bind(':user_id', $req['user_id'] );
    //     $this->bind(':language_id', $language_id );
    //     return $this->execute();
    // }

    // function sendProductFormMail($req) {
    //     $sql = "SELECT id FROM $this->tbl_user";
    //     $sql .= " WHERE email = '".$req['email']."' ";
    //     $this->query($sql);
        
    //     return $this->resultset();
    // }

    function sendProductMailToAll() {
        $sql = "SELECT id, name, email FROM $this->tbl_user WHERE role = 'teacher' AND is_product_mail_sent = 0 AND (status = 1 OR deleted_at IS NULL ) ";
        $this->query($sql);
        
        return $this->resultset();
    }

    function sendWelcomeMailToAll() {
        $sql = "SELECT id, name, email FROM $this->tbl_user WHERE role = 'teacher' AND (status = 1 OR deleted_at IS NULL)";
        $this->query($sql);
        
        return $this->resultset();
    }

    function getTeacherCourse($teacher_id) {
        $sql = "SELECT ttc.*, tmc.id as course_id, tmc.name as course_name FROM $this->tbl_teacher_course as ttc";
        $sql .= " INNER JOIN $this->tbl_mst_course as tmc ON ttc.course_id = tmc.id";
        $sql .= " WHERE ttc.user_id = :teacher_id";
        $this->query($sql);
        
        $this->bind(':teacher_id', $teacher_id );
        return $this->resultset();
    }
  
    function getTeacherSubject($teacher_id, $course_id) {
        $sql = "SELECT tts.*, tms.id as sub_id, tms.name as subject_name FROM $this->tbl_teacher_subject as tts";
        $sql .= " INNER JOIN $this->tbl_mst_subject as tms ON tts.subject_id = tms.id";
        $sql .= " WHERE tts.user_id = :teacher_id AND tms.course_id = :course_id";
        $this->query($sql);
        
        $this->bind(':teacher_id', $teacher_id );
        $this->bind(':course_id', $course_id );
        return $this->resultset();
    }

    function getExperience() {
        $sql = "SELECT tme.* FROM $this->tbl_mst_experience as tme";
        $this->query($sql);
        
        return $this->resultset();
    }

    function getAttempt($course_id) {
        $sql  = "SELECT * FROM $this->tbl_attempt";
        $sql .= " WHERE course_id = :course_id";
        $this->query($sql);
        
        $this->bind(':course_id', $course_id );
        
        return $this->resultset();
    }
  
    function updateSentProductMailStatus($user_id) {
        $sql  = "UPDATE $this->tbl_user SET is_product_mail_sent = :is_product_mail_sent WHERE id = :user_id";
        $this->query($sql);
        
        $this->bind(':user_id', $user_id );
        $this->bind(':is_product_mail_sent', 1 );
        return $this->execute();
    }
}

//end of class
