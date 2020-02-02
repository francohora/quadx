<?php
declare(strict_types=1);

namespace App\Services\QuadxClient;

interface QuadxClientInterface
{
    /**
     * Request to quadx staging.
     *
     * @param string $method
     * @param mixed[] $payload
     * @param null|string $endpoint
     *
     * @return mixed
     */
    public function request(string $method, array $payload, ?string $endpoint = null);
}
