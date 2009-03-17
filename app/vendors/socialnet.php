<?php
/* SVN FILE: $Id:$ */
/*
Copyright (c) 2007 NoseRub.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the
Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN
ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/

//require 'simplepie/simplepie.php';
require APP . 'vendors' . DS .'simplepie'. DS .'simplepie.php';
class Socialnet {

   /**
    * Method description
    *
    * @param
    * @return
    * @access
    */
   function getFeedUrl($service_id, $username) {
       $service = $this->getService($service_id);

       if ($service) {
               return $service->getFeedUrl($username);
       }

       return false;
   }

   /**
    * Method description
    *
    * @param  $service_id id of the service, we're about to use
    * @param  $service_type_id of the service, we're about to use
    * @param  $feed_url the url of the feed
    * @param  $items_per_feed maximum number of items that are fetched from the feed
    * @param  $items_max_age maximum age of any item that is fetched from feed, in days
    * @return
    * @access
    */
   function feed2array($username, $service_id, $service_type_id, $feed_url, $items_per_feed = 5, $items_max_age = '-21 days') {
       if(!$feed_url) {
           return false;
       }

       # get info about service type

       $max_age = $items_max_age ? date('Y-m-d H:i:s', strtotime($items_max_age)) : null;
       $items = array();

       $feed = new SimplePie();
       $feed->set_cache_location(CACHE . 'simplepie');
       $feed->set_feed_url($feed_url);
       $feed->set_autodiscovery_level(SIMPLEPIE_LOCATOR_NONE);
       $feed->init();
       if($feed->error() || $feed->feed_url != $feed_url ) {
           return false;
       }

       for($i=0; $i < $feed->get_item_quantity($items_per_feed); $i++) {
               $feeditem = $feed->get_item($i);
               # create a NoseRub item out of the feed item
               $item = array();
               $item['datetime'] = $feeditem->get_date('Y-m-d H:i:s');
               if($max_age && $item['datetime'] < $max_age) {
                   # we can stop here, as we do not expect any newer items
                   break;
               }

               $item['title']    = $feeditem->get_title();
               $item['url']      = $feeditem->get_link();
           $item['intro']    = @$intro;
           $item['type']     = @$token;
           $item['username'] = $username;

           $service = $this->getService($service_id);

           if ($service) {
               $item['content'] = $service->getContent($feeditem);

               if ($service instanceof TwitterService) {
                       $item['title']   = $item['content'];
               }
           } else {
               $item['content'] = $feeditem->get_content();
           }

               $items[] = $item;
       }

       unset($feed);

       return $items;
   }

   /**
    * Method description
    *
    * @param
    * @return
    * @access
    */
   function getAccountUrl($service_id, $username) {
       $service = $this->getService($service_id);

       if ($service) {
               return $service->getAccountUrl($username);
       }

       return '';
   }

   /**
    * get title, url and preview for rss-feed
    *
    * @param string $feed_url
    * @param int $max_items maximum number of items to fetch
    * @return array
    * @access
    */
   function getInfoFromFeed($username, $service_type_id, $feed_url, $max_items = 5) {
       # needed for autodiscovery of feed
       //require 'simplepie/simplepie.php';
       $feed = new SimplePie();
       $feed->set_cache_location(CACHE . 'simplepie');
       $feed->set_feed_url($feed_url);
       $feed->set_autodiscovery_level(SIMPLEPIE_LOCATOR_ALL);
       @$feed->init();
       if($feed->error()) {
           return false;
       }

       $data = array();
       $data['title']       = $feed->get_title();
       $data['account_url'] = $feed->get_link();
       $data['feed_url']    = $feed->feed_url;

       unset($feed);

       if(!$data['account_url']) {
           $data['account_url'] = $data['feed_url'];
       }
       $data['service_id']      = 8; # any RSS-Feed
       $data['username']        = 'RSS-Feed';
       $data['service_type_id'] = $service_type_id;

       $items = $this->feed2array($username, 8, $data['service_type_id'], $data['feed_url'], 5, null);

       if(!$items) {
           return false;
       }

       $data['items'] = $items;

       return $data;
   }

   /**
    * get service_type_id, feed_url and preview
    *
    * @param
    * @return
    * @access
    */
   function getInfoFromService($username, $service_id, $account_username) {

       $data = array();
       $data['service_id']      = $service_id;
       $data['username']        = $account_username;
       $data['service_type_id'] = $service['Service']['service_type_id'];

       $data['account_url'] = $this->getAccountUrl($service_id, $account_username);

       if($service['Service']['has_feed'] == 1) {
           $data['feed_url'] = $this->getFeedUrl($service_id, $account_username);
           $items            = $this->feed2array($username, $service_id, $data['service_type_id'], $data['feed_url'], 5, null);

           if(!$items) {
               return false;
           }
       } else {
           $data['feed_url'] = '';
           $items = array();
       }

       $data['items'] = $items;

       return $data;
   }

   /**
    * Method description
    *
    * @param
    * @return
    * @access
    */
   function getContactsFromService($service_id, $username) {

       $service = $this->getService($service_id);

       if ($service) {
               return $service->getContacts($username);
       }

       return array();
   }

   /**
    * Factory method to create services
    */
   private function getService($service_id) {
       switch ($service_id) {
               case 1:
                       return new FlickrService();
               case 2:
                       return new DeliciousService();
               case 3:
                       return new IpernityService();
               case 4:
                       return new _23hqService();
               case 5:
                       return new TwitterService();
               case 6:
                       return new PownceService();
               case 9:
                       return new UpcomingService();
               case 10:
                       return new VimeoService();
               case 11:
                       return new LastfmService();
               case 12:
                       return new QypeService();
               case 13:
                       return new MagnoliaService();
               case 14:
                       return new StumbleuponService();
               case 15:
                       return new CorkdService();
               case 16:
                       return new DailymotionService();
               case 17:
                       return new ZooomrService();
               case 18:
                       return new OdeoService();
               case 19:
                       return new IlikeService();
               case 20:
                       return new WeventService();
               case 21:
                       return new ImthereService();
               case 22:
                       return new NewsvineService();
               case 23:
                       return new JabberService();
               case 24:
                       return new GtalkService();
               case 25:
                       return new IcqService();
               case 26:
                       return new YimService();
               case 27:
                       return new AimService();
               case 28:
                       return new SkypeService();
               case 29:
                       return new MsnService();
               case 30:
                       return new FacebookService();
               case 31:
                       return new SecondlifeService();
               case 32:
                       return new LinkedinService();
               case 33:
                       return new XingService();
               case 34:
                       return new SlideshareService();
               case 35:
                       return new PlazesService();
               case 36:
                       return new ScribdService();
               case 37:
                       return new MoodmillService();
               case 38:
                       return new DiggService();
               case 39:
                       return new MisterwongService();
               case 40:
                       return new FolkdService();
               case 41:
                       return new RedditService();
               case 42:
                       return new FavesService();
               case 43:
                       return new SimpyService();
               case 44:
                       return new DeviantartService();
               case 45:
                       return new ViddlerService();
               case 46:
                       return new ViddyouService();
               case 47:
                       return new GadugaduService();
               case 48:
                       return new DopplrService();
               case 49:
                       return new OrkutService();
               case 50:
                       return new KulandoService();
               case 51:
                       return new WordpresscomService();
               case 52:
                       return new BloggerdeService();
               case 53:
                       return new LivejournalService();
               default:
                       return false;
       }
   }
}

