<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    //
    public function creating(Article $atr)
    {
        $atr->ip = request()->ip();
    }
}
