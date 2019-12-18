<?php

if (!function_exists('JWTCreate')) {
    function JWTCreate($payload)
    {
        $expiration_date = \Carbon\Carbon::now()->addWeeks(1)->timestamp;

        $custom_claims = [
            'exp'       => $expiration_date,
            'scopes'    => [$payload->position_employee], //[TrimString(ucfirst($payload->position_employee))],
            'key'       => 'muhamad duki' . Hash::make($payload->uuid),
        ];

        return JWTAuth::fromUser($payload, $custom_claims);
    }
}

if (!function_exists('JWTClaim')) {
    function JWTClaim()
    {
        try {
            # retrieve authenticated custom_claims
            return JWTAuth::parseToken()->getPayload()->toArray();
        } catch (TokenExpiredException $e) {
            return response()->json(['token' => 'token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token' => 'token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['token' => 'token_absent'], $e->getStatusCode());
        }
    }
}

if (!function_exists('JWTToken')) {
    function JWTToken()
    {
        try {
            # retrieve token
            return JWTAuth::getToken();
        } catch (TokenExpiredException $e) {
            return fallback(['token' => 'token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return fallback(['token' => 'token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return fallback(['token' => 'token_absent'], $e->getStatusCode());
        }
    }
}

if (!function_exists('JWTRevoke')) {
    function JWTRevoke()
    {
        try {
            // if (JWTAuth::invalidate(JWTToken())) {
            if (!JWTAuth::parseToken()->invalidate()) {
                return fallback(['token' => 'user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return fallback(['token' => 'token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return fallback(['token' => 'token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return fallback(['token' => 'token_absent'], $e->getStatusCode());
        }
    }
}

if (!function_exists('JWTUser')) {
    function JWTUser()
    {
        try {
            # retrieve authenticated user
            return JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            return fallback(['token' => 'token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return fallback(['token' => 'token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return fallback(['token' => 'token_absent'], $e->getStatusCode());
        }
    }
}

if (!function_exists('JWTRefresh')) {
    function JWTRefresh()
    {
        try {
            # Regenerate new token based on last token valid
            return JWTAuth::refresh(JWTToken());
        } catch (TokenExpiredException $e) {
            return fallback(['token' => 'token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return fallback(['token' => 'token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return fallback(['token' => 'token_absent'], $e->getStatusCode());
        }
    }
}
