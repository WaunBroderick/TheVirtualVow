<?php 
$var_name = $_GET['spouseName'];
$var_email = $_GET['spouseEmail'];
$var_travel = $_GET['travelLoc'];



echo "Hello World";

echo $var_name;
echo $var_email;
echo $var_travel;


// // API key placeholders that must be filled in by users.
// // You can find it on
// // https://www.yelp.com/developers/v3/manage_app
// $API_KEY = "J1LS_z-Jxt9IlsGLmB15PmVGRtWRVUY9oU439WaDDGoUqucRiutBMXfRjEYCt4s26RwI9xbjyhcGjh0HU_NauO-FbDflR8vQZnUDsuI0XU8NFVDs3PPSxgWg_8rDW3Yx";

// // Complain if credentials haven't been filled out.
// assert($API_KEY, "Please supply your API key.");

// // API constants, you shouldn't have to change these.
// $API_HOST = "https://api.yelp.com";
// $SEARCH_PATH = "/v3/businesses/search";
// $BUSINESS_PATH = "/v3/businesses/";  // Business ID will come after slash.

// // Defaults for our simple example.
// $DEFAULT_TERM = "dinner";
// $DEFAULT_LOCATION = "San Francisco, CA";
// $SEARCH_LIMIT = 3;



// /** 
//  * Makes a request to the Yelp API and returns the response
//  * 
//  * @param    $host    The domain host of the API 
//  * @param    $path    The path of the API after the domain.
//  * @param    $url_params    Array of query-string parameters.
//  * @return   The JSON response from the request      
//  */
// function request($host, $path, $url_params = array()) {
//     // Send Yelp API Call
//     try {
//         $curl = curl_init();
//         if (FALSE === $curl)
//             throw new Exception('Failed to initialize');

//         $url = $host . $path . "?" . http_build_query($url_params);
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => $url,
//             CURLOPT_RETURNTRANSFER => true,  // Capture response.
//             CURLOPT_ENCODING => "",  // Accept gzip/deflate/whatever.
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 30,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => "GET",
//             CURLOPT_HTTPHEADER => array(
//                 "authorization: Bearer " . $GLOBALS['API_KEY'],
//                 "cache-control: no-cache",
//             ),
//         ));

//         $response = curl_exec($curl);

//         if (FALSE === $response)
//             throw new Exception(curl_error($curl), curl_errno($curl));
//         $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//         if (200 != $http_status)
//             throw new Exception($response, $http_status);

//         curl_close($curl);
//     } catch(Exception $e) {
//         trigger_error(sprintf(
//             'Curl failed with error #%d: %s',
//             $e->getCode(), $e->getMessage()),
//             E_USER_ERROR);
//     }

//     return $response;
// }

// /**
//  * Query the Search API by a search term and location 
//  * 
//  * @param    $term        The search term passed to the API 
//  * @param    $location    The search location passed to the API 
//  * @return   The JSON response from the request 
//  */
// function search($term, $location) {
//     $url_params = array();
    
//     $url_params['term'] = $term;
//     $url_params['location'] = $location;
//     $url_params['limit'] = $GLOBALS['SEARCH_LIMIT'];
    
//     return request($GLOBALS['API_HOST'], $GLOBALS['SEARCH_PATH'], $url_params);
// }

// /**
//  * Query the Business API by business_id
//  * 
//  * @param    $business_id    The ID of the business to query
//  * @return   The JSON response from the request 
//  */
// function get_business($business_id) {
//     $business_path = $GLOBALS['BUSINESS_PATH'] . urlencode($business_id);
    
//     return request($GLOBALS['API_HOST'], $business_path);
// }

// /**
//  * Queries the API by the input values from the user 
//  * 
//  * @param    $term        The search term to query
//  * @param    $location    The location of the business to query
//  */
// function query_api($term, $location) {     
//     $response = json_decode(search($term, $location));
//     $business_id = $response->businesses[0]->id;
    
//     echo sprintf(
//         "%d businesses found, querying business info for the top result \"%s\"\n\n",         
//         count($response->businesses),
//         $business_id
//     );
    
//     $response = get_business($business_id);
    
//     echo sprintf("Result for business \"%s\" found:\n", $business_id);
//     $pretty_response = json_encode(json_decode($response), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
//     echo "$pretty_response\n";
//     echo "YOU MADE IT";
// }

// /**
//  * User input is handled here 
//  */
// $longopts  = array(
//     "term::",
//     "location::",
// );
    
// $options = getopt("", $longopts);

// $term = $options['term'] ?: $GLOBALS['DEFAULT_TERM'];
// $location = $options['location'] ?: $GLOBALS['DEFAULT_LOCATION'];

// query_api($term, $location);

function callAPI($method, $url, $data){
    $curl = curl_init();
 
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
 
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'APIKEY: J1LS_z-Jxt9IlsGLmB15PmVGRtWRVUY9oU439WaDDGoUqucRiutBMXfRjEYCt4s26RwI9xbjyhcGjh0HU_NauO-FbDflR8vQZnUDsuI0XU8NFVDs3PPSxgWg_8rDW3Yx',
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
 }

 $get_data = callAPI('GET', 'https://api.yelp.com/v3/businesses/search?location=Toronto'.$user['User']['customer_id'], false);
 $response = json_decode($get_data, true);
 $errors = $response['response']['errors'];
 $data = $response['response']['data'][0];

echo "hello world";
echo "Made it";

foreach ($response as $item) {
    echo $item;
}


?>




