<?php
namespace App\Traits;

use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\File;

trait GoogleToken
{
    public function getToken()
    {
        //dd();
        // Ruta al archivo service account en App/Keys/service_account.json
        $service_account_path = base_path().'/'.env('GOOGLE_CLOUD_SERVICE_ACCOUNT');
        $service_account = json_decode(File::get($service_account_path), true);
        $now_seconds = time();
        $payload = array(
            "iss" => $service_account['client_email'],
            "sub" => $service_account['client_email'],
            "aud" => "https://healthcare.googleapis.com/",
            "iat" => $now_seconds,
            "exp" => $now_seconds+(60*60),  // Maximum expiration time is one hour
            "uid" => $service_account['private_key_id']
        );
        return JWT::encode($payload, $service_account['private_key'], "RS256");
    }

    public function getUrlBase() {
        return env('FHIR_URL_BASE');
    }
}
