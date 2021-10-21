<?php
namespace App\Http\Controllers;

date_default_timezone_set('America/Santiago');

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RayenController extends Controller
{
    public function getUrgencyStatus() {
        $date=date('Ymd');
        $url_base = 'https://api.saludenred.cl/api/healthCareCenter/';
        $url_query = '/emergencyAdmissions?fromDate=';
        
        $establecimientos = [
            'SAPU Aguirre' => [
                'id'    => 4198,
                'token' => env('RAYEN_TOKEN_AGUIRRE')],
        ];
        
        foreach ($establecimientos as $nombre => $valores) {
            $client = new Client(['headers' => [ 'Authorization' => $valores['token']]]);
            try {
                $response = $client->get($url_base . $valores['id'] . $url_query . $date);
            } catch (RequestException $e) {
                die($e->getMessage());
            }
            $array = array_count_values(array_column(json_decode($response->getBody(),true),'AdmissionStatus'));
        
            $count['data'][$nombre]['En espera'] = 0;
            $count['data'][$nombre]['En box'] = 0; //12, 99, 100
        
            if(isset($array[1])) {
                $count['data'][$nombre]['En espera'] = $array[1];
            }
        
            if(isset($array[12])) {
                $count['data'][$nombre]['En box'] += $array[12];
            }
            if(isset($array[99])) {
                $count['data'][$nombre]['En box'] += $array[99];
            }
            if(isset($array[100])) {
                $count['data'][$nombre]['En box'] += $array[100];
            }
            //echo $nombre; print_r($array);
        }
        $count['updated'] = date('Y-m-d H:i');
        echo '<pre>';
        print_r(json_encode($count));
    }
}
