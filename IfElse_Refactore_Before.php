<?php

class PostController {

    public function store()
    {
        $input = Request::all();

        $validation = Validator::make($input);

        if(date('l') !== 'Friday')
        {
            if($validation->passes())
            {
                post::create();

                return Redirect::home();

            }else{
               return Redirect::back()->withInput()->withErrors($validation);
            }

        } else{
             throw new Exception('We do not work on Friday');
        }
    }

}