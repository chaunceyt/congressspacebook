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

class NewsController extends AppController {

    var $name = 'News';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }


    function beforeRender()
    {
        $keyword = $this->params['keyword'];
        $this->set('keyword', $keyword);
    }

    function index()
    {
        $keyword = $this->params['keyword'];
        $yahooImages = $this->Mashup->yahooImageSearch($keyword);
        //$yahooWebSearchCacheKey = md5('YAHOOWEBSEARCH'.md5($_keyword));
        /*if(!$yahooWebSearch = $this->_cache->load($yahooWebSearchCacheKey)) {
            $yahooWebSearch = $mashup->yahooWebSearch();
            $this->_cache->save($yahooWebSearch, $yahooWebSearchCacheKey, array(), (86400*3));
        }*/

        $this->set('GoogleSearch', $this->Mashup->googleNews($keyword));
        $this->set('TechnoratiSearch', $this->Mashup->technoratiSearch($keyword));
        $this->set('keyword', $keyword);
        //$this->set('YahooWebSearch', $yahooWebSearch);
        //$this->set('yahooWebSearchTotal', $yahooWebSearch['ResultSet']['totalResultsAvailable']);
        
    }
}
