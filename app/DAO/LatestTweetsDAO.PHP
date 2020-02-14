<?php

namespace App\DAO;

use App\Model\TweetModel;
use App\Tweets;
use Illuminate\Support\Collection;

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
     * @param [Object] $origin 変換元
     * @return TweetModel 変換結果
     */
    private function toTweetModel(Object $origin): TweetModel
    {
        $model = new TweetModel();
        $model->content = (string) $origin->content;
        return $model;
    }
}
