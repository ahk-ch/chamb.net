<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */

namespace integration\app\Ahk\Transformers;

use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Transformers\Api\CompanyApiTransformer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

class CompanyApiTransformerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_returns_an_array_of_shops()
    {
        $industry = factory(Industry::class)->create();
        $companyApiTransformer = new CompanyApiTransformer();
        $companies = factory(Company::class, 'without_industry', 2)->create(['industry_id' => $industry->id]);
        $firstCompany = $companies->get(0);
        $secondCompany = $companies->get(1);

        $expected = [
            [
                'name'            => $firstCompany->name,
                'slug'            => $firstCompany->slug,
                'description'     => $firstCompany->description,
                'focus'           => $firstCompany->focus,
                'business_leader' => $firstCompany->business_leader,
                'address'         => $firstCompany->address,
                'email'           => $firstCompany->email,
                'phone_number'    => $firstCompany->phone_number,
                'created_at'      => [
                    'date'     => $firstCompany->created_at->toDateTimeString(),
                    'timezone' => $firstCompany->created_at->tzName,
                ],
                'updated_at'      => [
                    'date'     => $firstCompany->updated_at->toDateTimeString(),
                    'timezone' => $firstCompany->updated_at->tzName,
                ],
                'link'            => route('industries.companies.show', [
                    'industry_slug' => $industry, 'company_slug' => $firstCompany->slug]),
                'relationships'   => [
                    'logo'    => [
                        'link' => route('files.download', ['path' => $firstCompany->logo->path]),
                        'name' => $firstCompany->logo->name
                    ],
                    'country' => [
                        'name' => $firstCompany->country->name
                    ],
                ]
            ],
            [
                'name'            => $secondCompany->name,
                'slug'            => $secondCompany->slug,
                'description'     => $secondCompany->description,
                'focus'           => $secondCompany->focus,
                'business_leader' => $secondCompany->business_leader,
                'address'         => $secondCompany->address,
                'email'           => $secondCompany->email,
                'phone_number'    => $secondCompany->phone_number,
                'created_at'      => [
                    'date'     => $secondCompany->created_at->toDateTimeString(),
                    'timezone' => $secondCompany->created_at->tzName,
                ],
                'updated_at'      => [
                    'date'     => $secondCompany->updated_at->toDateTimeString(),
                    'timezone' => $secondCompany->updated_at->tzName,
                ],
                'link'            => route('industries.companies.show', [
                    'industry_slug' => $industry, 'company_slug' => $secondCompany->slug]),
                'relationships'   => [
                    'logo'    => [
                        'link' => route('files.download', ['path' => $secondCompany->logo->path]),
                        'name' => $secondCompany->logo->name
                    ],
                    'country' => [
                        'name' => $secondCompany->country->name
                    ],
                ]
            ]
        ];

        $this->assertEquals($expected, $companyApiTransformer->transformCollection($companies));
    }
}
