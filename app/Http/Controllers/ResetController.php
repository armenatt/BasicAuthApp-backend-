<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetRequest;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    public function resetPassword(ResetRequest $request)
    {
        $email = $request->email;
        $token = $request->token;
        $password = \Hash::make($request->password);

        $parameter = $request->

        $emailCheck = \DB::table('password_resets')->where('email', $email)->first();
        $pinCheck = \DB::table('password_resets')->where('token', $token)->first();

        if (!$emailCheck) {
            return response([
                'message' => 'Email Not Found'
            ], 401);
        }

        if (!$pinCheck) {
            return response([
                'message' => 'Pin Code Invalid'
            ], 401);
        }

        \DB::table('users')->where('email', $email)->update(['password' => $password]);
        \DB::table('password_resets')->where('email', $email)->delete();

        return response([
            'message' => 'Password Changed Successfully'
        ], 200);
    }
}
