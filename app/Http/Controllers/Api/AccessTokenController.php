<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessTokenFactory;
class AccessTokenController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'first_name'=>'min:3 | max:15',
            'last_name'=>'min:3 | max:15',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required',

        ]);
    
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'password_confirmation' => $request->password,
        ]);
    
        return response()->json(['message' => 'User registered successfully']);
    }
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string|email',
        'password' => 'required|string',
        'device_name' =>'required' ,
    ]);
    $user = User::where('email' , $request->username)->first();

if(!$user || !Hash::check($request->password , $user->password)){
    return response()->json(['message'=> 'Invalid username and password '],401);
}

$token = $user->createToken($request->device_name);

return response()->json([
    'token' => $token->plainTextToken,
    'user' => $user,
]);
}

public function logout()
    {
        $user = User::find(Auth::id());

        //revoke(delete) all user tokens
        $user->tokens()->delete();

        return response()->json(['message'=>'successful logout '],200);

        //revoke(delete) current access token
        // $user->currentAccessToken()->delete();
    }


    public function sendPasswordResetLinkEmail(Request $request) {
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink(
			$request->only('email')
		);

		if($status === Password::RESET_LINK_SENT) {
			return response()->json(['message' => __($status)], 200);
		} else {
			throw ValidationException::withMessages([
				'email' => __($status)
			]);
		}
	}

    public function resetPassword(Request $request) {
		$request->validate([
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
		]);

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) use ($request) {
				$user->forceFill([
					'password' => Hash::make($password)
				]);

                // $user->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		if($status == Password::PASSWORD_RESET) {
			return response()->json(['message' => __($status)], 200);
		} else {
			throw ValidationException::withMessages([
				'email' => __($status)
			]);
		}
	}
     public function refresh(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['token' => $user->createToken('access Token')->plainTextToken , 'message'=>'successful refresh '], 200);
    }

 }