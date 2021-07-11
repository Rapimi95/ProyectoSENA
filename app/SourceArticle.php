<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Project;

class SourceArticle extends Model
{
    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}
