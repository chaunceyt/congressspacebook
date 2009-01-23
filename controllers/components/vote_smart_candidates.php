<?php
//votesmart wrapper
/**
 * Candidates class handles fetching lists of candidates
 * 
 * Copyright 2007 Project Vote Smart
 * Distributed under the BSD License
 * 
 * http://www.opensource.org/licenses/bsd-license.php
 * 
 */

class VoteSmartCandidatesComponent extends Object
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
        public function getByOfficeState($office_id, $state_id = 'NA', $election_year = null) {
                /**
                 * Returns a list of candidates/incumbents that fit the criteria
                 */
                
                $iface = "/Candidates.getByOfficeState";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&officeId=" . $office_id . "&stateId=" . $state_id . "&electionYear=" . $election_year;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getByLastname($lastname, $election_year = null) {
                /**
                 * Searches for candidates with exact lastname matches
                 */
                
                $iface = "/Candidates.getByLastname";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&lastName=" . $lastname . "&electionYear=" . $election_year;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getByLevenstein($lastname, $election_year = null) {
                /**
                 * Searches for candidates with fuzzy lastname match
                 */
                
                $iface = "/Candidates.getByLevenstein";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&lastName=" . $lastname . "&electionYear=" . $election_year;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getByElection($election_id) {
                /**
                 * Returns candidates in the provided election_id
                 */
                
                $iface = "/Candidates.getByElection";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&electionId=" . $election_id;
                
                return $this->getXml($iface, $args);
                
        }
        
        public function getByDistrict($district_id, $election_year = null) {
                /**
                 * Returns candidates in the provided district_id
                 */
                
                $iface = "/Candidates.getByDistrict";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&districtId=" . $district_id . "&electionYear=" . $election_year;
                
                return $this->getXml($iface, $args);
                
        }
}
