<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function scopeComments() {
        return $this->where('comment', true);
    }

    
}
