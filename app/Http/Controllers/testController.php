<?php

namespace App\Http\Controllers;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\test;
use App\Roles;
use Auth;
use Mail;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\createTaskRequest;
use App\Http\Requests\updateProfil;
use Illuminate\Contracts\Encryption\DecryptException;
class testController extends Controller
{
    use ValidatesRequests;
    public function index(Request $request)
    {
      $myData = test::all();
      $myRole = Roles::all();
      if (Gate::denies('for-admin')){
        return view('units.index',['myData'=>$myData],['myRole'=>$myRole]);
      }
      return redirect('/')->with(['message'=>'У вас нет прав!']);
    }

    public function update_pass(createTaskRequest $request, $id){
      $myData = Test::find($id);
      $myData->fill([
        'name' => ($request->name),
       'email' => ($request->email),
      'password' => Hash::make($request->password),
      'remember_token'=>Hash::make($request->password),
      'id_roles'=>($request->id_roles),
      ]);
    $myData->save();
    return redirect()->back()->with(['message'=>'Данные успешно изменены!']);
    }


    public function show($id)
    {
      $myData = test::find($id);
      $myRole = Roles::all();
      if (Gate::denies('for-admin')){
        return view('units.show',['myData'=>$myData],['myRole'=>$myRole]);
      }
      return redirect('/')->with(['message'=>'У вас нет прав!']);

    }
    public function delete($id)
    {
      if (Gate::denies('for-admin')){
        test::find($id)->delete();
        return redirect()->route('units.index');
      }
     return redirect('/')->with(['message'=>'У вас нет прав!']);
    }

    public function edit($id)
    {
      $myRole = Roles::all();
      $myData = Test::find($id);
      if (Gate::denies('for-admin')){
        return view('units.edit',['myData'=>$myData],['myRole'=>$myRole]);
      }
      return redirect('/')->with(['message'=>'У вас нет прав!']);

    }

    public function updateProfil(createTaskRequest $request, $id)
    {
      $myData = Test::find($id);
      $email_request = $request;
      $email = test::all();

       if($email_request->email == $myData->email){
         $myData->fill([
         'name' => ($request->name),
         'password' => $request->password,
         'remember_token'=>$request->password,
         'id_roles'=>($request->id_roles),
       ]);
       $myData->save();
       return redirect()->back()->with(['message'=>'Данные успешно изменены!']);
       }
       else {
        foreach ($email as $mail) {
          if(($mail->email && $mail->id) != ($email_request->email && $email_request->id)){
            return redirect()->back()->with(['message'=>'Данный email уже используется!']);
          }
          else {
            $myData->fill([
            'name' => ($request->name),
           'email' => ($request->email),
            'password' => $request->password,
            'remember_token'=>$request->password,
            'id_roles'=>($request->id_roles),
          ]);
          $myData->save();
          return redirect()->back()->with(['message'=>'Данные успешно изменены!']);
          }
        }
       }
    }

    public function create()
        {
          $myRole = Roles::all();
          if (Gate::denies('for-admin')){
            return view('units.create',['myRole'=>$myRole]);
          }
          return redirect()->back()->with(['message'=>'У вас нет прав!']);
        }

    public function store(createTaskRequest $request)
    {
      $user = Auth::user();
      $data = $request->all();

      Test::create([
          'name' => ($request->name),
         'email' => ($request->email),
          'password' => Hash::make($request->password),
          'remember_token'=>Hash::make($request->password),
          'id_roles'=>($request->id_roles),
      ]);
      $email = $request->email;
      Mail::send('mail',['data'=>$request], function($message) use($email)
      {
          $message->from('689141231d-b4eeef@inbox.mailtrap.io', 'Laravel');
         $message->to($email)->subject('test');
      });

      return redirect()->route('units.index');
    }

    public function profil($id){
      $myData = Test::find($id);
      return view('units.profil_user',['myData'=>$myData]);
    }

    public function send(createTaskRequest $request){
      Mail::send(['text'=>'mail'],['name','Admin'],function($message){
        $message->to($request->email,'webblog')->subject('test email');
        $message->from('testlaravel3334@gmail.com','Admin');
      });
    }


}
