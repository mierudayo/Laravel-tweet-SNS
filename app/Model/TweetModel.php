<?php
namespace App\Model;

/**
 * ビューに渡すツイートのモデル
 * 
 * @author Y.Takeuchi
 */
class TweetModel
{
    /**
     * ツイート内容
     *
     * @var [String]
     */
    public $content;

    /**
     * ツイート投稿者名
     *
     * @var [String]
     */
    public $author;

    /**
     * ツイート投稿日時
     *
     * @var [String]
     */
    public $registDate;

    public function __construct()
    {
        $this->content = "";
        $this->author = "";
        $this->registDate = "";
    }
}