class ContactExtractor {

       static function getContactsFromSinglePage($url, $pattern) {
               $data = array();
       $content = @file_get_contents($url);
       if($content && preg_match_all($pattern, $content, $matches)) {
           foreach($matches[1] as $username) {
               if(!isset($data[$username])) {
                   $data[$username] = $username;
               }
           }
       }

       return $data;
       }

       // TODO better names for the parameters
       static function getContactsFromMultiplePages($url, $pattern, $secondPattern, $urlPart) {
               $data = array();
       $i = 2;
       $page_url = $url;
       do {
           $content = @file_get_contents($page_url);
           if($content && preg_match_all($pattern, $content, $matches)) {
               # also find the usernames
               preg_match_all($pattern, $content, $usernames);
               foreach($usernames[1] as $idx => $username) {
                   if(!isset($data[$username])) {
                       $data[$username] = $matches[1][$idx];
                   }
               }
               if(preg_match($secondPattern, $content)) {
                   $page_url = $url . $urlPart . $i;
                   $i++;
                   if($i>1000) {
                       # just to make sure, we don't loop forever
                       break;
                   }
               } else {
                   # no "next" button found
                   break;
               }
           } else {
               # no friends found
               break;
           }
       } while(1);

       return $data;
       }
}

interface IService {
       function getAccountUrl($username);
       function getContacts($username);
       function getContent($feeditem);
       function getFeedUrl($username);
}

