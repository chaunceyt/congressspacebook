<?php
/**
 * File used as application controller
 *
 * Contains actions for application controller
 *
 * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */

/**
 * Controller class containing application controller's actions
 *
  * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */

class AudioscrobblerController extends AppController 
{
    /**
     * Property used to store name of controller
     *
     * @access public
     * @var string Name of controller
     */
    var $name = 'Audioscrobbler';

    /**
     * Property used to store list of helpers used by this controller's actions' views
     *
     * @access public
     * @var string List of helpers used by this controller's actions' views
     */ 
    var $helpers = array('Html', 'Form');

    /**
     * Property used to store list of components used by this controller's actions' views
     *
     * @access public
     * @var string List of components used by this controller's actions' views
     */
    var $components = array('Zend', 'Mashup');

    /**
     * Property used to store list of models used by this controller's actions' views
     *
     * @access public
     * @var string List of models used by this controller's actions' views
     */
    var $uses = array();

    /**
     * Method called automatically before each action execution
     *
     * @access public
     */    
    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index',
                                            'similar',
                                            'albums',
                                            'tracks');
        parent::beforeFilter();
    }

    /**
     * Method used to get top albums based on keyword
     *
     * @access public
     */
    function index()
    {
        $this->autoRender=false;
        $keyword = $this->params['keyword'];
        $yahooImages = $this->Mashup->asGetTopAlbums($keyword);
        print_r($yahooImages);
    }

    /**
     * Method used to get similar artist based on keyword
     *
     * @access public
     */
    function similar()
    {
        $keyword = $this->params['keyword'];
        $similar = $this->Mashup->asGetSimilarArtist($keyword);
        $this->set('SimilarArtist', $similar);
        $this->set('keyword', $keyword);
    }

    /**
     * Method used to get top albums based on keyword
     *
     * @access public
     */
    function albums()
    {
        $keyword = $this->params['keyword'];
        $similar = $this->Mashup->asGetTopAlbums($keyword);
        $this->set('TopAlbums', $similar);
        $this->set('keyword', $keyword);
    }

    /**
     * Method used to get top tracks based on keyword
     *
     * @access public
     */
    function tracks()
    {
        $keyword = $this->params['keyword'];
        $similar = $this->Mashup->asGetTopTracks($keyword);
        $this->set('TopTracks', $similar);
        $this->set('keyword', $keyword);
    }
}
