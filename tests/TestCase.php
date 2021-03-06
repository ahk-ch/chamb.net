<?php

namespace tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Storage;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function tearDown()
    {
        parent::tearDown();

        $this->refreshApplication();

        Storage::deleteDirectory('testing/ahk');
        Storage::deleteDirectory('testing/cms');
        Storage::deleteDirectory('testing/img');
    }
}