/**
 * This class is provided as a convenience for easily creating services by extending this class
 * and overriding only the methods of interest.
 */
abstract class ServiceAdapter implements IService {

       function getAccountUrl($username) {
               return '';
       }

       function getContacts($username) {
               return array();
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return false;
       }
}

// class name starts with '_' as it is not allowed to use a number as first character
class _23hqService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'http://www.23hq.com/'.$username;
       }

       function getContent($feeditem) {
               $raw_content = $feeditem->get_content();
       #<a href="http://www.23hq.com/DonDahlmann/photo/2204674
       if(preg_match('/<a href="http:\/\/www.23hq.com\/.*\/photo\/.*<\/a>/iU', $raw_content, $matches)) {
           $content = str_replace('standard', 'quad100', $matches[0]);
           $content = preg_replace('/width="[0-9]+".+height="[0-9]+"/i', '', $content);
           return $content;
       }
       return '';
       }

       function getFeedUrl($username) {
               return 'http://www.23hq.com/rss/'.$username;
       }
}

class AimService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'aim:goIM?screenname='.$username;
       }
}

class BloggerdeService implements IService {

       function getAccountUrl($username) {
               return 'http://'.$username.'.blogger.de/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://' . $username . 'blogger.de/', '/<a href="http:\/\/(.*).blogger.de" rel=".*">.*<\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://'.$username.'.blogger.de/rss?show=all';
       }
}

class FavesService implements IService {

       function getAccountUrl($username) {
               return 'http://faves.com/users/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://faves.com/FriendExplorer.aspx?user=' . $username, '/<div class="summary"><a href="http:\/\/faves.com\/users\/(.*)">/iU', '/Next<\/a>/iU', '&page=');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://faves.com/users/'.$username.'/rss';
       }
}

class CorkdService implements IService {

       function getAccountUrl($username) {
               return 'http://corkd.com/people/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://corkd.com/people/' . $username . '/buddies', '/<dd class="username"><a href="\/people\/(.*)" rel="friend">.*<\/a><\/dd>/iU', '/Next &#8250;&#8250;<\/a>/iU', '?page=');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://corkd.com/feed/journal/'.$username;
       }
}

class DailymotionService implements IService {

       function getAccountUrl($username) {
               return 'http://www.dailymotion.com/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://www.dailymotion.com/contacts/' . $username, '/<img width="80" height="80" src=".*" alt="(.*)" \/>/simU', '/next&nbsp;&raquo;<\/a>/iU', '/');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://www.dailymotion.com/rss/'.$username;
       }
}

class DeliciousService implements IService {

       function getAccountUrl($username) {
               return 'http://del.icio.us/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://del.icio.us/network/' . $username . '/', '/<a class="uname" href="\/(.*)">.*<\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://del.icio.us/rss/'.$username;
       }
}

