<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * het ophalen van pagina's met status active
     * 
     * @param $query
     * @param $url
     * 
     * @return mixed
     */
    public function scopeActivePage($query, $url){
        return $query->where(
            [
                ['active', '=', 1],
                ['url','=', $url],
                
            ])->firstOrFail();
    }
}