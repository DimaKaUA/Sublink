<?php

namespace App\Http\Controllers;
use App\Link;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class LinkController extends Controller
{


    /**
     * Redirect to hided links.
     *
     * @return Response
     */
    public function redirect($redirecting_link, Request $request)
    {
        $link_for_form = $redirecting_link;
        $redirecting_link = $_SERVER['HTTP_HOST'] . '/' . $redirecting_link; 
        $link = Link::where('redirecting_link', $redirecting_link)->firstOrFail();
        
        if ($link->expiry_date) {
            date_default_timezone_set('Europe/Kiev'); 
            $current_date = date("Y-m-d H:i:s");
            if (strtotime($link->expiry_date) < strtotime($current_date)) {
                return abort(404);
            } 
        }

        if ($link->password) {
            if ($request->isMethod('get')) {
                return view('layout', [
                                       'page'             => 'password.php',
                                       'redirecting_link' => $link_for_form
                                      ]);
            }
            if ($request->isMethod('post') && !password_verify($request->password, $link->password)) {
                return view('layout', [
                                       'page'             => 'password.php',
                                       'error'            => 'wrong password', 
                                       'redirecting_link' => $link_for_form
                                      ]);
            }
        }
        
        return redirect($link->hided_link);
    }

    /**
     * Show form for new link.
     *
     * @return Response
     */
    public function new(Request $request)
    {

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'hided_link'  => 'required|max:255',
                'expiry_date' => 'date_format:Y-m-d H:i:s',
                'password'    => 'max:10'
            ]);

            if ($validator->fails()) {
                $messages = $validator->messages();
                $message_link = $messages->first('hided_link');
                $message_date = $messages->first('expiry_date');
                return view('layout', [
                                       'page'         =>  'new.php',
                                       'hided_link'   =>  $request->hided_link,
                                       'expiry_date'  =>  $request->expiry_date,
                                       'message_link' =>  $message_link,
                                       'message_date' =>  $message_date
                                      ]);
            }

            $id = md5(uniqid(rand(), true));
            $link = new Link();
            $link->hided_link = $request->hided_link;
            $link->redirecting_link = $_SERVER['HTTP_HOST'] . '/' . $id;
            if ($request->expiry_date === '') {
                $link->expiry_date = null;
            } else {
                $link->expiry_date = $request->expiry_date;
            }
            $hash = password_hash($request->password, PASSWORD_DEFAULT);
            $link->password = $hash;
            $link->save();

            return view('layout', [
                                   'page'         =>  'new.php',
                                   'redirecting_link' => $link->redirecting_link 
                                  ]);
        };

        return view('layout', [
                               'page'         =>  'new.php'
                              ]);
    }

    /**
     * Show certain link.
     *
     * @return Response
     */
    public function show($id)
    {

        $link = Link::find($id);        
        
        return view('layout', [
                               'page'             => 'show.php',
                               'hided_link'       => $link->hided_link,
                               'redirecting_link' => $link->redirecting_link
                              ]);
    }

}