class DeviantartService implements IService {

       function getAccountUrl($username) {
               return 'http://'.$username.'.deviantart.com';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://' . $username.'.deviantart.com/friends/', '/<a class="u" href="http:\/\/(.*).deviantart.com\/">/iU', '/Next Page<\/a>/iU', '?offset=');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://backend.deviantart.com/rss.xml?q=gallery%3A'.$username.'+sort%3Atime&type=deviation';
       }
}

class DiggService implements IService {

       function getAccountUrl($username) {
               return 'http://digg.com/users/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://digg.com/users/' . $username . '/friends/view', '/<a class="fn" href="\/users\/(.*)">/iU', '/Next &#187;<\/a>/iU', '/page');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://digg.com/users/'.$username.'/history/favorites.rss';
       }
}

class DopplrService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'http://www.dopplr.com/traveller/'.$username;
       }
}

class FacebookService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'http://www.facebook.com/profile.php?id='.$username;
       }
}

class FlickrService implements IService {

       function getAccountUrl($username) {
               return 'http://www.flickr.com/photos/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://www.flickr.com/people/' . $username . '/contacts/', '/view his <a href="\/people\/(.*)\/">profile<\/a>/iU', '/class="Next">Next &gt;<\/a>/iU', '?page=');
       }

       function getContent($feeditem) {
               $raw_content = $feeditem->get_content();
       if(preg_match('/<a href="http:\/\/www.flickr.com\/photos\/.*<\/a>/iU', $raw_content, $matches)) {
           $content = str_replace('_m.jpg', '_s.jpg', $matches[0]);
           $content = preg_replace('/width="[0-9]+".+height="[0-9]+"/i', '', $content);
           return $content;
       }
       return '';
       }

       function getFeedUrl($username) {
               # we need to read the page first in order to access
       # the user id without need to access the API
       $content = @file_get_contents('http://www.flickr.com/photos/'.$username.'/');
       if(preg_match('/photos_public.gne\?id=(.*)&amp;/i', $content, $matches)) {
               return 'http://api.flickr.com/services/feeds/photos_public.gne?id='.$matches[1].'&lang=en-us&format=rss_200';
       } else {
               return false;
       }
       }
}

class FolkdService implements IService {

       function getAccountUrl($username) {
               return 'http://www.folkd.com/user/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://www.folkd.com/user/' . $username . '/contacts/', '/<a href="\/profile\/(.*)" title=".*\'s Profile" rel="contact" id=".*">/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://www.folkd.com/rss.php?items=15&find=all&sort=&user='.$username;
       }
}

class GadugaduService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'gg:'.$username;
       }
}

class GtalkService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'xmpp:'.$username;
       }
}

class IcqService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'http://www.icq.com/'.$username;
       }
}


class IlikeService implements IService {

       function getAccountUrl($username) {
               return 'http://ilike.com/user/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://ilike.com/user/' . $username . '/friends', '/<a style=".*" class="person "  href="\/user\/(.*)" title="View .*\'s profile">/simU', '/src="\/images\/forward_arrow.gif" title="Go forward">/iU', '?page=');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://ilike.com/user/'.$username.'/recently_played.rss';
       }
}

class ImthereService implements IService {

       function getAccountUrl($username) {
               return 'http://imthere.com/users/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://imthere.com/users/' . $username . '/friends', '/<h1 class="name"><a href="http:\/\/imthere.com\/users\/(.*)" class="friend">.*<\/a><\/h1>/iU', '/Next<\/a><\/li>/iU', '?page=');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://imthere.com/users/'.$username.'/events?format=rss';
       }
}

class IpernityService implements IService {

       function getAccountUrl($username) {
               return 'http://ipernity.com/doc/'.$username.'/home/photo';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://ipernity.com/user/' . $username . '/network', '/<a href="\/user\/(.*)">Profile<\/a>/iU', '/>next &rarr;<\/a>/iU', '|R58%3Bord%3D3%3Boff%3D0?r[off]=');
       }

