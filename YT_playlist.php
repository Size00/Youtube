function youtube_channel_playlist($playlist_id, $APIKEY,  $mResults){	 
$API_Url = 'https://www.googleapis.com/youtube/v3/';
$parameter = [
             'part'=> 'snippet',
	          'playlistId' => $playlist_id,
	          'maxResults'=>  $mResults,
	          'key'=> $APIKEY	];
$channel_URL = $API_Url . 'playlistItems?' . http_build_query($parameter);
$jd_plist = json_decode(file_get_contents($channel_URL), true);
foreach( $jd_plist['items'] as $ch_vods){
$vod_title = $ch_vods['snippet']['title'] .' '. 
$vod_url = $ch_vods['snippet']['resourceId']['videoId'];
echo '( Title - '.$vod_title .'</br> Url - https://www.youtube.com/watch?v='.$vod_url.' )</br>';
 }
}
youtube_channel_playlist('PL4QNnZJr8sRPmuz_d87ygGR6YAYEF-fmw','**************************', 20); 

// UCv9Edl_WbtbPeURPtFDo-uA - Youtube channel ID
// get your key from google console and replace the *********************************
// The number of Youtube videos could be raised to anywhere from 1-100

/* This script is the exact same as channelPlaylist.php but instead of using channel_id you'll be getting the playlistid, 
playlistId is more direct.  I personally use a similar script to mass download music instead of getting links one by one  */
 
 // I deleted the other script cause it was fked //
