<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LocationService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getCoordinates($location)
    {
        try {
            $response = $this->client->get('https://nominatim.openstreetmap.org/search', [
                'query' => [
                    'q' => $location,
                    'format' => 'json',
                    'addressdetails' => 1,
                    'limit' => 1,
                ],
                'headers' => [
                    'User-Agent' => 'YourAppName/1.0 (your-email@example.com)', // Replace with your app details
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (!empty($data) && isset($data[0])) {
                $latitude = $data[0]['lat'];
                $longitude = $data[0]['lon'];

                return [
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ];
            } else {
                return ['error' => 'Location not found'];
            }
        } catch (RequestException $e) {
            // Log the error or handle it as needed
            return ['error' => $e->getMessage()];
        }
    }
}
