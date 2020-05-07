<?php

namespace App\Providers;

use App\Models\Article;
use App\Observers\ArticleObserver;
use DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    //视图数据共享
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //底部友情链接
        $left = DB::table('list1')->pluck('title');
        $mide= DB::table('list2')->pluck('title');
        $righ= DB::table('list3')->pluck('title');
        $footarr = ['行路难'=>$left,'蜀道难'=>$mide,'更多资源'=>$righ];
        View::share('footarr', $footarr);

        #观测者注册
        Article::observe(ArticleObserver::class);
    }
}
