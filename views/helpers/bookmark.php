<?php 
/**
 * @author Ritesh Agrawal
 * @version 1.0
 * returns social bookmarklets
 * Note: You will need to change the domain name to match your domain name
 * Thanks to http://kevin.vanzonneveld.net/ for the social bookmark list
 */
class BookmarkHelper extends Helper{
    var $helpers = array('Html');

         /**
     * Folder where all the bookmark images are located.
     */
    var $imgFolder = "img/bookmarks/"; 
    
    /**
     * change this defaults if you want to use a different set of bookmarklets
     * The array elements should correspond to $bookmarks keys
     */
    var $defaults = array('google', 'stumble', 'digg', 'facebook', 'yahoo', 'ask', 'technorati');
    
    /**
     * @param $pagetitle - (required) Title of the Page
     * @param $url - (optional) URL of the page
     * @param $sites - (optional)social bookmarks. If not provided the helper uses the defaults set above. The values should match to the keys of the "bookmarks" variable defined below
     * returns a div with the specified social bookmarklets 
     */
    function getBookMarks($pagetitle, $url = null, $sites = array()){
        if(empty($url)){
                        /* Note: As an alternative you can try Router::url("", true). This should return the absolute url of the current page, but wasn't working for me. So I used this hack. Hopefully someone can tell me a better way to find absolute path */
            //$url = FULL_BASE_URL . $this->Html->url(null, true);
            $url =  $this->Html->url(null, true);
        } 
        if(empty($sites)){
            $sites = $this->defaults;
        }
        
        $output = "";
        foreach($sites as $site){
            if(!array_key_exists($site, $this->bookmarks)) 
                continue;
                
            //build url
            $link = $this->bookmarks[$site]['link'];
            $link = str_replace('{url}', $url, $link);
            if(substr_count($link, '{title}') > 0)
                $link = str_replace('{title}',urlencode($pagetitle), $link );
            
            $name = $this->bookmarks[$site]['name'];
            $iconLoc = Router::url('/', true) . $this->imgFolder . $this->bookmarks[$site]['icon'];
            $image = $this->Html->image($iconLoc, array('title'=> "{$name}", 'alt'=>"{$name}", 'border'=> "0"));
            
            $output .= $this->Html->link(   $image, $link,  array('escape'=> false)). ' ';          
        }
        return '<div id="bookmarklets">' . $output . '</div>';
    }
    
    /**
     * list of social bookmarks.
     * if you want to use any other social bookmark, replace the actual URL with "{url}" and title with "{title}". 
     * See below bookmarks for more details
     */
    var $bookmarks = array(
        'yahoo' => 
            array(
                  'name' => 'Yahoo! My Web',
                  'link' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u={url}&t={title}',
                  'icon'=> 'yahoo.gif'
            ),
        'google' => array(
                'name' => 'Google Bookmarks',
                'link' => 'http://www.google.com/bookmarks/mark?op=edit&bkmk={url}&title={title}',
                'icon'=> 'google.gif'
                
                ),
        'windows' => array(
                'name' => 'Windows Live',
                'link' => 'https://favorites.live.com/quickadd.aspx?url={url}&title={title}',
                'icon' => 'windows.gif'
                ),
        'facebook' => array(
                'name' => 'Facebook',
                'link' => 'http://www.facebook.com/sharer.php?u={url}&t={title}',
                'icon' => 'facebook.gif'
                
                ),
        'digg' => array(
                'name' => 'Digg',
                'link' => 'http://digg.com/submit?phase=2&url={url}&title={title}',
                'icon' => 'digg.gif'
                ),
        'ask' => array(
                'name' => 'Ask',
                'link' => 'http://myjeeves.ask.com/mysearch/BookmarkIt?v=1.2&t=webpages&url={url}&title={title}',
                'icon' => 'ask.gif',
             ),
        'technorati' => array(
                'name' => 'Technorati',
                'link' => 'http://www.technorati.com/faves?add={url}',
                'icon' => 'bookmars/technorati.gif'
                ),
        'delicious' => array(
                'name' => 'del.icio.us',
                'link' => 'http://del.icio.us/post?url={url}&title={title}',
                'icon' => 'delicious.gif'
                
                ),
        'stumble' => array(
                'name' => 'StumbleUpon',
                'link' => 'http://www.stumbleupon.com/submit?url={url}&title={title}',
                'icon' => 'stumble.gif'
                ),
        'squidoo' => array(
                'name' => 'Squidoo',
                'link' => 'http://www.squidoo.com/lensmaster/bookmark?{url}'
                ),
        'netscape' => array(
                'name' => 'Netscape',
                'link' => 'http://www.netscape.com/submit/?U={url}&T={title}',
                'icon' => 'netscape.gif'
                ),
        'slashdot' => array(
                'name' => 'Slashdot',
                'link' => 'http://slashdot.org/bookmark.pl?url={url}&title={title}',
                'icon' => 'slashdot.gif'
                ),
        'reddit' => array(
                'name' => 'reddit',
                'link' => 'http://reddit.com/submit?url={url}&title={title}',
                'icon' => 'reddit.gif'
                ),
        'furl'   => array(
                'name' => 'Furl',
                'link' => 'http://furl.net/storeIt.jsp?u={url}&t={title}',
                'icon' => 'furl.gif'
                ),
        'blinklist' => array(
                'name' => 'BlinkList',
                'link' => 'http://blinklist.com/index.php?Action=Blink/addblink.php&Url={url}&Title={title}',
                'icon' => 'blinklist.gif'
                ),
        'dzone' => array(
                'name' => 'dzone',
                'link' => 'http://www.dzone.com/links/add.html?url={url}&title={title}',
                'icon' => 'dzone.gif'
                ),
        'swik' => array(
                'name' => 'SWiK',
                'link' => 'http://stories.swik.net/?submitUrl&url={url}'
                ),
        'shoutwire' => array(
                'name' => 'Shoutwrie',
                'link' => 'http://www.shoutwire.com/?p=submit&&link={url}',
                'icon' => 'shoutwire.gif'
                
                ),
        'blinkbits' => array(
                'name' => 'Blinkbits',
                'link' => 'http://www.blinkbits.com/bookmarklets/save.php?v=1&source_url={url}',
                'icon' => 'blinkbits.gif'
                ),
        'spurl' => array(
                'name' => 'Spurl',
                'link' => 'http://www.spurl.net/spurl.php?url={url}&title={title}',
                'icon' => 'spurl.gif'
                ),
        'diigo' => array(
                'name' => 'Diigo',
                'link' => 'http://www.diigo.com/post?url={url}&title={title}',
                'icon' => 'diigo.gif'
                ),
        'tailrank' => array(
                'name' => 'Tailrank',
                'link' => 'http://tailrank.com/share/?link_href={url}&title={title}',
                'icon' => 'tailrank.gif'
                ),
        'rawsugar' => array(
                'name' => 'Rawsugar',
                'link' => 'http://www.rawsugar.com/tagger/?turl={url}&tttl={title}&editorInitialized=1',
                'icon' => 'rawsugar.gif'
                )
    );
}
?>
