<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;

class BookController extends Controller
{
    public function get_rakuten_items()
    {
        $client = new RakutenRws_Client();
        
        define('RAKUTEN_APPLICATION_ID', config('app.rakuten_application_id'));
        
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);
        
        $response = $client->execute('BooksTotalSearch', array(
            'keyword' => '日常',
            'hits' => 3
        ));
        
        if(!$response->isOk()){
            return 'Error:'.$response->getMessage();
        } else {
            $items = array();
            foreach($response as $key){
                $items[] = $key;
                }
            return view('home.newbooks')->with([
                'items' => $items,
                ]);
            }
    }
}

