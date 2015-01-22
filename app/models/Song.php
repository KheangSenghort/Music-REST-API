<?php



class Song extends Eloquent  {

    protected $table = 'songs';
    protected $fillable = array('title','release_year');
    public function Artists(){
        return $this-> belongsToMany('Artist' , 'pivot_table')->withTimestamps();
    }
}


