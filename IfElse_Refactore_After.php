<?php

class PostController2 {

    public function store()
    {
        $input = Request::all();

        $validation = Validator::make($input);

        if(date('l') === 'Friday')
        {
            throw new Exception('We do not work on Friday');
        }

        if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        post::create();
        return Redirect::home();
    }

}