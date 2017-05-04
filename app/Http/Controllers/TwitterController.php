<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exceptions\TwitterApiException;
use Twitter;

class TwitterController extends Controller {

    public function viewHome(Request $request) {
        //return the home view
        return view(
            'welcome', []
        );
    }
    
    public function searchByUser(Request $request) {
        try {
            $user = $request->input('user');
        } catch (Exception $e) {
            return new TwitterApiException($e->getMessage());
        }
        
        $userTweets = Twitter::getUserTimeline(['count' => 15, 'screen_name' => $user]);

        //return the tweets
        return $userTweets;
    }
    
    public function searchByCriteria(Request $request) {
        try {
            $criteria = $request->input('sriteria');
        } catch (Exception $e) {
            throw new TwitterApiException($e->getMessage());
        }
        
        $lastTweets = Twitter::getSearch(['count' => 15, 'q' => '#'.$criteria]);

        //return the tweets
        return $lastTweets->statuses;
    }
}