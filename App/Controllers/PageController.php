<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;

class PageController extends Controller
{
    public static function index()
    {
        $articles = Article::select()->where('web_id', 2)->orderBy('id', 'desc')->limit(6)->get();
        
        self::createView('index', [
            'pageHeader' => [
                'pageTitle' => '',
                'pageDesc' => '',
                'url' => '/'
            ],
            'articles' => $articles,
        ]);
    }

    public static function register()
    {
        self::createView('register', [
            'pageHeader' => [
                'pageTitle' => 'สมัครสมาชิก',
                'pageDesc' => '',
                'url' => '/สมัครสมาชิก'
            ],
            'partnerInContainer' => true,
        ]);
    }

    public static function casino()
    {
        $articles = Article::select()->where('web_id', 2)->orderBy('id', 'desc')->limit(6)->get();

        self::createView('casino', [
            'pageHeader' => [
                'pageTitle' => 'คาสิโน',
                'pageDesc' => '',
                'url' => '/คาสิโน'
            ],
            'partnerInContainer' => true,
            'articles' => $articles,
        ]);
    }

    public static function bacara()
    {
        $articles = Article::select()->where('web_id', 2)->orderBy('id', 'desc')->limit(6)->get();

        self::createView('bacara', [
            'pageHeader' => [
                'pageTitle' => 'บาคาร่า',
                'pageDesc' => '',
                'url' => '/บาคาร่า'
            ],
            'partnerInContainer' => true,
            'articles' => $articles,
        ]);
    }

    public static function slot()
    {
        $articles = Article::select()->where('web_id', 2)->orderBy('id', 'desc')->limit(6)->get();

        self::createView('slot', [
            'pageHeader' => [
                'pageTitle' => 'สล็อต',
                'pageDesc' => '',
                'url' => '/สล็อต'
            ],
            'partnerInContainer' => true,
            'articles' => $articles,
        ]);
    }

    public static function football()
    {
        $articles = Article::select()->where('web_id', 2)->orderBy('id', 'desc')->limit(6)->get();

        self::createView('football', [
            'pageHeader' => [
                'pageTitle' => 'แทงบอล',
                'pageDesc' => '',
                'url' => '/แทงบอล'
            ],
            'partnerInContainer' => true,
            'articles' => $articles,
        ]);
    }

    public static function promotion()
    {
        $articles = Article::select()->where('web_id', 2)->orderBy('id', 'desc')->limit(6)->get();

        self::createView('promotion', [
            'pageHeader' => [
                'pageTitle' => 'โปรโมชั่น',
                'pageDesc' => '',
                'url' => '/โปรโมชั่น'
            ],
            'partnerInContainer' => true,
            'articles' => $articles,
        ]);
    }

    public static function contact()
    {
        $articles = Article::select()->where('web_id', 2)->orderBy('id', 'desc')->limit(6)->get();

        self::createView('contact', [
            'pageHeader' => [
                'pageTitle' => 'ติดต่อเรา',
                'pageDesc' => '',
                'url' => '/ติดต่อเรา'
            ],
            'partnerInContainer' => true,
            'articles' => $articles,
        ]);
    }

    public static function entry()
    {
        $articles = Article::select()->where('web_id', 2)->orderBy('id', 'desc')->limit(6)->get();

        self::createView('entry', [
            'pageHeader' => [
                'pageTitle' => 'ทางเข้าเล่น',
                'pageDesc' => '',
                'url' => '/ทางเข้าเล่น'
            ],
            'partnerInContainer' => true,
            'articles' => $articles,
        ]);
    }

    public static function articles(int $pageNo = 1)
    {
        if (isset($_GET['pageNo'])) header('location: /news/'.$_GET['pageNo']);        
        $_GET['pageNo'] = $pageNo;

        $itemsPerPage = 6;

        $articles = Article::select()->where('web_id', 2)->page($pageNo-1, $itemsPerPage)->get();
        $pagination = self::paginate(Article::select()->where('web_id', 2)->count(), $itemsPerPage);

        self::createView('articles', [
            'pageHeader' => [
                'pageTitle' => 'บทความ',
                'pageDesc' => '',
                'url' => '/บทความ'
            ],
            'partnerInContainer' => true,
            'currentPage' => $pageNo,
            'pagination' => $pagination,
            'articles' => $articles,
        ]);
    }

    public static function showArticle(string $articleSlug)
    {
        $articleSlug = urlencode( urldecode($articleSlug) );
        $article = Article::select()->where('web_id', 2)->where('slug', $articleSlug)->one();

        if (!$article) return self::notFound();

        self::createView('showArticle', [
            'pageHeader' => [
                'pageTitle' => $article['title'],
                'pageDesc' => '',
                'url' => '/บทความ/'.$article['slug']
            ],
            'partnerInContainer' => true,
            'article' => $article,
        ]);
    }

    public static function notFound()
    {        
        self::createView('404', [
            'pageHeader' => [
                'pageTitle' => '404 ไม่พบหน้าที่ระบุ',
                'pageDesc' => '',
                'url' => ''
            ],
        ]);
    }
}