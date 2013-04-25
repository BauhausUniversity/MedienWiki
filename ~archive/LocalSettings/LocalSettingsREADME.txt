#DO NOT NEVER EVER WRITE ANY DATABASE USERLOGIN OR PASSWORD INTO LOCALSETTINGS.PHP
#DO NOT NEVER EVER WRITE ANY PRIVATE KEY INTO LOCALSETTINGS.PHP

#Instead add these lines to LocalSettings.php

# make the private settings private
# (also see http://www.mediawiki.org/wiki/Manual_talk:Wiki_family#Step_2:_Add_structure_for_separating_wikis )
require_once( "$IP/LocalSettingsPrivate.php" );

# then duplicate LocalSettingsPrivateDemo.php and rename it to LocalSettingsPrivate.php
# (it is automatically excluded from this git repo)
# copy/fill in the required fields and make sure they are deleted from LocalSettings.php

