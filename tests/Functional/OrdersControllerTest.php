<?php
declare(strict_types=1);

namespace Tests\App\Functional;

use App\Services\QuadxClient\QuadxClientInterface;
use Tests\App\AbstractTestCase;

/**
 * @covers \App\Http\Controllers\OrdersController
 */
final class OrdersControllerTest extends AbstractTestCase
{
    /**
     * Should create a order in staging.
     *
     * @return void
     */
    public function testCreateOrderSuccessful(): void
    {
        $payload = $this->getPayload();

        $mocked = \Mockery::mock(QuadxClientInterface::class);
        $mocked->shouldReceive('request')
            ->once()
            ->andReturn([
                'body' => 'some-body'
            ]);

        $this->app->instance(QuadxClientInterface::class, $mocked);

        $this->json('POST', '/orders', $payload);

        $this->assertResponseStatus(201);
    }

    /**
     * Should update an order in staging.
     *
     * @return void
     */
    public function testUpdateOrderSuccessful(): void
    {
        $payload = $this->getPayload();

        $mocked = \Mockery::mock(QuadxClientInterface::class);
        $mocked->shouldReceive('request')
            ->once()
            ->andReturn([
                'body' => 'some-body'
            ]);

        $this->app->instance(QuadxClientInterface::class, $mocked);

        $this->json('PUT', \sprintf('/orders/%s', '0164-6688-DAJS'), $payload);

        $this->assertResponseStatus(200);
    }

    /**
     * Create a payload.
     *
     * @return mixed[]
     */
    private function getPayload(): array
    {
        return [
            'name' => 'Check',
            'shipment' => 'small-pouch',
            'line_1' => '2F U221 Bldg. A',
            'city' => 'Makati',
            'state' => 'Metro Manila',
            'postal_code' => 1600,
            'country' => 'PH',
            'currency' => 'PHP',
            'total' => 1250,
            'payment_method' => 'cod',
            'payment_provider' => 'lbcx',
            'buyer_name' => 'Apol buyer yehey',
            'delivery_address' =>
                [
                    'name' => 'Apol buyerr yehey',
                    'company' => 'Maxis',
                    'phone_number' => '6358972',
                    'mobile_number' => '+63907117421',
                    'line_1' => '3F U311 Bldg. C',
                    'line_2' => 'Jade St.',
                    'district' => 'San Fernando',
                    'city' => 'Mangaldan',
                    'state' => 'Pangasinan',
                    'postal_code' => '4233',
                    'country' => 'PH',
                    'remarks' => 'Optional notes / remarks go here.',
                ],
            'email' => 'johndoe@email.com',
            'contact_number' => '+639172274819',
            'items' =>
                [
                    [
                        'type' => 'product',
                        'description' => 'Red Shirt',
                        'amount' => 1250,
                        'quantity' => 1,
                        'metadata' =>
                            [
                                'size' => 'medium',
                                'color' => 'red',
                            ],
                    ],
                ],
        ];
    }
}
