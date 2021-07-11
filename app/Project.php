<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\SourceArticle;
use App\ResultingArticle;
use App\RelatedFile;

class Project extends Model
{
    public function sourceArticles() {
        return $this->belongsToMany(SourceArticle::class);
    }
    
    public function resultingArticles() {
        return $this->hasMany(ResultingArticle::class);
    }

    public function files() {
        return $this->hasMany(RelatedFile::class);
    }
}
