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
        public function getNpat($can_id) {
                /**
                 * Returns the most recent NPAT filled out by a candidate
                 */
                
                $iface = "/Npat.getNpat";
                $args = "?key=" . _KEY_ . "&o=" . _OUTPUT_ . "&candidateId=" . $can_id;
                
                return $this->getXml($iface, $args);
                
        }
}
