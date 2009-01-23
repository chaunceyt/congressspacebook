<?php
//votesmart wrapper

/**
 * Information on officials that hold certain leadership 
 * positions.
 * 
 * Copyright 2007 Project Vote Smart
 * Distributed under the BSD License
 * 
 * http://www.opensource.org/licenses/bsd-license.php
 * 
 */
class VoteSmartLeadershipComponent extends Object
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
        public function getPositions($state_id = 'NA', $office_id = null) {
                /**
                 * Returns a list of leadership positions
                 */
                
                $iface = "/Leadership.getPositions";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&stateId=" . $state_id . "&officeId=" . $office_id;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getOfficials($leadership_id, $state_id = 'NA') {
                /**
                 * Returns a list of candidates in specific leadership positions
                 */
                
                $iface = "/Leadership.getOfficials";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&leadershipId=" . $leadership_id . "&stateId=" . $state_id;
                
                return $this->getXml($iface, $args);
                
        }
}
