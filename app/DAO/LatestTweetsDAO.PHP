<?php

namespace App\DAO;

use App\Model\TweetModel;
use App\Tweets;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * 最新ツイートのDAO
 * 
 * @author Y.Takeuchi
 */
class LatestTweetsDAO
{
    /** 最新ツイートを表示する件数 */
    public const MAX_TWEETS_COUNT = 20;

    public function __construct()
    {
        // NOP
    }

    /**
     * 最新ツイートを取得する
     *
     * @return Collection 取得結果
     */
    public function get(): Collection
    {
        $result = Tweets::orderBy('created_at', 'desc')
            ->limit(LatestTweetsDAO::MAX_TWEETS_COUNT)
            ->get();
        return $result->map(function ($v) {
            return $this->toTweetModel($v);
        });
    }

    /**
     * DBから取得したデータをTweetモデルに変換する
     *
     * @param [Tweets] $origin 変換元
     * @return TweetModel 変換結果
     */
    private function toTweetModel(Tweets $origin): TweetModel
    {
        $model = new TweetModel();
        $model->content = (String) $origin->content;
        $model->registDate = ($origin->created_at instanceof Carbon)
            ? $origin->created_at->isoFormat('YYYY/MM/DD hh:mm:ss')
            : "投稿日不明";
        $model->author = (String) $origin->user->name;
        return $model;
    }
}