       function getContent($feeditem) {
               $raw_content = $feeditem->get_content();
       if(preg_match('/<img width="[0-9]+" height="[0-9]+" src="(.*)l\.jpg" /iUs', $raw_content, $matches)) {
           return '<a href="'.$feeditem->get_link().'"><img src="'.$matches[1].'t.jpg" /></a>';
       }
       return '';
       }

       function getFeedUrl($username) {
               return 'http://www.ipernity.com/feed/'.$username.'/photocast/stream/rss.xml?key=';
       }
}

class JabberService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'xmpp:'.$username;
       }
}

class KulandoService implements IService {

       function getAccountUrl($username) {
               return 'http://'.$username.'.kulando.de';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://' . $username . '.kulando.de', '/view his <a href="\/people\/(.*)\/">profile<\/a>/iU', '/class="Next">Next &gt;<\/a>/iU', '?page=');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               # we need to read the page first in order to access
       # the user id without need to access the API
       $content = @file_get_contents('http://'.$username.'.kulando.de/');
       if(preg_match('/href="http:\/\/www.kulando.de\/rss.php\?blogId=(.*)&amp;profile=/i', $content, $matches)) {
               return 'http://www.kulando.de/rss.php?blogId='.$matches[1].'&amp;profile=rss20';
       } else {
               return false;
       }
       }
}

class LastfmService implements IService {

       function getAccountUrl($username) {
               return 'http://www.last.fm/user/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://www.last.fm/user/' . $username . '/friends/', '/<a href="\/user\/(.*)\/" title=".*" class="nickname.*">.*<\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://ws.audioscrobbler.com/1.0/user/'.$username.'/recenttracks.rss';
       }
}

class LinkedinService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'http://www.linkedin.com/in/'.$username;
       }
}

class LivejournalService implements IService {

       function getAccountUrl($username) {
               return 'http://'.$username.'.livejournal.com/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://www.livejournal.com/tools/friendlist.bml?user=' . $username, '/lj:user=\'(.*)\'/iU', '/&gt;&gt;<\/b><\/a>/iU', '&page=');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://'.$username.'.livejournal.com/data/rss';
       }
}

class MagnoliaService implements IService {

       function getAccountUrl($username) {
               return 'http://ma.gnolia.com/people/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://ma.gnolia.com/people/' . $username . '/contacts/', '/<a href="http:\/\/ma.gnolia.com\/people\/(.*)" class="fn url" rel="contact" title="Visit .*">.*<\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://ma.gnolia.com/rss/full/people/'.$username.'/';
       }
}

class MisterwongService implements IService {

       function getAccountUrl($username) {
               return 'http://www.mister-wong.de/user/'.$username.'/?profile';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://www.mister-wong.de/user/' . $username . '/?profile', '/<div class="username">.*<a href=".*">(.*)<\/a>/simU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://www.mister-wong.de/rss/user/'.$username.'/';
       }
}

class MoodmillService implements IService {

       function getAccountUrl($username) {
               return 'http://www.moodmill.com/citizen/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://www.moodmill.com/citizen/' . $username, '/<div class="who">.*<a href="http:\/\/www.moodmill.com\/citizen\/(.*)\/">.*<\/a>.*<\/div>/simU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://www.moodmill.com/rss/'.$username.'/';
       }
}

class MsnService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'msnim:'.$username;
       }
}

class NewsvineService implements IService {

       function getAccountUrl($username) {
               return 'http://'.$username.'.newsvine.com/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://' . $username . '.newsvine.com/?more=Friends&si=', '/<td><a href="http:\/\/(.*).newsvine.com".*>.*<\/a>/iU', '/title="Next 50">NEXT 50<\/a>/iU', '');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://'.$username.'.newsvine.com/_feeds/rss2/author';
       }
}

