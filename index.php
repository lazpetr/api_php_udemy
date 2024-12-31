<?php

echo 'Hi Laz Oh glorious leader!' , "\n";


// $response = file_get_contents("https://randomuser.me/api");
// echo $response;

// $data = json_decode($response, true);

// var_dump($data);

$ch = curl_init(); //Initialize cURL and assign to $ch

// Set options
// curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api"); // Set the URL to fetch
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string



curl_setopt_array($ch, [
  CURLOPT_URL => "https://randomuser.me/api",
  CURLOPT_RETURNTRANSFER => true
]);




// Execute the request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Output the response
echo $response , "\n";