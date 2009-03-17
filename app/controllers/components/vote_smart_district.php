<?php
//votesmart wrapper
/**
 * District class contains all the methods necessary 
 * 
 * Copyright 2007 Project Vote Smart
 * Distributed under the BSD License
 * 
 * http://www.opensource.org/licenses/bsd-license.php
 * 
 */
class VoteSmartDistrictComponent extends Object
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
        public function getByOfficeState($office_id, $state_id = 'NA', $district_name = '') {
                /**
                 * Returns districts service the office and state provided
                 */
                
                $iface = "/District.getByOfficeState";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&officeId=" . $office_id . "&stateId=" . $state_id . "&districtName=" . $district_name;
                
                return $this->getXml($iface, $args);
                
        }
}
