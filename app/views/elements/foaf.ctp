
<!--
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
         xmlns:foaf="http://xmlns.com/foaf/0.1/"
         xmlns:rel="http://purl.org/vocab/relationship/"
         xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#">

<foaf:Person rdf:nodeID="<?php echo $lawmaker['Lawmaker']['username']; ?>">
<?php if($lawmaker['Lawmaker']['firstname'] != '') { ?>
    <foaf:firstname><?php echo $lawmaker['Lawmaker']['firstname']; ?></foaf:firstname>
<?php } ?>
<?php if($lawmaker['Lawmaker']['lastname'] != '') { ?>
    <foaf:surname><?php echo $lawmaker['Lawmaker']['lastname']; ?></foaf:surname>
<?php } ?>
<?php if($lawmaker['Lawmaker']['title'] != '') { ?>
    <foaf:title><?php echo $lawmaker['Lawmaker']['title']; ?></foaf:title>
<?php } ?>
<?php if($lawmaker['Lawmaker']['gender'] != '') { ?>
    <foaf:gender><?php echo $lawmaker['Lawmaker']['gender']; ?></foaf:gender>
<?php } ?>
<?php if($lawmaker['Lawmaker']['bioguide_id'] != '') { 
            $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg';
            if(file_exists($path_to_image)) {
?>
<foaf:img><?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?></foaf:img>
<?php 
            }
}
?>
<?php if($lawmaker['Lawmaker']['website'] != '') { ?>
    <foaf:homepage><?php echo $lawmaker['Lawmaker']['website']; ?></foaf:homepage>
<?php } ?>
<?php if($lawmaker['Lawmaker']['twitter_id'] != '') { ?>
    <foaf:holdsAccount>
    <foaf:OnlineAccount rdf:about="http://www.twitter.com/<?php echo $lawmaker['Lawmaker']['twitter_id']; ?>" />
    <foaf:accountServiceHomepage rdf:resource="http://twitter.com/"/>
    <foaf:accountName><?php echo $lawmaker['Lawmaker']['twitter_id']; ?></foaf:accountName>
    </foaf:holdsAccount>
<?php } ?>
<?php if($lawmaker['Lawmaker']['bioguide_id'] != '') { ?>
    <foaf:holdsAccount>
    <foaf:OnlineAccount rdf:about="http://bioguide.congress.gov/scripts/biodisplay.pl?index=<?php echo $lawmaker['Lawmaker']['bioguide_id']; ?>" />
    <foaf:accountServiceHomepage rdf:resource="http://bioguide.congress.gov/"/>
    <foaf:accountName><?php echo $lawmaker['Lawmaker']['bioguide_id']; ?></foaf:accountName>
    </foaf:holdsAccount>
<?php } ?>
<?php if($lawmaker['Lawmaker']['votesmart_id'] != '') { ?>
    <foaf:holdsAccount>
    <foaf:OnlineAccount rdf:about="http://www.votesmart.org/voting_category.php?can_id=<?php echo $lawmaker['Lawmaker']['votesmart_id']; ?>" />
    <foaf:accountServiceHomepage rdf:resource="http://votesmart.org/"/>
    <foaf:accountName><?php echo $lawmaker['Lawmaker']['votesmart_id']; ?></foaf:accountName>
    </foaf:holdsAccount>
<?php } ?>
<?php if($lawmaker['Lawmaker']['fec_id'] != '') { ?>
    <foaf:holdsAccount>
    <foaf:OnlineAccount rdf:about="http://query.nictusa.com/cgi-bin/cancomsrs/?_08+<?php echo $lawmaker['Lawmaker']['fec_id']; ?>" />
    <foaf:accountServiceHomepage rdf:resource="http://fec.gov/"/>
    <foaf:accountName><?php echo $lawmaker['Lawmaker']['fec_id']; ?></foaf:accountName>
    </foaf:holdsAccount>
<?php } ?>
<?php if($lawmaker['Lawmaker']['govtrack_id'] != '') { ?>
    <foaf:holdsAccount>
    <foaf:OnlineAccount rdf:about="http://www.govtrack.us/congress/person.xpd?id=<?php echo $lawmaker['Lawmaker']['govtrack_id']; ?>" />
    <foaf:accountServiceHomepage rdf:resource="http://govtrack.us/"/>
    <foaf:accountName><?php echo $lawmaker['Lawmaker']['govtrack_id']; ?></foaf:accountName>
    </foaf:holdsAccount>
<?php } ?>
<?php if($lawmaker['Lawmaker']['congresspedia_url'] != '') { 
    $account_name = str_replace('http://www.sourcewatch.org/index.php?title=','',$lawmaker['Lawmaker']['congresspedia_url']);
    ?>
    <foaf:holdsAccount>
    <foaf:OnlineAccount rdf:about="<?php echo $lawmaker['Lawmaker']['congresspedia_url']; ?>" />
    <foaf:accountServiceHomepage rdf:resource="http://www.sourcewatch.org/index.php?title=Congresspedia"/>
    <foaf:accountName><?php echo $account_name; ?></foaf:accountName>
    </foaf:holdsAccount>
<?php } ?>
<?php /* if($lawmaker['Lawmaker']['latitude'] != 0 && $member['Member']['longitude']) { ?>
    <foaf:based_near>
            <geo:Point>
            <geo:lat><?php //echo $lawmaker['Lawmaker']['latitude']; ?></geo:lat>
            <geo:long><?php // echo $lawmaker['Lawmaker']['longitude']; ?></geo:long>
        </geo:Point>
    </foaf:based_near>
<?php } */ ?>
<?php if($lawmaker['Lawmaker']['congress_office'] != '') { ?>
    <foaf:address><?php echo $lawmaker['Lawmaker']['congress_office']; ?></foaf:address>
<?php } ?>
<?php /* if($lawmaker['Lawmaker']['about'] != '') { ?>
    <foaf:about><![CDATA[<?php echo htmlentities($lawmaker['Lawmaker']['about'], ENT_COMPAT, 'UTF-8'); ?>]]></foaf:about>
<?php } */ ?>
<?php /*  foreach($contacts as $contact) {
    if(strpos($contact['Lawmaker']['username'], '@') === false) { ?>
        <foaf:knows>
            <foaf:Person>
                <rdfs:seeAlso rdf:resource="http://<?php echo $contact['Lawmaker']['username']; ?>"/>
            </foaf:Person>
        </foaf:knows>
    <?php } ?>
<?php } */ ?>
</foaf:Person>
</rdf:RDF>
-->

