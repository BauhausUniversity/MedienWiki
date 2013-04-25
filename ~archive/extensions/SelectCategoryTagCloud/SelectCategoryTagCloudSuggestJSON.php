<?php

/* SelectCategoryTagCloud Mediawiki Extension
 *
 * @author Andreas Rindler (mediawiki at jenandi dot com)
 * @credits Leon Weber <leon.weber@leonweber.de> & Manuel Schneider <manuel.schneider@wikimedia.ch>, Daniel Friesen http://wiki-tools.com
 * @licence GNU General Public Licence 2.0 or later
 * @description Adds a category selection tag cloud to the edit and upload pages and enables a Google Suggest like completion of categories entered by the user.
 *
*/

require_once( dirname( dirname( dirname( dirname( __file__ ) ) ) ) . '/common/omconfig.php' );

$link = mysql_connect( OMCOLLAB_DB_HOSTNAME, OMWIKI_DB_USERNAME, OMWIKI_DB_PASSWORD );
if (!$link) {
    die("Can't connect to Wiki DB");
}
mysql_select_db( OMWIKI_DATABASE_NAME ) or die("Can't select Wiki DB");


if(isset($_GET['q'])) {
 $searchString = $_GET['q'];
    
    $searchString = str_replace(' ','_',$searchString);
 
    if($searchString != NULL) {
        $sql = mysql_query("SELECT cl_to as cats , count(*) as cat_count FROM ".OMWIKI_DB_TABLE_PREFIX ."categorylinks WHERE LOWER(cl_to) LIKE LOWER('".$searchString."%') group by cl_to order by 2 desc");    
        $suggestStrings=array();
		
		// produce the json header
		echo "{ ";
			
		$rowCounter=0;
		$totalRows = mysql_num_rows($sql);
        while($row = mysql_fetch_assoc($sql)) {
			echo '"tag'.$rowCounter.'":{"tagtext": "'.$row['cats'].'", "tagcount": "'.$row['cat_count'].'"}';
			$rowCounter++;
			if ($rowCounter < $totalRows) {
				echo ",";
			}

		}
        echo "}";
        
        //free up result set
        mysql_free_result($sql);
    }
}

?>