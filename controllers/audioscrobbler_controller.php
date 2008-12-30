<?php

class AudioscrobblerController extends AppController {

    var $name = 'Audioscrobbler';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function index()
    {
        $this->autoRender=false;
        $keyword = $this->params['keyword'];
        $yahooImages = $this->Mashup->asGetTopAlbums($keyword);
        print_r($yahooImages);
    }

    function similar()
    {
        $keyword = $this->params['keyword'];
        $similar = $this->Mashup->asGetSimilarArtist($keyword);
        $this->set('SimilarArtist', $similar);
        $this->set('keyword', $keyword);
    }

    function albums()
    {
        $keyword = $this->params['keyword'];
        $similar = $this->Mashup->asGetTopAlbums($keyword);
        $this->set('TopAlbums', $similar);
        $this->set('keyword', $keyword);
    }

    function tracks()
    {
        $keyword = $this->params['keyword'];
        $similar = $this->Mashup->asGetTopTracks($keyword);
        $this->set('TopTracks', $similar);
        $this->set('keyword', $keyword);
    }
}
