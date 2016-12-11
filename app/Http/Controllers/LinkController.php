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
    public function redirect($redirecting_link, Request $request, Response $response)
    {
        $link_for_form = $redirecting_link;
        $redirecting_link = $_SERVER['HTTP_HOST'] . '/' . $redirecting_link; 
        $link = Link::where('redirecting_link', $redirecting_link)->firstOrFail();
        if ($link->password) {
            if ($request->isMethod('get')) {
                return view('password', ['error' => '', 'redirecting_link' => $link_for_form]);
            }
            if ($request->isMethod('post') && $link->password !== $request->password) {
                return view('password', ['error' => 'wrong password', 'redirecting_link' => $link_for_form]);;
            }
        }
        if ($link->expiry_date) {
            date_default_timezone_set('Europe/Kiev'); 
            $current_date = date("Y-m-d H:i:s");
            if (strtotime($link->expiry_date) < strtotime($current_date)) {
                return response(view('404'), 404);
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
                return view('new', [
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
            $link->expiry_date = $request->expiry_date;
            $link->password = $request->password;
            $link->save();

            return redirect()->route('show', ['id' => $link->id]);
        };

        return view('new', [
                'hided_link'   =>  '',
                'expiry_date'  =>  '',
                'message_link' =>  '',
                'message_date' =>  '',
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
        
        return view('show', [
                             'hided_link' => $link->hided_link,
                             'redirecting_link' => $link->redirecting_link
                            ]);
    }

    /**
     * Check the password.
     *
     * @return Response
     */
    public function checkPassword($redirecting_link)
    {
        if ($request->isMethod('post')) {
            # code...
        }

        return view('password', ['massage' => '']);
    }
}
