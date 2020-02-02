<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\QuadxClient\QuadxClientInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class OrdersController extends Controller
{
    /**
     * @var \App\Services\QuadxClient\QuadxClientInterface
     */
    private $quadxClient;

    /**
     * OrdersController constructor.
     *
     * @param \App\Services\QuadxClient\QuadxClientInterface $quadxClient
     */
    public function __construct(QuadxClientInterface $quadxClient)
    {
        $this->quadxClient = $quadxClient;
    }

    /**
     * Create order in staging.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        return new JsonResponse($this->quadxClient->request('POST', $request->all()), 201);
    }

    /**
     * Update order in staging.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $trackingId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $trackingId): JsonResponse
    {
        return new JsonResponse(
            $this->quadxClient->request(
                'PUT',
                $request->all(),
                '/v2/orders/' . $trackingId . '/for-pickup'
            )
        );
    }
}
