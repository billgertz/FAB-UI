<?php
session_start();
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && count($_POST) > 0){


    //=========== CONFIG FILES
    include_once ('/var/www/fabui/ajax/config.php');
    include_once ('/var/www/fabui/ajax/lib/database.php');
    include_once ('/var/www/fabui/ajax/lib/utilities.php');

    $_first_name   = $_POST['first_name'];
    $_last_name    = $_POST['last_name'];
    $_email        = $_POST['email'];
    $_password     = $_POST['password'];
	$_net          = $_POST['net'];
	$_net_password = $_POST['net_password'];
	
    
    /** CHECK IF IS WIFI CONNCECTION */
    $_temp    = explode('-', $_net);
	$_is_wifi = $_temp[0] == 'wifi' ? true : false;
	
	if($_is_wifi){
		
		$_net = str_replace('wifi-', '', $_net);
		shell_exec("sudo python /var/www/fabui/python/connection_setup.py -n".$_net." -p".$_net_password);
		
		shell_exec("sudo ifdown wlan0");
		sleep(3);
		shell_exec("sudo ifup wlan0");
		
	}
    
	

    //inizialitizzo database
    $_command = 'sudo mysql -u '.DB_USERNAME.' -p'.DB_PASSWORD.' -h '.DB_HOSTNAME.'  < '.SQL_INSTALL_DB;
	
	
	
    shell_exec($_command);
	
	
    /** LOAD DB */
	$db = new Database();
	/** ADD USER */
	
	$_settings['theme-skin'] = 'smart-style-0';
	$_settings['avatar']     = '';
	$_settings['token']      = '';
	
	$_user_data['first_name'] = $_first_name;
	$_user_data['last_name']  = $_last_name;
	$_user_data['email']      = $_email;
	$_user_data['password']   = md5($_password);
	$_user_data['settings']   = json_encode($_settings);
	
	/** ADD TASK RECORD TO DB */ 
	$id_user = $db->insert('sys_user', $_user_data);
	
	$wlan     = wlan();
	$wlan_ip = isset($wlan['ip']) ? $wlan['ip'] : '';
	/** UPDATE WIFI */
	$_data_update = array();
	$_data_update['value'] = json_encode(array('ssid' => $_net, 'password' => $_net_password, 'ip' =>$wlan_ip));
	$db->update('sys_configuration', array('column' => 'sys_configuration.key', 'value' => 'wifi', 'sign' => '='), $_data_update);
	
	
	$db->close();

    /** DELETE AUTOINSTALL FILE */
    shell_exec('sudo rm /var/www/AUTOINSTALL');
	
	
	/** */
	shell_exec('sudo ln -s /var/www/upload/ /var/www/fabui/upload/');
	
	
	/** MOVE DEFAULT FILES TO FOLDERS */
	shell_exec('sudo cp /var/www/recovery/install/file/Marvin_KeyChain_FABtotum.gcode /var/www/upload/gcode/Marvin_KeyChain_FABtotum.gcode');
	
	
	
	/** CLEAN SESSION */
	foreach($_SESSION as $key => $value){
		unset($_SESSION[$key]);
	}
	
      
    header('Location: /');
    
     
}else{
    
    echo "Access denied";
    
}


?>