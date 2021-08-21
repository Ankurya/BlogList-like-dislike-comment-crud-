<?php

namespace App\Traits;


trait BlogPost {

    public function scopeStatus($query, $value)
    {
        return $query->where('status', $value);
    }
}
