<?php
/* SVN FILE: $Id: routes.php 7690 2008-10-02 04:56:53Z nate $ */
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.app.config
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 7690 $
 * @modifiedby		$LastChangedBy: nate $
 * @lastmodified	$Date: 2008-10-02 00:56:53 -0400 (Thu, 02 Oct 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	
    Router::connect('/', array('controller' => 'mashup', 'action' => 'index'));
    Router::connect('/search/:keyword/:page', array('controller' => 'mashup', 'action' => 'index'));

	//Audioscrobbler Music
    Router::connect('/audioscrobbler/similar/:keyword/*', array('controller' => 'audioscrobbler', 'action' => 'similar'));
	Router::connect('/audioscrobbler/albums/:keyword/*', array('controller' => 'audioscrobbler', 'action' => 'albums'));
	Router::connect('/audioscrobbler/tracks/:keyword/*', array('controller' => 'audioscrobbler', 'action' => 'tracks'));
    
    //Yahoo
	Router::connect('/yahoo/:keyword/*', array('controller' => 'yahoo', 'action' => 'index'));

	//Youtube
    Router::connect('/youtube/video/:id', array('controller' => 'youtube', 'action' => 'video'));
	Router::connect('/youtube/:keyword/:page', array('controller' => 'youtube', 'action' => 'index'));
	
    //Flickr
    Router::connect('/flickr/image/:id/tag/:keyword', array('controller' => 'flickr', 'action' => 'image'));
	Router::connect('/flickr/:keyword/:page', array('controller' => 'flickr', 'action' => 'index'));
	
    //Eventful
	Router::connect('/eventful/:keyword/:page', array('controller' => 'eventful', 'action' => 'index'));
	
    //social_stream
    Router::connect('/social_stream/link/:link/:site', array('controller' => 'twitter', 'action' => 'web_link'));
    Router::connect('/social_stream/user/:username', array('controller' => 'twitter', 'action' => 'user'));

    //Twitter
    Router::connect('/twitter/:keyword/:page', array('controller' => 'twitter', 'action' => 'index'));

    //friendFeed
    Router::connect('/friendfeed/:keyword/:page', array('controller' => 'friendfeed', 'action' => 'index'));

    //Googe News
	Router::connect('/news/:keyword', array('controller' => 'news', 'action' => 'index'));
	
    //Backtype - blog comments
    Router::connect('/comments/:keyword/:page', array('controller' => 'blogcomments', 'action' => 'index'));
	
    //Technorati - blog posts
    Router::connect('/technorati/:keyword', array('controller' => 'technorati', 'action' => 'index'));
	

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
?>
