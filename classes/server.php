<?php

	// This class contains details about the files on the server, directories, etc
	
	class Server
	{

		/* Used to pull out the list of all the php files in a directory*/
		function list_php_files($path){
			// to remove any (.) and (..) from the directory list
			$files = array_diff(scandir($path), array('.', '..'));
			return $files;
		}

		/* Used to pull out the list of all the files and folders in a directory*/
		function list_all_files($path) {
			$files = scandir($path);
			print_r($files);
		}

		/* Generate time ago using the given timestamp */
		static function time_elapsed_string($datetime, $full = false) {
		    $now = new DateTime;
		    $ago = new DateTime($datetime);
		    $diff = $now->diff($ago);

		    $diff->w = floor($diff->d / 7);
		    $diff->d -= $diff->w * 7;

		    $string = array(
		        'y' => 'year',
		        'm' => 'month',
		        'w' => 'week',
		        'd' => 'day',
		        'h' => 'hour',
		        'i' => 'minute',
		        's' => 'second',
		    );
		    foreach ($string as $k => &$v) {
		        if ($diff->$k) {
		            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		        } else {
		            unset($string[$k]);
		        }
		    }

		    if (!$full) $string = array_slice($string, 0, 1);
		    return $string ? implode(', ', $string) . ' ago' : 'just now';
		}

	}