<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\TufHttp;
use Illuminate\Support\Facades\Config;
use URL;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;

class NewsEventsFrontController extends Controller
{
    // public function newsEvents(){

    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function main($uri, $type, $options)
    {
        $tufHttp = new TufHttp();
        $url = $tufHttp->baseUrl . $uri;
        $data = $tufHttp->tufRequest($url, $type, $options);
        return $data;
    }

    public function dataAccessibility()
    {
        $type = 'GET';
        $options = '';
        $data = [
            'categories' => $this->main('news-categories', $type, $options),
            'societies' => $this->main('news-societies', $type, $options),
            'projects' => $this->main('news-projects', $type, $options),
            'departments' => $this->main('news-departments', $type, $options),
            'faculties' => $this->main('news-faculties', $type, $options),
            'tags' => $this->main('news-tags', $type, $options),
        ];
        return $data;
    }

    public function postSearch(Request $request)
    {

        $otherData = $this->dataAccessibility();
        $baseUrl = Config::get('services.tuf.tuf_api') . "news-events/";

        $slashNo = 6;

        $requestUrl = URL::full();

        $last = explode("/", $requestUrl, $slashNo + 1);

        $sender = Config::get('services.tuf.sender');
        $finalUrl = $baseUrl . $last[$slashNo] . '&sender_type=' . $sender . '&' . 'page=' . request()->page . '&' . 'searchType='.$request->searchType;

        $tufHttp = new TufHttp();
        $res = $tufHttp->tufRequest($finalUrl, 'GET', '');

        $returningData = null;
        if ($res != null) {
            $returningData = $res->data;
        }

        $deptData = [];
        if ($res != null) {
            foreach ($otherData['departments'] as $depts) {
                foreach ($returningData as $arrayData) {
                    if ($arrayData->department_id == $depts->id) {
                        $arrayData->department_id = (array)$depts;
                    }
                }
            }
        }

        $currentPage = $res->current_page;
        $perPage = $res->per_page;
        $totalItems = $res->total;
        $items = $res->data;
        // Create a LengthAwarePaginator instance
        $paginator = new LengthAwarePaginator($items, $totalItems, $perPage, $currentPage);
        $paginator->withPath(route('news-events-search'));
        return view('front.search_news_events', compact('res', 'returningData','paginator'));
    }

    // public function getNewsEventWithSearchFilter(Request $request){
    //     $baseUrl = Config::get('services.tuf.tuf_api')."news-events/";

    //     $slashNo =  7;
    //     $requestUrl = URL::full();
    //     $last = explode("/", $requestUrl, $slashNo+1);

    //     $sender = Config::get('services.tuf.sender');
    //     $finalUrl = $baseUrl.$last[$slashNo].'&sender_type='.$sender;

    //     $type = 'GET';
    //     $options = '';

    //     $tufHttp = new TufHttp();
    //     $this->tufAccessToken = $tufHttp->getTufAccessToken();
    //     $client = new \GuzzleHttp\Client();
    //     $res = $client->get($finalUrl, ['headers' =>  [
    //                     'Accept' => 'application/json',
    //                     'Authorization' => 'Bearer '.$this->tufAccessToken]
    //     ]);
    //                 // dd($res);
    //     return $res->getBody();
    // }


    //Get News & Events details
    public function newsEventDetails($slug)
    {
        $otherData = $this->dataAccessibility();
        $sender = Config::get('services.tuf.sender');
        $baseUrl = Config::get('services.tuf.tuf_api') . "news-events/";

        $slashNo = 4;

        $requestUrl = URL::full();

        $last = explode("/", $requestUrl, $slashNo + 1);
        $sender = Config::get('services.tuf.sender');
        $finalUrl = $baseUrl . $last[$slashNo] . '?sender_type=' . $sender;


        $tufHttp = new TufHttp();
        $newsEvents = $tufHttp->tufRequest($finalUrl, 'GET', '');


        $recentNewsEvents = Config::get('services.tuf.tuf_api') . "news-events/recent-news-events";
        $recentEvents = $recentNewsEvents . '?sender_type=' . $sender;
        $relatedPostNewsEvents = $tufHttp->tufRequest($recentEvents, 'GET', '');

        return view('front.news_events_detail', compact('newsEvents', 'relatedPostNewsEvents'));
    }

    public function index(Request $request)
    {
        $sender = Config::get('services.tuf.sender');
        $otherData = $this->dataAccessibility();
        $indexNewsAndEvents = Config::get('services.tuf.tuf_api') . "news-events" . '?sender_type=' . $sender;

        $type = 'GET';
        $options = '';

        $tufHttp = new TufHttp();
        $returningData = $tufHttp->tufRequest($indexNewsAndEvents, $type, $options);

        $indexRecentNewsDate = Config::get('services.tuf.tuf_api') . "news-events/recent-posts" . '?sender_type=' . $sender;
        $recentEventDates = $tufHttp->tufRequest($indexRecentNewsDate, $type, $options);

        $indexNewsEventWithFilterData = Config::get('services.tuf.tuf_api') . "news-events/search-news-events" . '?sender_type=' . $sender . '&' . 'page=' . request()->page;
        $newsWithFilteration = $tufHttp->tufRequest($indexNewsEventWithFilterData, $type, $options);


        $recentNewsEvents = Config::get('services.tuf.tuf_api') . "news-events/recent-news-events";
        $recentEvents = $recentNewsEvents . '?sender_type=' . $sender;

        $relatedPostNewsEvents = $tufHttp->tufRequest($recentEvents, 'GET', '');

        $currentPage = $newsWithFilteration->current_page;
        $perPage = $newsWithFilteration->per_page;
        $totalItems = $newsWithFilteration->total;
        $items = $newsWithFilteration->data;
        // Create a LengthAwarePaginator instance
        $paginator = new LengthAwarePaginator($items, $totalItems, $perPage, $currentPage);
        $paginator->withPath(route('news-and-events'));

        return view('front.news_events', compact('returningData', 'otherData', 'recentEventDates', 'newsWithFilteration', 'relatedPostNewsEvents','paginator'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
