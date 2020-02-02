<?php
declare(strict_types=1);

namespace Tests\App;

use Laravel\Lumen\Testing\TestCase;

abstract class AbstractTestCase extends TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

}
