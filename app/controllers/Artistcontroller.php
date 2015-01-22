<?php


class ArtistController extends BaseController {

    public function getArtistInfo($artistname){

        $artist = Artist::where('name', 'like', '%'.$artistname.'%')->first();

        if($artist){

            $artistInfo = array('error'=>false,'Artist Name'=>$artist->name,'Artist ID'=>$artist->id);
            $artistsongs = json_decode($artist->Songs);

            foreach ($artistsongs as $song) {
                $songlist[] = array("Song Name"=>$song->title, "Release Year"=>$song->release_year);
            }

            if(!empty($songlist))
                $songlist = array('Songs'=>$songlist);
            else
                $songlist = array();

            return Response::json(array_merge($artistInfo,$songlist));
        }
        else{

            return Response::json(array(
                'error'=>true,
                'description'=>'We could not find any artist in database like:'.$artistname ));
        }
    }



    public function putArtist($artistname)
    {
        $artist = Artist::where('name', '=', $artistname)->first();
        if(!$artist){
            $the_artist = Artist::create(array('name'=>$artistname));
            return Response::json(array(
                'error'=>false,
                'description'=>'The artist was successfully saved. The ID number of the Artist is : '.$the_artist->id
            ));
        }
        else{
            return Response::json(array(
                'error'=>true,
                'description'=>'The artist : ' . $artistname . ' is already stored in the database. The ID number of the Artist is : ' . $artist->id
            ));
        }
    }



    public function deleteArtist($id)
    {
        $artist = Artist::find($id);
        if($artist){
            $artist->delete();
            return Response::json(array(
                'error'=>false,
                'description'=>'The artists was successfully deleted : '.$artist->name
            ));
        }
        else{
            return Response::json(array(
            'error'=>true,
            'description'=>'We could not find any artists in database with ID number:'.$id
            ));

        }
    }

}