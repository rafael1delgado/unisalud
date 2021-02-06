<?php
namespace App\Traits;

use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\File;

trait GoogleToken
{
    public function getToken()
    {
        $client_email = env('GOOGLE_CLIENT_EMAIL');
        $private_key_id = env('GOOGLE_PRIVATE_KEY_ID');
        $private_key  = File::get(app_path().'/Keys/google_private.key');
        $now_seconds = time();
        $payload = array(
            "iss" => $client_email,
            "sub" => $client_email,
            "aud" => "https://healthcare.googleapis.com/",
            "iat" => $now_seconds,
            "exp" => $now_seconds+(60*60),  // Maximum expiration time is one hour
            "uid" => $private_key_id
        );
        return JWT::encode($payload, $private_key, "RS256");
    }

    public function getUrlBase() {
        return env('FHIR_URL_BASE');
    }
}
