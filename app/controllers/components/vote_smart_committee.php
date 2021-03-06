<?php
//votesmart wrapper

/**
 * Committee class Provides information on committees 
 * and their members.
 * 
 * Copyright 2007 Project Vote Smart
 * Distributed under the BSD License
 * 
 * http://www.opensource.org/licenses/bsd-license.php
 * 
 */
class VoteSmartCommitteComponent extends Object
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
        public function getTypes() {
                /**
                 * Returns committee types for use in other methods
                 */
                
                $iface = "/Committee.getTypes";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getCommitteesByTypeState($type_id = null, $state_id = 'NA') {
                /**
                 * Returns committee types for use in other methods
                 */
                
                $iface = "/Committee.getCommitteesByTypeState";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&typeId=" . $type_id . "&stateId=" . $state_id;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getCommittee($committee_id) {
                /**
                 * Returns committee types for use in other methods
                 */
                
                $iface = "/Committee.getCommittee";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&committeeId=" . $committee_id;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getCommitteeMembers($committee_id) {
                /**
                 * Returns committee types for use in other methods
                 */
                
                $iface = "/Committee.getCommitteeMembers";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&committeeId=" . $committee_id;
                
                return $this->getXml($iface, $args);
                
        }
}
