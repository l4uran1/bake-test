<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Twitter;

class TwitterController extends Controller {

    public function viewHome(Request $request) {
        //return the home view
        return view(
            'welcome', []
        );
    }
    
    public function searchByUser(Request $request) {
        if(!$request->input('user')) {
            echo "hello"; die();
        }
        $user = $request->input('user');
        
        $userTweets = Twitter::getUserTimeline();

        //return the tweets
        return $userTweets;
    }
    
    public function searchByCriteria(Request $request) {
        if(!$request->input('criteria')) {
            echo "hello"; die();
        }
        $criteria = $request->input('criteria');
        
        $lastTweets = Twitter::getSearch(['q' => '#'.$criteria]);

        //return the tweets
        return $lastTweets->statuses;
    }
}