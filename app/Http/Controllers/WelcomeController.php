<?php

namespace App\Http\Controllers;

use App\DAO\LatestTweetsDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Welcomeページのコントローラー
 * 
 * @author Y.Takeuchi
 */
class WelcomeController extends Controller
{
    public function index(Request $reqiest)
    {
        $dao = new LatestTweetsDAO();
        $latestTweets = $dao->get();
        return view('welcome', [
            'latestTweets' => $latestTweets
        ]);
    }
}
