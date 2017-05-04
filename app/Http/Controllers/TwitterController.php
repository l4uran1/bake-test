<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exceptions\TwitterApiException;
use Twitter;

class TwitterController extends Controller {

    /**
     * Function to show the home page
     * @param Request $request
     * @return type
     */
    public function viewHome(Request $request) {
        //return the home view
        return view(
            'welcome', []
        );
    }
    
    public function errorHandler($error) {
        return true;
    }
    
    /**
     * Function to search in Twitter by a specific user
     * @param Request $request
     * @return json
     * @throws TwitterApiException
     */
    public function searchByUser(Request $request) {
        try {
            $user = $request->input('user');
            $userTweets = Twitter::getUserTimeline(['count' => 15, 'screen_name' => $user]);
        } catch (Exception $e) {
            throw new TwitterApiException($e->getMessage());
        }
        
        //return the tweets
        return $userTweets;
    }
    
    /**
     * Function to search in Twitter by criteria
     * @param Request $request
     * @return json
     * @throws TwitterApiException
     */
    public function searchByCriteria(Request $request) {
        try {
            $criteria = $request->input('criteria');
            $lastTweets = Twitter::getSearch(['count' => 15, 'q' => '#'.$criteria]);
            $lastTweets = $lastTweets->statuses;
        } catch (Exception $e) {
            throw new TwitterApiException($e->getMessage());
        }
        
        //return the tweets
        return $lastTweets;
    }
}