<?php

namespace App\Traits;

trait Comments
{
    public function commentStatus($query,$value)
    {
        return $query->where('status',$value);
    }
}