class OdeoService implements IService {

       function getAccountUrl($username) {
               return 'http://odeo.com/profile/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://odeo.com/profile/' . $username . '/contacts/', '/<a href="\/profile\/(.*)" title=".*\'s Profile" rel="contact" id=".*">/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://odeo.com/profile/'.$username.'/rss.xml';
       }
}

class OrkutService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'http://www.orkut.com/Profile.aspx?uid='.$username;
       }
}

class PlazesService implements IService {

       function getAccountUrl($username) {
               return 'http://plazes.com/users/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://plazes.com/users/' . $username . ';contacts', '/<em class="fn nickname">.*<a href="\/users\/.*" rel="vcard">\n(.*)\s{6}<\/a>/simU', '/next<\/a><\/strong><\/p>/iU', '?page=');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://plazes.com/users/'.$username.'/presences.atom';
       }
}

class PownceService implements IService {

       function getAccountUrl($username) {
               return 'http://pownce.com/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://pownce.com/' . $username . '/friends/', '/<div class="user-name">username: (.*)<\/div>/simU', '/Next Page &#187;<\/a>/iU', 'page/');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://pownce.com/feeds/public/'.$username.'/';
       }
}

class QypeService implements IService {

       function getAccountUrl($username) {
               return 'http://www.qype.com/people/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://www.qype.com/people/' . $username . '/contacts/', '/<a href="http:\/\/www.qype.com\/people\/(.*)"><img alt="Benutzerfoto: .*" src=".*" title=".*" \/><\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://www.qype.com/people/'.$username.'/rss';
       }
}

class RedditService implements IService {

       function getAccountUrl($username) {
               return 'http://reddit.com/user/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://reddit.com/user/' . $username . '/contacts/', '/<a href="\/profile\/(.*)" title=".*\'s Profile" rel="contact" id=".*">/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://reddit.com/user/'.$username.'/.rss';
       }
}

class ScribdService implements IService {

       function getAccountUrl($username) {
               return 'http://www.scribd.com/people/view/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://www.scribd.com/people/friends/' . $username, '/<div style="font-size:16px"><a href="\/people\/view\/(.*)">.*<\/a>.*<\/div>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://www.scribd.com/feeds/user_rss/'.$username;
       }
}

class SecondlifeService extends ServiceAdapter {

       function getAccountUrl($username) {
               return '#'.$username;
       }
}

class SimpyService implements IService {

       function getAccountUrl($username) {
               return 'http://www.simpy.com/user/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://reddit.com/user/' . $username . '/contacts/', '/<a href="\/profile\/(.*)" title=".*\'s Profile" rel="contact" id=".*">/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://www.simpy.com/rss/user/'.$username.'/links/';
       }
}

class SkypeService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'skype:'.$username;
       }
}

class SlideshareService implements IService {

       function getAccountUrl($username) {
               return 'http://www.slideshare.net/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://www.slideshare.net/' . $username . '/contacts', '/<a href="\/(.*)" style="" title="" class="blue_link_normal" id="">.*<\/a>/iU', '/class="text_float_left">Next<\/a>/iU', '/');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://www.slideshare.net/rss/user/'.$username;
       }
}

class StumbleuponService implements IService {

       function getAccountUrl($username) {
               return 'http://'.$username.'.stumbleupon.com/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://' . $username . '.stumbleupon.com/friends/', '/<dt><a href="http:\/\/(.*).stumbleupon.com\/">.*<\/a><\/dt>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://www.stumbleupon.com/syndicate.php?stumbler='.$username;
       }
}

class TwitterService implements IService {

