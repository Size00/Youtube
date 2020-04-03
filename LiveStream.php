function online($youtubeID) {
			$API_Url = 'https://www.googleapis.com/youtube/v3/';
		    //$json_cache = 'json/online.json';  	
									

			$parameter = [ 'part'=> 'snippet',
						   'channelId' => "$youtubeID",
						   'type'=> 'video',
						   'eventType'=> 'live',
						   'key'=> '*****************']; //Get your own key
									
			$channel_URL = $API_Url . 'search?' . http_build_query($parameter); // url of content
	                $json_details = json_decode(file_get_contents($channel_URL), true); // jsoncoded
									
		        $offline = $json_details['pageInfo']['totalResults'] !== 0;
                        $titles = $json_details['items'][0]['snippet']['title'];
			$username = $json_details['items'][0]['snippet']['channelTitle'];
			$thumbnail = $json_details['items'][0]['snippet']['thumbnails']['high']['url'];
			 //if($youtubeID == NULL) { echo '<div id="card-1" class="card animated">'.('Data does not exsist').'</div>';}
			if($offline){										
					 echo $username. Is Live;
			}																		
}

online('Youtube_ID'); //   youtube channel id exp ( UCD8GawxPXpJnql466KekVXA )

// You could use foreach but making too much request could be expensive. 
