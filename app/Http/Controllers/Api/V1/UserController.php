<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\CommonResource;
use App\Http\Resources\ErrorResource;
use App\Models\User;
use App\Notifications\Welcome;
use App\Repositories\UserRepository;
use App\Http\Requests\ChangePasswordRequest;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return CommonResource|ErrorResource
     */
    public function index(User $user)
    {
        try {
            return new CommonResource($user->get());
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return CommonResource|ErrorResource
     */
    public function store(UserRequest $request)
    {
        try {
            $user = User::create($request->input());

            if ($user['error']) {
                return new ErrorResource($user['error']);
            }

            return new CommonResource($user);
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return CommonResource|ErrorResource
     */
    public function show($id)
    {
        try {
            return new CommonResource(User::findOrFail($id));
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return CommonResource|ErrorResource
     */
    public function update(UpdateUserRequest $request, $id)
    {
        return $this->userRepo->updateUser($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return CommonResource|ErrorResource
     */

    /*
    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            return new CommonResource(trans('message.DeletedSuccessfully'));
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }
    */

    /*
    public function changePassword(ChangePasswordRequest $request){
        return $this->userRepo->changePassword(auth()->user());
    }

    public function bulkUserCreate(){
        try {
            $users = User::where('bulk_create', 'new')->get();

            foreach ($users as $user){
                $password = Str::random(10);
                $details = [ 'email' => $user->email, 'password' => $password ];
                User::find($user->id)->update([ 'bulk_create'=>'completed', 'password'=>$password ]);
                Notification::route('mail', $user->email)->notify(new Welcome($details));
            }

            return new CommonResource(trans('message.OperationSuccessful'));
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }
    */
    public function sendTeacherPasswordMail()
    {
        try {
            $users = User::select('id', 'name', 'email')->where('role', 'teacher')->where('is_teacher_password_mail_sent', 0)->get()->toArray();

            foreach ($users as $user) {
                $string = Str::random(10);
                $password = Hash::make($string);

                $data = array(
                    'password' => $password,
                    'is_teacher_password_mail_sent' => 1
                );
                $update_password = User::where('id', $user['id'])
                    ->update($data);

                $to_name = $user['name'];
                $to_email = $user['email'];
                $data = array('name' => $to_name, 'email' => $to_email, 'password' => $string);
                Mail::send('email-template.faculty-password', $data, function ($message) use ($to_name, $to_email) {

                    $message->to($to_email)
                        ->subject('Toplad Login Credentials');
                });
            }

            return "Successful";
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }

    public function updateStudentPassword()
    {
        try {
            // $users = User::where('is_imported', 1)->get();
            // $users = User::where('id', 34450)->get();
            $users = DB::select('SELECT * FROM users WHERE LENGTH(password) = 8 AND is_imported = 1');
            
            foreach ($users as $user) {
                $update_to_user = User::find($user->id);
                $update_to_user->password = Hash::make($update_to_user->password);
                $update_to_user->save();
            }
            return "Successful";
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }
}
