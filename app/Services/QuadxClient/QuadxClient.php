<?php
declare(strict_types=1);

namespace App\Services\QuadxClient;

use GuzzleHttp\ClientInterface;

final class QuadxClient implements QuadxClientInterface
{
    /**
     * @var string
     */
    private const QUADX_STAGING_URI = '/v2/orders';

    /**
     * @var \GuzzleHttp\ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $token;

    /**
     * QuadxClient constructor.
     *
     * @param \GuzzleHttp\ClientInterface $client
     */
    public function __construct(ClientInterface $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function request(string $method, array $body, ?string $endpoint = null)
    {
        $header = [
            'Authorization' => \sprintf('Bearer %s', $this->token)
        ];

        return $this->client->request(
            $method,
            $endpoint ?? self::QUADX_STAGING_URI,
            ['headers' => $header, 'form_params' => $body]
        );
    }
}
