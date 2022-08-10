<?php


namespace App\Repositories;


use Illuminate\Http\Request;
use stdClass;

class MessageRepository
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function message(){
        $object = new stdClass();

        $object->EmailPasswordNotMatch = 'Email and password does not match';
        $object->NotSuperAdmin = 'You\'re not super admin';
        $object->SuccessfullyUpdated = 'Successfully updated';
        $object->CanNotUpdateClass = 'Can\'t update class';
        $object->CanNotDeleteClass = 'Can\'t delete class';
        $object->ClassNotFound = 'Class not found';
        $object->DeletedSuccessfully = 'Deleted successfully';
        $object->CreatedSuccessfully = 'Created successfully';
        $object->SearchSuccessfull = 'Search successfull';
        $object->EmailNotFound = 'Email not found';
        $object->UserNotFound = 'User not found';
        $object->LoginSuccessfully = 'Login successfully';
        $object->IDNotFound = 'ID not found';
        $object->DataNotFound = 'Data not found';
        $object->LogoutSuccessfully = 'Logout successfully';
        $object->PasswordChangeSuccessfully = 'Password changed successfully';
        $object->OldPasswordIsIncorrect = 'Old password is incorrect';
        $object->EmailPasswordIsRequired = 'Email and password is required';
        $object->ImageUploadSuccessfully = 'Image upload successfully';
        $object->CouponAppliedSuccessfully = 'Coupon applied successfully';
        $object->CantFindEnoughQuestion = 'Can\'t find enough question';
        $object->TotalCountDoesNotMatch = 'Total count does not match';
        $object->CouponNotFound = 'Coupon not found';
        $object->MaxTestPaperAttempt = 'Max test paper attempted';
        $object->QuestionTypeIdNotFound = 'Please enter valid question type ID';
        $object->SubmitSuccessfully = 'Submit successfully';
        $object->TestPaperAlreadyCompleted = 'Test paper is already completed';
        $object->TestPaperTimeOver = 'Test paper time is over';
        $object->NotAdmin = 'You\'re not admin';
        $object->NotStudent = 'You\'re not student';
        $object->NotInstitute = 'You\'re not institute';
        $object->OptionsRequired = 'Please enter only two option';
        $object->ProgramDoesNotBelongYou = 'Program does not blonge to you';
        $object->CorrectOptions = 'Please provide correct options';
        $object->NoQuestionsAvailable = 'No Questions Available';
        $object->UploadQuestionsFailed = 'Upload Questions Failed';
        $object->OTPSuccessfullySent = 'OTP Successfully Sent';
        $object->IncorrectOTP = 'Incorrect OTP';

        return $object;
    }

    public function queryString($count){
        $object = new stdClass();

        $object->skip = $this->request->has('skip') ? $this->request->get('skip') : 0;
        $object->limit = $this->request->has('limit') ? $this->request->get('limit') : $count;
        $object->field = $this->request->has('field') ? $this->request->get('field') : 'id';
        $object->order = $this->request->has('order') ? $this->request->get('order') : 'desc';
        $object->search = $this->request->has('search') ? $this->request->get('search') : '';
        $object->user_type = $this->request->has('user_type') ? $this->request->get('user_type') : '';
        $object->category = $this->request->has('category') ? $this->request->get('category') : '';
        $object->date = $this->request->has('date') ? $this->request->get('date') : '';
        $object->count = $count;

        return $object;
    }
}
