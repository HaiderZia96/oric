<?php
namespace App\Service;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Throwable;

class TufHttp{


    public $baseUrl;
    public $email;
    public $password;
    public $sender;
    public $tufAccessToken;
    public function __construct()
    {
        $this->baseUrl = Config::get('services.tuf.tuf_api');
        $this->email = Config::get('services.tuf.tuf_email');
        $this->password = Config::get('services.tuf.tuf_password');
        $this->sender = Config::get('services.tuf.sender');
    }
    //Tuf Get Request
    public function tufRequest($url,$type,$options){
        try {
            if (empty($options)){
                $options=[];
            }
            $this->tufAccessToken = session()->get('tuf_access_token');
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$this->tufAccessToken
            ];
            $request = new Request($type, $url, $headers);
            $res = $client->sendAsync($request,$options)->wait();
            $getBody =$res->getBody()->getContents();
            $jsonBody = json_decode($getBody);
            return $jsonBody->data;
        }
        catch (Throwable $th) {
            $code = $th->getCode();
            if ($code == 401) {
                if(!is_null(session()->get('tuf_access_token'))){
                    $this->logout();
                }
                $this->getTufAccessToken();
            }
        }
    }
    //Get Access Token
    public function getTufAccessToken(){
        $client = new Client();
        $headers = [
            'Accept' => 'application/json'
        ];
        $requestUrl = $this->baseUrl.'login?email='.$this->email.'&password='.$this->password;
        $request = new Request('POST', $requestUrl, $headers);
        $res = $client->sendAsync($request)->wait();
        $getBody = $res->getBody()->getContents();
        $jsonBody = json_decode($getBody);
        $token = $jsonBody->data->user->token;
        session()->put('tuf_access_token',$token);
        return $token;
    }
    //Logout
    public function logout(){
        $client = new Client();
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$this->tufAccessToken
        ];
        $request = new Request('POST', $this->baseUrl . 'logout', $headers);
        $res = $client->sendAsync($request)->wait();
        echo $res->getBody();
    }
}