       function getAccountUrl($username) {
               return 'http://twitter.com/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://twitter.com/' . $username . '/', '/<a href="http:\/\/twitter\.com\/(.*)" class="url" rel="contact"/i');
       }

       function getContent($feeditem) {
               # cut off the username
               $content = $feeditem->get_content();
       return substr($content, strpos($content, ': ') + 2);
       }

       function getFeedUrl($username) {
               # we need to reed the page first in order to
       # access the rss-feed
       $content = @file_get_contents('http://twitter.com/'.$username);
       if(!$content) {
               return false;
       }
       if(preg_match('/http:\/\/twitter\.com\/statuses\/user_timeline\/([0-9]*)\.rss/i', $content, $matches)) {
               return 'http://twitter.com/statuses/user_timeline/'.$matches[1].'.rss';
       } else {
               return false;
       }
       }
}

class UpcomingService implements IService {

       function getAccountUrl($username) {
               return 'http://upcoming.yahoo.com/user/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://upcoming.yahoo.com/user/' . $username . '/', '/<a href="\/user\/[0-9]*\/">(.*)<\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://upcoming.yahoo.com/syndicate/v2/my_events/'.$username;
       }
}

class ViddlerService implements IService {

       function getAccountUrl($username) {
               return 'http://www.viddler.com/explore/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://www.viddler.com/explore/' . $username . '/friends/', '/<p><strong><a.*href="\/explore\/.*\/".*>(.*)<\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://www.viddler.com/explore/'.$username.'/videos/feed/';
       }
}

class ViddyouService implements IService {

       function getAccountUrl($username) {
               return 'http://viddyou.com/profile.php?user='.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://viddyou.com/profile.php?user=' . $username . '/friends/', '/next>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://www.viddyou.com/feed/user/'.$username.'/feed.rss';
       }
}

class VimeoService implements IService {

       function getAccountUrl($username) {
               return 'http://vimeo.com/'.$username.'/';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromMultiplePages('http://vimeo.com/' . $username . '/contacts/', '/<div id="contact_(.*)">/iU', '/<img src="\/assets\/images\/paginator_right.gif" alt="next" \/><\/a>/iU', 'sort:date/page:');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://vimeo.com/'.$username.'/videos/rss/';
       }
}

class WeventService implements IService {

       function getAccountUrl($username) {
               return 'http://wevent.org/users/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://wevent.org/users/' . $username, '/<a href="\/users\/(.*)" class="fn url" rel="friend">.*<\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_link();
       }

       function getFeedUrl($username) {
               return 'http://wevent.org/users/'.$username.'/upcoming.rss';
       }
}

class WordpresscomService implements IService {

       function getAccountUrl($username) {
               return 'http://'.$username.'.wordpress.com';
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://' . $username . 'wordpress.com', '/<a href="http:\/\/(.*).wordpress.com" rel=".*">.*<\/a>/iU');
       }

       function getContent($feeditem) {
               return $feeditem->get_content();
       }

       function getFeedUrl($username) {
               return 'http://'.$username.'.wordpress.com/feed/';
       }
}

class XingService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'https://www.xing.com/profile/'.$username;
       }
}

class YimService extends ServiceAdapter {

       function getAccountUrl($username) {
               return 'http://edit.yahoo.com/config/send_webmesg?.target='.$username.'&.src=pg';
       }
}

class ZooomrService implements IService {

       function getAccountUrl($username) {
               return 'http://www.zooomr.com/photos/'.$username;
       }

       function getContacts($username) {
               return ContactExtractor::getContactsFromSinglePage('http://www.zooomr.com/people/' . $username . '/contacts/', '/View their <a href="\/people\/(.*)\/">profile<\/a><\/p>/iU');
       }

       function getContent($feeditem) {
               $raw_content = $feeditem->get_content();
       if(preg_match('/<img src="(.*)_m\.jpg"/iUs', $raw_content, $matches)) {
           return '<a href="'.$feeditem->get_link().'"><img src="'.$matches[1].'_s.jpg" /></a>';
       }
       return '';
       }

       function getFeedUrl($username) {
               return 'http://www.zooomr.com/services/feeds/public_photos/?id='.$username.'&format=rss_200';
       }
}
