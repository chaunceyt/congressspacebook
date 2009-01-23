<?php
//votesmart wrapper
/**
 * State class handles all state data
 * 
 * Copyright 2007 Project Vote Smart
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
        public function getStateIDs() {
                /**
                 * Returns a list of states and their 2 digit IDs
                 */
                
                $iface = "/State.getStateIDs";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getState($state_id) {
                /**
                 * Returns detailed state information
                 */
                
                $iface = "/State.getState";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&stateId=" . $state_id;
                
                return $this->getXml($iface, $args);
                
        }
        
}
