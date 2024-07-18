<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class cekOngkirController extends Controller
{
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('RAJAONGKIR_API_KEY');
        $this->baseUrl = env('RAJAONGKIR_BASE_URL');
        $this->client = new Client([
            'verify' => config('services.curl.verify'),
        ]);
    }
    public function index()
    {
        $cities = $this->getCities();
        return view('cek-ongkir', compact('cities'));
    }

    private function getCities()
    {
        try {
            $response = $this->client->request('GET', $this->baseUrl . '/city', [
                'headers' => [
                    'key' => $this->apiKey,
                ]
            ]);

            $cities = json_decode($response->getBody()->getContents(), true)['rajaongkir']['results'];
            return $cities;
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Request failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function result(Request $request)
    {
        try {
            $response = $this->client->request('POST', $this->baseUrl . '/cost', [
                'headers' => [
                    'key' => $this->apiKey,
                ],
                'form_params' => [
                    'origin' => '501', // Yogyakarta city_id is 501
                    'destination' => $request->input('destination'),
                    'weight' => $request->input('weight'),
                    'courier' => $request->input('courier')
                ]
            ]);

            $costs = json_decode($response->getBody()->getContents(), true)['rajaongkir']['results'][0]['costs'];
            return view('result', compact('costs'));
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Request failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}
