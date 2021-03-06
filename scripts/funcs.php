<?php
    
    /* Server Information
	–––––––––––––––––––––––––––––––––––––––––––––––––– */
	
	$server_Debug = "9332";
	$server_Port = "9339";
	$server_key = "UCSGL"; 
	
    /* Get's IP
	–––––––––––––––––––––––––––––––––––––––––––––––––– */
    
    $server_Ip = file_get_contents('http://bot.whatismyipaddress.com/');
    
    /* API installation
	–––––––––––––––––––––––––––––––––––––––––––––––––– */
	
	 if ($isOnline = @fsockopen($server_Ip,$server_Port,$errno,$errstr,1)) {
	  fclose($isOnline);  //Establish connection to api if server online
				
		$serverStatus = '<div class="callout callout-success"><h4>Server Online!</h4><p>Server is online, you can start playing with us!</div>';
        $memClans = file_get_contents("http://$server_Ip:$server_Debug/$server_key/inmemclans");
        $onPlayers = file_get_contents("http://$server_Ip:$server_Debug/$server_key/onlineplayers");
        $players = file_get_contents("http://$server_Ip:$server_Debug/$server_key/totalclients");
        $usedram = file_get_contents("http://$server_Ip:$server_Debug/$server_key/ram");
        $info = '<i class="fa fa-circle text-success"></i> Online';
        $skin = 'skin-green';
        
        
    } else {  //Else display N/A instead if throwing 404 and reuining the page!
			
		$serverStatus = '<div class="callout callout-danger"><h4>Server Offline!</h4><p>Server is Offline, we are working on to fix it! Will start to work soon.</p></div>';
		$memClans = "N/A";
	    $onPlayers = "N/A";
	    $players = "N/A";
	    $usedram = "N/A";
	    $info = '<i class="fa fa-circle text-danger"></i> Offline';
	    $skin = 'skin-red';
	    
	}
	
    /* Version Checker
	–––––––––––––––––––––––––––––––––––––––––––––––––– */
	
	 $Version = "2.1";
	 $update = file_get_contents('https://static.smartclashcoc.com/smartstats/update.txt');
	 $update_Url = file_get_contents('https://static.smartclashcoc.com/smartstats/updateurl.txt');
	 
    /* Update notification
	–––––––––––––––––––––––––––––––––––––––––––––––––– */
	
    if($update > $Version) {
        $update_Avail = "<div class=\"callout callout-warning\"><h4>Update Available!</h4><p>Smart Stats has an update. Download it from <a href=\"$update_Url\" target=\"_blank\">Here</a></div>";
    }
    else {
    	$update_Avail = "&nbsp"; //Prevent error
    }
    
?>
