<?php
//votesmart wrapper
/**
 * CandidateBIo class handles candidate bio data
 * 
 * Copyright 2007 Project Vote Smart
 * Distributed under the BSD License
 * 
 * http://www.opensource.org/licenses/bsd-license.php
 */

class VoteSmartCandidatebioComponent extends Object
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
   
        public function getBio($can_id) {
                /**
                 * Returns basic bio details on a candidate
                 */
                
                $iface = "/CandidateBio.getBio";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&candidateId=" . $can_id;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getAddlBio($can_id) {
                /**
                 * Returns additional bio information for a candidate
                 * (i.e. Pet cat, favorite color)
                 */
                $iface = "/CandidateBio.getAddlBio";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&candidateId=" . $can_id;
                
                return $this->getXml($iface, $args);
                
        }
}
