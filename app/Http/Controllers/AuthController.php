<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function responseWithToken($user, $token)
    {
        return [
            'res' => true,
            'message' => 'authenticated',
            'type' => 'Bearer',
            'token' =>  $token,
            'user' => $user,
        ];
    }

    public function loginEmail(Request $request)
    {
        try {
            if (!isset($request->email) || !isset($request->password)) {
                return response()->json([
                    'success' => false,
                    'msg' => 'unauthenticated',
                ], 401);
            };

            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::guard('web')->user();
                $token = $user->createToken('appToken')->accessToken;
                $dataLogin = $this->responseWithToken($user, $token);
                return response()->json($dataLogin, 200);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => 'credenciales_incorrectas',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'res' => false,
                'message' => 'unauthenticated',
                'error' => $th->getMessage(),
            ], 401);   
        };
    }

    public function loginIdentification(Request $request)
    {
        if (!isset($request->identification) || !isset($request->password)) {
            return response()->json([
                'res' => false,
                'message' => 'unauthenticated',
            ], 401);
        };
        if (Auth::guard('web')->attempt(['identification' => $request->identification, 'password' => $request->password])) {
            $user = Auth::guard('web')->user();
            $token = $user->createToken('appToken')->accessToken;
            $dataLogin = $this->responseWithToken($user, $token);
            return response()->json($dataLogin, 200);
        } else {
            return response()->json([
                'res' => false,
                'message' => 'credenciales_incorrectas',
            ], 401);
        }
    }
    public function getUserAutheticated(Request $request)
    {
        if (Auth::guard('api')->check()) {
            $user = auth()->guard('api')->user();
            $token = explode(" ", $request->header("authorization"))[1];
            $dataLogin = $this->responseWithToken($user, $token);
            return response()->json($dataLogin, 200);
        } else {
            return response()->json([
                'res' => false,
                'message' => 'unauthenticated',
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('api')->check()) {
            $accessToken = Auth::guard('api')->user()->token();
            DB::table('oauth_access_tokens')
                ->where('id', $accessToken->id)
                ->update([
                    'revoked' => true,
                ]);

            $accessToken->revoke();
            return response()->json([
                'success' => true,
                'msg' => 'success',
            ], 200);
        } else {
            return response()->json([
                'res' => false,
                'message' => 'unauthenticated',
            ], 401);
        }
    }

    public function refreshToken(Request $request)
    {
        if (Auth::guard('api')->check()) {
            $accessToken = Auth::guard('api')->user()->token();
            DB::table('oauth_access_tokens')
                ->where('id', $accessToken->id)
                ->update([
                    'revoked' => true,
                ]);
            $accessToken->revoke();
            $user = Auth::guard('api')->user();
            $token = $user->createToken('appToken')->accessToken;
            $dataLogin = $this->responseWithToken($user, $token);
            return response()->json($dataLogin, 200);
        } else {
            return response()->json([
                'res' => false,
                'message' => 'unauthenticated',
            ], 401);
        }
    }
}
