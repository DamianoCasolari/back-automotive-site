<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Models\Lead;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'email|nullable',
            'phone_number' => 'numeric|required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }


        $newLead = Lead::create($request->all());

        Mail::to('info@giffe.it')->send(new NewLead($newLead));

        return response()->json([
            'success' => true,
        ]);
    }
}
