<?php

class Artist extends Eloquent {
    protected $table = 'artists';
    protected $fillable = array('name');


    public function Songs(){
        return $this->belongsToMany('Song', 'pivot_table')->withTimestamps();
    }
}

