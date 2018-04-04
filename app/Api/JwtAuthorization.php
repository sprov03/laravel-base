<?php

namespace App\Api;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

/**
 * This class provides the interface to JSON Web Tokens (JWT).
 *
 * @see https://tools.ietf.org/html/rfc7519 JWT Standard
 * @see https://github.com/firebase/php-jwt Package used for encoding
 */
class JwtAuthorization
{

    /**
     * Generates a new token and returns it.
     *
     * @todo determine if this is dead code as its only caller is never called
     * @todo may have unintended session invalidating properties (always a new
     *       token is generated)
     *
     * @return string
     */
    public function tokenGetToken()
    {
        $token = $this->encodeToken();
        $this->setTokenCookie($token);

        return $token;
    }

    /**
     * Puts the token into the HTTP headers. Will generate a new one if one is
     * not provided.
     *
     * @param string $token a previously signed token; defaults to null
     */
    public function setTokenCookie($token = null)
    {
        if (is_null($token)) {
            $token = $this->encodeToken();
        }

        setcookie('jwt', $token, $this->expireTime(), '/');
    }


    /**
     * Creates a new encoded JWT token value signed with the app key
     *
     * @return string
     */
    private function encodeToken()
    {
        return JWT::encode($this->makeToken(), Config::get('jwt.secret'));
    }

    /**
     * Creates a new JWT token payload
     *
     * @return array
     */
    private function makeToken()
    {
        return [
            "sub" => Auth::id(),
            "iss" => Config::get('app.url'),
            "iat" => time(),
            "exp" => $this->expireTime(),
            "nbf" => time(),
            "acn" => Auth::user()->account_number
        ];
    }

    /**
     * Calculates the JWT token expiration time based on the current time +
     * expiry duration in seconds.
     *
     * @return int
     */
    private function expireTime()
    {
        return time() + Config::get('jwt.expiry'); // in seconds
    }
}
