<?php


class SongController extends BaseController
{

    public function getSongInfo($songname){
        $song = Song::where('title', 'like', '%'.$songname.'%')->first();
        if($song){
            $songInfo = array('error'=>false,'Song Name'=>$song->title,'Release Year'=>$song->release_year,'Song ID'=>$song->id);
            $songartists = json_decode($song->Artists);
            foreach ($songartists as $artist) {
                $artistlist[] = array("Artist"=>$artist->name);
            }
            $artistlist =array('Artists'=>$artistlist);
            return Response::json(array_merge($songInfo,$artistlist));
        }
        else{
            return Response::json(array(
                'error'=>true,
                'description'=>'We could not find any song in database like:'.$songname));
        }
    }

    public function putSong($songname, $year)
    {
        $song = Song::where('title', '=', $songname)->first();

        if (!$song) {
            $the_song = Song::create(array('title' => $songname, 'release_year' => $year));
            return Response::json(array(
                'error' => false,
                'description' => 'The song was successfully saved. The ID number of the Song is : ' . $the_song->id
            ));
        } else {
            return Response::json(array(
                'error' => true,
                'description' => 'The song : ' . $songname . ' is already stored in the database. The ID number of the Song is : ' . $song->id
            ));
        }
    }


    public function deleteSong($id)
    {
        $song = Song::find($id);
        if($song){
            $song->delete();
            return Response::json(array(
                'error'=>false,
                'description'=>'The song was successfully deleted : '.$song->title
            ));
        }
        else{
            return Response::json(array(
                'error'=>true,
                'description'=>'We could not find any song in database with ID number :'.$id
            ));
        }
    }





}