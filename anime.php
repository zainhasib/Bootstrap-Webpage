<?php 

        $user = 'Anime_Joy'; 
        $password = 'iGudPucNCi0j'; 


        function find_anime($anime) {
            $ch = curl_init(); 
            $anime = str_replace(" ", "+", $anime);
            error_reporting(0);
            curl_setopt($ch, CURLOPT_URL, "https://myanimelist.net/api/anime/search.xml?q=$anime");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
            
            curl_setopt($ch, CURLOPT_USERPWD, $GLOBALS['user'] . ":" . $GLOBALS['password']); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            
            $result = curl_exec($ch); 
            
            $result = simplexml_load_string($result)or die(); 
            $data = $result->entry[0]->synopsis;
            $data1 = str_replace("[Written by MAL Rewrite]", "", $result->entry[1]->synopsis);
            $data1 = str_replace("[i]", "<i>", $data1);
            $data1 = str_replace("[/i]", "</i>", $data1);
            $data2 = str_replace("[Written by MAL Rewrite]", "", $result->entry[0]->synopsis);
            $data2 = str_replace("[i]", "<i>", $data2);
            $data2 = str_replace("[/i]", "</i>", $data2);
            if(strlen($data) < 100){
             return $data1; }
            else {
             return $data2;
            }
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch); 
            }
        }

        function find_img($anime) {
            $ch = curl_init(); 
            $anime = str_replace(" ", "+", $anime);
            curl_setopt($ch, CURLOPT_URL, "https://myanimelist.net/api/anime/search.xml?q=".$anime);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
            
            curl_setopt($ch, CURLOPT_USERPWD, $GLOBALS['user'] . ":" . $GLOBALS['password']); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            
            $result = curl_exec($ch); 
            
            $result = simplexml_load_string($result)or die("Error: Cannot create object"); 
             return $result->entry[0]->image; 
      
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch); 
            }   
        }


        function find_title($anime) {
            $ch = curl_init(); 
            $anime = str_replace(" ", "+", $anime);
            
            curl_setopt($ch, CURLOPT_URL, "https://myanimelist.net/api/anime/search.xml?q=$anime");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
            
            curl_setopt($ch, CURLOPT_USERPWD, $GLOBALS['user'] . ":" . $GLOBALS['password']); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            
            $result = curl_exec($ch); 
            
            $result = simplexml_load_string($result)or die("Error: Cannot create object"); 
             return $result->entry[0]->title; 
      
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch); 
            }   
        }
        ?>