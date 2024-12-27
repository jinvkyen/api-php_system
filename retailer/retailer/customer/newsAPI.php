<?php
// Set the AniList API endpoint
$apiUrl = 'https://graphql.anilist.co';

// Define the GraphQL query
$query = '{
  Page {
    media (sort: POPULARITY_DESC, type: ANIME) {
      title {
        romaji
        english
      }
      coverImage {
        large
      }
      popularity
    }
  }
}';

// Set up the request headers
$headers = [
    'Content-Type: application/json',
    'Accept: application/json',
];

// Initialize cURL
$ch = curl_init($apiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['query' => $query]));

// Execute the request and fetch the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    $data = []; // Set $data to an empty array if there's an error
} else {
    // Decode the response
    $data = json_decode($response, true);
}

// Close cURL
curl_close($ch);
?>
