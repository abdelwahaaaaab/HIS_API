<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Appointment as AppointmentResource;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\API\AuthController as AuthController;


class AppointmentController extends BaseController
{
    
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            
                'Name' => 'required|max:50',
                'Email' => 'required|email',
                'Phone' => 'required|min:11',
                'Dname' => 'required|max:50',
                'Date' => 'required|unique:appointments|after_or_equal:now'
            ]
        );
        if($validator->fails())
        {
            return $this->SendError('Invalid', $validator->errors());
        }
        else
        {
            $user = Auth::user();
            $input = $request->all();
            //$input['user_id'] = $user->id;
            $result = Appointment::create($input);
            return $this->SendResponse($result, 'The Appointment Booked Successfully'); 
        }
    }

}
