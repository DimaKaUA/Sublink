<?php

namespace App\Http\Controllers;
use App\User;
use App\Sessions;
use Validator;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AuthController extends Controller
{

    /**
     * Show and varify registration form .
     *
     * @return Response
     */
    public function signUp(Request $request)
    {

        if ( $request->isMethod('post') ) {

            $validator = Validator::make($request->all(), [
                'name'     => 'required|max:10',
                'password' => 'required|max:11',
                'email'    => 'required|email'
            ]);

            if ( $validator->fails() ) {
                $messages = $validator->messages();
                $message_name = $messages->first('name');
                $message_password = $messages->first('password');
                $message_email = $messages->first('email');
                return view('layout', [
                                       'page'             =>  'sign_up.php',
                                       'name'             =>  $request->name,
                                       'password'         =>  $request->password,
                                       'email'            =>  $request->email,
                                       'message_name'     =>  $message_name,
                                       'message_password' =>  $message_password,
                                       'message_email'    =>  $message_email,
                                      ]);
            };

            $user = new User();
            $user->name = $request->name;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->remember_token = $user->email . $user->password;
            $user->save();
        
            return redirect()->route('sign_in');
        };

        return view('layout', [
                               'page' => 'sign_up.php'
                              ]);
    }

    /**
     * Show and varify login form .
     * 
     * @return Response
     */
    public function signIn(Request $request)
    {

        if ( $request->isMethod('post') ) {

            $validator = Validator::make($request->all(), [
                    'email'    => 'required|email',
                    'password' => 'required'
            ]);

            if ( $validator->fails() ) {
                $messages = $validator->messages();
                $message_email = $messages->first('email');
                $message_password = $messages->first('password');
                return view('layout', [
                                       'page'             =>  'sign_in.php',
                                       'email'            =>  $request->email,
                                       'message_email'    =>  $message_email,
                                       'message_password' =>  $message_password,
                                      ]);
            }

            if ( Sessions::startSession() ) {
                $remember_token = $request->email . $request->password;
                $user = User::where('remember_token', $remember_token)->first();

                if ($user) {
                    $_SESSION['current_user'] = $user->id;
                } else {
                    return view('layout', [
                                           'page'             =>  'sign_in.php',
                                           'email'            =>  $request->email,
                                           'message_password' =>  'wrong password'
                                          ]);
                }

            } else {
                Sessions::destroySession();
                return redirect()->route('sign_in');
            }

            return redirect()->route('new');
        }

        return view('layout', [
                               'page' => 'sign_in.php'
                              ]);
    }

    /**
     * Sign out and destroy session.
     * 
     * @return Response
     */
    public function signOut()
    {
        Sessions::startSession();
        Sessions::destroySession();
       
        return redirect()->route('new');
    }

    /**
     * Show user profile .
     * 
     * @return Response
     */
    public function profile()
    {
        if ( Sessions::startSession() ) {
            if ( !isset($_SESSION['current_user']) ) {
                Sessions::destroySession();
                return redirect()->route('sign_in');
            } else {
                $user = User::find($_SESSION['current_user']);
                $users_name = $user->name;
                $users_email = $user->email;
                $users_links = $user->links;
            }
        }
       
        return view('layout', [
                               'page'        => 'profile.php',
                               'users_name'  =>  $users_name,
                               'users_email' =>  $users_email,
                               'users_links' =>  $users_links,
                              ]);
    }
}
