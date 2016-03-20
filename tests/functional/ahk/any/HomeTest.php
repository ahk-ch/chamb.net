<?php

/**
 * @author Rizart Dokollari
 * @since  12/10/2015
 */
namespace tests\functional\ahk\any;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class HomeTest.
 */
class HomeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_it_reads_contents()
    {
        $this->visit(route('home_path'))
            ->seePageIs(route('home_path'))
            ->see(trans('ahk.home').' · Chamb.Net')
            ->see(trans('ahk.we_promote_and_support_bilateral_business_between_greece_and_germany'))
            ->see(route('industries.info', ['slug' => 'health']))
            ->see('Health')->see('fa fa-heartbeat')
            ->see(route('industries.info', ['slug' => 'logistics']))
            ->see('Logistics')->see('fa fa-bar-chart')
            ->see(route('industries.info', ['slug' => 'energy']))
            ->see('Energy')->see('fa fa-sun-o')
            ->see(route('industries.info', ['slug' => 'trade']))
            ->see('Trade')->see('fa fa-exchange')
            ->see(route('industries.info', ['slug' => 'law']))
            ->see('Law')->see('fa fa-university');
    }
}

