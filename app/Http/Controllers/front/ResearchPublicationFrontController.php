<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\TufHttp;
use Illuminate\Support\Facades\Config;
use URL;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

class ResearchPublicationFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $url = "research-publications/";
    //     $slashNo =  7;
    //     $requestUrl = URL::full();
    //     // dd($requestUrl);

    //     $last = explode("/", $requestUrl, $slashNo+1);
    //     // dd($last);
    //     $sender = Config::get('services.tuf.sender');
    //     $finalUrl = $url.$last[$slashNo].'&sender_type='.$sender;
    //     dd($finalUrl);
    //     $type = 'GET';
    //     $options = '';

    //     $tufHttp = new TufHttp();
    //     dd($tufHttp);
    //     $url = $tufHttp->baseUrl.$url;
    //     dd($url);
    //     $data = $tufHttp->tufRequest($url,$type,$options);
    //     dd($data);

    //     $res_body = $res->getBody();
    //     return view('front.research_publications',compact('res_body'));
    // }
    public function index()
    {
        return view('front.research_publications');
    }

    public function getResearchIndexFront(Request $request){
        $baseUrl = Config::get('services.tuf.tuf_api')."research-publications/";
        /**
         * For Live Url Use 4 --- For Local Url Use 6
         */
        $slashNo =  4;
        $requestUrl = URL::full();
        $last = explode("/", $requestUrl, $slashNo+1);
        $sender = Config::get('services.tuf.sender');
//        $finalUrl = $baseUrl.$last[$slashNo].'&sender_type='.$sender;
        $finalUrl = $baseUrl.$last[$slashNo];
        $type = 'GET';
        $options = '';
        $tufHttp = new TufHttp();
        $this->tufAccessToken = $tufHttp->getTufAccessToken();
        $client = new \GuzzleHttp\Client();
        $res = $client->get($finalUrl, ['headers' =>  [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer '.$this->tufAccessToken]
                    ]);
        $contents = $res->getBody();
        $result = json_decode($contents, true);
        return $result['data'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
