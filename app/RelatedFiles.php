<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Project;

class RelatedFiles extends Model
{
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
