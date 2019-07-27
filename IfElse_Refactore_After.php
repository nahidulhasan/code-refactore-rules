<?php

class PostController2 {

    public function store()
    {
        $input = Request::all();

        // we can do it before submit request
       /* $validation = Validator::make($input);

        if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }*/

        post::create($input);
        return Redirect::home();
    }

}