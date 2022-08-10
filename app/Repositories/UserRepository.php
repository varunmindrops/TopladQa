<?php
namespace App\Repositories;

use App\Http\Resources\CommonResource;
use App\Http\Resources\ErrorResource;
use App\Models\Otp;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private $message;
    private $request;
    public function __construct(MessageRepository $messageRepository, Request $request)
    {
        $this->message = $messageRepository->message();
        $this->request = $request;
    }

    public function changePassword($user){
        if(Hash::check($this->request->oldPassword, $user->password)){
            $user->password = $this->request->input('newPassword');
            $user->save();
            return new CommonResource(['message'=>$this->message->PasswordChangeSuccessfully]);
        }
        return new ErrorResource(['message'=>$this->message->OldPasswordIsIncorrect]);
    }

    /**
     * @param $id
     * @param $phone
     * @return CommonResource|ErrorResource
     */
    public function generateOTP($phone)
    {
        Otp::create(['phone' => $phone ,'otp' => rand(1000000,6)]);
    }

    public function sendOTP($otp, $contact){
        try{
//            $msg = 'Your+OTP+is+'.$otp.'+for+verification+on+MLG.';
//            $client = new Client();
//            $client->request('GET', 'https://www.logonutility.in/app/smsapi/index.php?key=55CCBE57324539&campaign=14744&routeid=20&type=text&contacts='.$contact.'&senderid=DISHAP&msg='.$msg);

//            $message = 'Dear User, you\'r OTP is '. $otp . '. Use this OTP to register.';
//            dd(env(SMS_HOST));
//            Http::get('https://admagister.net/api/mt/SendSMS?user=MovingPIN2017&password=dial$842&senderid=FOXMRX&number=9717321391&text=otp+is+2987');

        }catch(Exception $e){
            return new ErrorResource($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return CommonResource|ErrorResource
     */
    public function updateUser($id)
    {
        try {
            User::findOrFail($id)->update(request()->input());
            (new StudentRepository())->studentUpdate($id);
            return new CommonResource(trans('message.SuccessfullyUpdated'));
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }
}
