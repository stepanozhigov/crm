<?php


namespace App\Services\PaymentServices\HttpHandlers\Rbk;


use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class RbkHandler
{

    /**
     * @param string $url
     * @return Response
     * @throws RequestException
     */
    protected function sendGetRequest(string $url): Response
    {
        return Http::withHeaders([
            'cache-control' =>  'no-cache',
            'X-Request-ID' => mt_rand(1000000000, 9999999999),
        ])->withToken(env('RBK_API_KEY'))
            ->timeout(20)
            ->retry(3, 200)
            ->contentType('application/json; charset=utf-8')
            ->get($url);
    }

    /**
     * @param string $url
     * @param array $command
     * @param string|null $apiKey
     * @return Response
     * @throws RequestException
     */
    protected function sendPostRequest(string $url, array $command = [], string $apiKey = null): Response
    {
        if (!$apiKey) {
            $apiKey = env('RBK_API_KEY');
        }

        return Http::withHeaders([
            'cache-control' =>  'no-cache',
            'X-Request-ID' => mt_rand(1000000000, 9999999999),
        ])->withToken($apiKey)
            ->timeout(20)
            ->retry(3, 200)
            ->contentType('application/json; charset=utf-8')
            ->post($url, $command);
    }

}
