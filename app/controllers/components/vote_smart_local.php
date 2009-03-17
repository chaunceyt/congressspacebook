<?php
//votesmart wrapper
/**
 * Basic local information on cities and counties..
 * 
 * Copyright 2007 Project Vote Smart
 * Distributed under the BSD License
 * 
 * http://www.opensource.org/licenses/bsd-license.php
 * 
 */
class VoteSmartLocalComponent extends Object
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
        public function getCities($state_id) {
                /**
                 * Returns a list of cities in a given state
                 */
                
                $iface = "/Local.getCities";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&stateId=" . $state_id;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getCounties($state_id) {
                /**
                 * Returns a list of counties in a given state.
                 */
                
                $iface = "/Local.getCounties";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&stateId=" . $state_id;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getOfficials($local_id) {
                /**
                 * Returns a list of counties in a given state.
                 */
                
                $iface = "/Local.getOfficials";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&localId=" . $local_id;
                
                return $this->getXml($iface, $args);
                
        }
}
