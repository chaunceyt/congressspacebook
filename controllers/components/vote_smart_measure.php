<?php
//votesmart wrapper
/**
 * Measure Class - for finding and retrieving details on Ballot Measures
 * 
 * Copyright 2008 Project Vote Smart
 * Distributed under the BSD License
 * 
 * http://www.opensource.org/licenses/bsd-license.php
 * 
 */
class VoteSmartVotesComponent extends Object
{
        protected function getXml($iface, $args) {

                if (!$xml = file_get_contents(_APISERVER_ . $iface . $args)) {

                        return false;

                } else {

                        // Let's use the SimpleXML to drop the whole XML
                        // output into an object we can later interact with easilly
                        $xml_object = new SimpleXMLElement($xml, LIBXML_NOCDATA);

                        return $xml_object;

                }

        }
        public function getMeasure($measure_id) {
                /**
                 * Returns a ballot measure's details
                 */
                
                $iface = "/Measure.getMeasure";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&measureId=" . $measure_id;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getMeasuresByYearState($year, $state_id) {
                /**
                 * Returns a list of ballot measures that fit the criteria
                 */
                
                $iface = "/Measure.getMeasuresByYearState";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&stateId=" . $election_id . "&year=" . $year;
                
                return $this->getXml($iface, $args);
                
        }
}
