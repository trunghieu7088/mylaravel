<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $message;
    public $status;
    public function __construct($message,$status)
    {
         $this->message = $message;
         $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        switch ($this->status) {
        case "success":
            return view('components.alert_success');
            break;
        case "fail":
            return view('components.alert_fail');
            break;
        default:
            return view('components.alert_fail');
            break;
        }       
        
    }
}
