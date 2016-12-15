<?php

namespace App;

class Sessions
{
    public static function startSession() 
    {

        if ( session_id() ) return true;
        else return session_start();

    }

    public static function destroySession() 
    {
        
        if ( session_id() ) {
            
            setcookie(session_name(), session_id(), time()-60*60*24);
            
            session_unset();
            session_destroy();
        }
    }
}
