<?php
/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
|
*/
$this->group(['prefix' => 'api'], function () {
    $this->group(['prefix' => 'v1'], function () {
        $this->group(['prefix' => 'industries/{industry_slug}'], function () {
            $this->get('companies', [
                'as'   => 'api.v1.industries.companies.index',
                'uses' => 'Api\V1\IndustriesController@indexCompanies'
            ]);
        });
    });
});
