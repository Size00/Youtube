function youtube_channel_playlist($CHANNELID, $APIKEY,  $mResults){	 
$API_Url = 'https://www.googleapis.com/youtube/v3/';
	$parameter = [
	              'id'=> $CHANNELID,
	              'part'=> 'contentDetails',
	              'key'=> $APIKEY
				       ];
$channel_URL = $API_Url . 'channels?' . http_build_query($parameter);
$json_details = json_decode(file_get_contents($channel_URL), true);
  $parameter = [
                  'part'=> 'snippet',
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
youtube_channel_playlist('UCv9Edl_WbtbPeURPtFDo-uA','AI*****************************2N*iAw', 40); // get your key from google console and replace the *********************************
