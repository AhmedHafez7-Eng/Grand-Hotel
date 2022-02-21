<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ClickEvent extends Component
{
    public $message = '';
    public $user_id = 42;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.click-event')->extends('layouts.app');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function callFunction()
    {
        $this->message = "You clicked on button";
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function callFunctionArg($user_id)
    {
        $this->message = $user_id;
    }

}
