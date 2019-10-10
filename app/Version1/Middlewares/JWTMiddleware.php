<?php

use Tymon\JWTAuth\Facades\JWTAuth;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class JWTMiddleware
{

    public function handle($request, \Closure $next, $guard = null) {

        if (!$token = JWTAuth::getToken()) {
            return response()->json(['token' => 'token_not_provided'], 400);
        }        

        try {

            $user = JWTAuth::authenticate($token);
            // $authuser = JWTAuth::toUser(JWTAuth::getToken());
            // $user = JWTAuth::parseToken()->authenticate();

            // $payload = JWTAuth::parseToken()->getPayload();

            if(!$user) {
                return response()->json(['token' => 'invalid_credentials'], 401);
            }
    
            Setter('user', $user);
            
            $response = $next($request);
    
            # jika dijalankan old-token akan dihapus
            # status menjadi logout
            // JWTRevoke();        
            
            return $response;            

        } catch (JWTException $e) {

            // something went wrong
            // return JWTResolver(['token' => 'could_not_create_token'], $e);
            return response()->json(['error' => 'could_not_create_token'], 500);

        } catch (TokenExpiredException $e) {

            // return JWTResolver(['token' => 'token_expired'], $e);
            return response()->json(array('token' => 'token_expired'), $e->getStatusCode());

        } catch (TokenInvalidException $e) {

            // return JWTResolver(['token' => 'token_invalid'], $e);
            return response()->json(array('token' => 'token_invalid'), $e->getStatusCode());

        } catch (JWTException $e) {

            // return JWTResolver(['token' => 'token_absent'], $e);
            return response()->json(array('token' => 'token_absent'), $e->getStatusCode());
            
        }
    }

    public function terminate($request, $response) {
        return "protocol clear";
    }

}