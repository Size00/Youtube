function playlist_id($list_id, $APIKEY,  $mResults){	 
$API_Url = 'https://www.googleapis.com/youtube/v3/';
	$parameter = [
	              'part'=> 'snippet',
	              'playlistId' => $list_id,
	              'maxResults'=> '20',
                'key'=> $APIKEY
		      ];
$channel_URL = $API_Url . 'channels?' . http_build_query($parameter);
$json_details = json_decode(file_get_contents($channel_URL), true);
  $parameter = [
                  'part'=> 'snippet'
                  'playlistId' => $json_details['items'][0]['contentDetails']['relatedPlaylists']['uploads'],
         	  'maxResults'=> $mResults,
                  'key'=> $APIKEY
		];
$channel_URL = $API_Url . 'playlistItems?' . http_build_query($parameter);
$jd_plist = json_decode(file_get_contents($channel_URL), true);
foreach( $jd_plist['items'] as $ch_vods){
$vod_title = $ch_vods['snippet']['title'] .' '. 
$vod_url = $ch_vods['snippet']['resourceId']['videoId'];
echo '( Title - '.$vod_title .'</br> Url - https://www.youtube.com/watch?v='.$vod_url.' )</br>';
 }
}
playlist_id('UCv9Edl_WbtbPeURPtFDo-uA','AI*****************************2N*iAw', 40); 

// UCv9Edl_WbtbPeURPtFDo-uA - Youtube channel ID
// get your key from google console and replace the *********************************
// The number of Youtube videos could be raised to anywhere from 1-100

/* This script is the exact same as channelPlaylist.php but instead of using channel_id you'll be getting the playlistid, 
playlistId is more direct.  I personally use a similar script to mass download music instead of getting links one by one  */
