<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    protected $fillable = ['title', 'url','content', 'publish_date', 'user_id'];

    /**
     * weergave van de datum vormgeven
     * 
     * @return static
     */
    public function getDate(){
        $carbonDate = Carbon::now();
        $carbonDate->timestamp(strtotime($this->publish_date))
                   ->timezone('Europe/Amsterdam')
                   ->setLocale('nl');

        return $carbonDate;
    }

    /**
     * Haal alleen de gepubliceerde berichten op
     * met een limit van 3
     * 
     * @param       $query
     * @param int   $limit
     * 
     * @return mixed
     */
    public function scopePublished( $query, $limit=3 ){
        return $query->orderBy('publish_date', 'desc')
                    ->limit( $limit )
                    ->get();
    }



}
