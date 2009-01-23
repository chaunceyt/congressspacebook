<?php
//votesmart wrapper

/**
 * Npat class contains all the methods necessary 
 * 
 * Copyright 2007 Project Vote Smart
 * Distributed under the BSD License
 * 
 * http://www.opensource.org/licenses/bsd-license.php
 * 
 */


class VoteSmartNpatComponent extends Object
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
        public function getNpat($can_id) {
                /**
                 * Returns the most recent NPAT filled out by a candidate
                 */
                
                $iface = "/Npat.getNpat";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&candidateId=" . $can_id;
                
                return $this->getXml($iface, $args);
                
        }
}
