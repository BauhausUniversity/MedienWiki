<?php

require_once( dirname( dirname( dirname( dirname( __file__ ) ) ) ) . '/common/omconfig.php' );

/* SelectCategoryTagCloud Mediawiki Extension
 *
 * @author Andreas Rindler (mediawiki at jenandi dot com)
 * @credits Leon Weber <leon.weber@leonweber.de> & Manuel Schneider <manuel.schneider@wikimedia.ch>, Daniel Friesen http://wiki-tools.com
 * @licence GNU General Public Licence 2.0 or later
 * @description Adds a category selection tag cloud to the edit and upload pages and enables a Google Suggest like completion of categories entered by the user.
 *
*/
//
mysql_connect( OMCOLLAB_DB_HOSTNAME, OMWIKI_DB_USERNAME, OMWIKI_DB_PASSWORD );
mysql_select_db( OMWIKI_DATABASE_NAME );

if(isset($_GET['q'])) {
    $searchString = mysql_escape_string($_GET['q']);
    
    if($searchString != NULL) {
        $searchString = str_replace( ' ', '_', $searchString );
		$sql          = mysql_query( "SELECT DISTINCT cl_to as cats FROM "
		                           . OMWIKI_DB_TABLE_PREFIX ."categorylinks "
		                           . "WHERE LOWER(cl_to) LIKE LOWER('".$searchString."%')");    

    	$suggestStrings=array();
    	
        while($row = mysql_fetch_assoc($sql)) {
         	array_push($suggestStrings,$row['cats']);        
        }
        echo implode(";",$suggestStrings);

        //free up result set
        mysql_free_result($sql);
    }
}
?>