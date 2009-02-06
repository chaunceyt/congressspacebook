<?php
class GovtrackHelper extends Helper {
    var $helpers = array('Time');
    public function renderBillXml($data)
    {
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        $session = $data->attributes()->session;
        echo '<p> Congressional Session: ' . $session . '</p>';
        
        //$type = $data->attributes()->type;
        //$number = $data->attributes()->number;
        $updated = $data->attributes()->updated;
        echo 'Last updated : ' . $this->Time->niceShort($updated);
        //$status_date = $data->status->introduced->attributes()->date;

        /*
        if(isset($data->status->introduced->attributes()->datetime)) {
            $status_datetime = $data->status->introduced->attributes()->datetime;
            echo '<p>Introduced on: '. date("D M j G:i:s T Y",strtotime($status_datetime)).'</p>';
        }

        $introduced_date = $data->attributes()->date;
        $introduced_datetime = $data->attributes()->datetime;
        */

        $title = $data->titles->title;
        echo '<p> Title: ' . $title . '</p>';

        $sponsor = $data->sponsor->attributes()->id;

        $cosponsors = $data->cosponsors;
        $actions = $data->actions->action;

        $committees = $data->committees;
        $relatedbills = $data->relatedbills;
        $subjects = $data->subjects;
        $admendments = $data->admendments;

        $summary = $data->summary;
        echo '<p>Sponsor: ' . $sponsor . '</p>';
        
        /*
        * //need to get the name of congress person re: $cosponsor->attributes()->id gotrack_id  
        echo '<p>Co-Sponsor(s): <br/>';
        foreach($cosponsors->cosponsor as $cosponsor) {
            echo $cosponsor->attributes()->id. ' joined in on '.$cosponsor->attributes()->joined,"<br/>";
        }
        echo '</p>';
        */

        echo '<p>Actions(s): <br/>';
        foreach($actions as $action) {
            echo 'Date: '. date("D M j G:i:s T Y",strtotime($action->attributes()->datetime)). ' - '.$action->text,"<br/>";
        }
        echo '</p>';

        /*
        * fixme: need to find a bill that has all of these completed.
        *
        echo '<p>Committee(s): <br/>';
        foreach($committees as $committee) {
            //echo 'Date: '. date("D M j G:i:s T Y",strtotime($committee->attributes()->datetime)). ' - '.$committee->text,"<br/>";
        }
        echo '</p>';

        echo '<p>Related Bill(s): <br/>';
        foreach($relatedbills as $relatedbill) {
            //echo 'Date: '. date("D M j G:i:s T Y",strtotime($relatedbill->attributes()->datetime)). ' - '.$relatedbill->text,"<br/>";
        }
        echo '</p>';

        echo '<p>Subjects(s): <br/>';
        foreach($subjects as $subject) {
            //echo 'Date: '. date("D M j G:i:s T Y",strtotime($subject->attributes()->datetime)). ' - '.$subject->text,"<br/>";
        }
        echo '</p>';

        echo '<p>Admendment(s): <br/>';
        foreach($actions as $action) {
            //echo 'Date: '. date("D M j G:i:s T Y",strtotime($action->attributes()->datetime)). ' - '.$action->text,"<br/>";
        }
        echo '</p>';
        */
        
        echo '<p>'.nl2br($summary).'</p>';

    }

    function getCongressionalRecords()
    {
        $dir = "/home/govtrack/data/us/111/cr/";
        $filepattern = '*';
        $sorting_list = array();
        $filemtimes = array();

        # Get file/dir listing, else error message
        if ( ( $list = glob( $dir . $filepattern ) ) !== false ) {
            $i=0;
            $list = array_reverse($list);
            foreach ( $list AS $file ) {
                if($i < 1) {
                    //echo $file;
                    $filemtime = filemtime( $file );
                    # Build array to be sorted with filename and filemtime
                    $sorting_list[] = array('filename' => $file, 'filemtime' => $filemtime);
                    # This is the list of filemtimes to sort by later
                    $filemtimes[] = $filemtime;
                    # Sort array based on $filemtimes
                    # http://php.net/array-multisort Example #3
                    if (array_multisort($filemtimes, SORT_DESC, $sorting_list) ) {
                        $response = file_get_contents($file);
                        $result = simplexml_load_string($response);
                        print_r($result);

                        foreach($result as $cr) {
                            echo $cr->attributes()->speaker;
                            $j=0;
                            foreach($cr->narrative as $narrative) {
                                echo 'Narrative'."\n";
                                echo '<p>'.$narrative.'</p>';
                                $j++;
                            }
                            $j=0;
                            foreach($cr->paragraph as $paragraph) {
                                echo 'Paragraph'."\n";
                                echo '<p>'.$paragraph.'</p>';
                                $j++;
                            }
                            foreach($cr->chair as $chair) {
                                echo $chair;
                            }
                        }
                    }
                }
                $i++;
            }
        }
        else {
            echo 'Directory listing call failed!';
        }
        
    }
}
