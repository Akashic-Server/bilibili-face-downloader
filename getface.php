<?php

    // use -a to specify UID
    $param_arr = getopt('a:');
    
    // the url without UID
    $url_withoutuid = "https://api.bilibili.com/x/space/acc/info?mid=";
    
    // show UID
    echo "UID: " . $param_arr['a'] . " ";
    
    // combine url without UID and UID
    $url = $url_withoutuid . $param_arr['a'];
    
    // set the name of jpg file
    $file_name = $param_arr['a'] . ".jpg";

    // use bilibili api to get the user info json
    $json_info = file_get_contents($url);
    $json_array = json_decode($json_info, true);
    
    $content = file_get_contents($json_array['data']['face']); // url of face picture
    file_put_contents($file_name, $content); // download face picture

?>