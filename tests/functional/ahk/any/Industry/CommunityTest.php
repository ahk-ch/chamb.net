<?php
/**
 * @author Rizart Dokollari
 * @since  12/10/2015
 */
namespace tests\functional\ahk\any\Industry;

use App\Ahk\Company;
use App\Ahk\Industry;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class HomeTest.
 */
class CommunityTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_it_reads_companies_index()
    {
        $industry = factory(Industry::class)->create();
        $companies = factory(Company::class, 2)->create(['industry_id' => $industry->id]);

        $this->visit(route('industries.companies.index', ['industry_slug' => $industry->slug]))
            ->seePageIs(route('industries.companies.index', ['industry_slug' => $industry->slug]))
            ->see('<title> '.trans('ahk.community').' · Chamb.Net</title>')
            ->see(trans('ahk.discover_the_community'))
            ->see($companies->get(0)->name)
            ->see(route('files.render', ['path' => $companies->get(0)->logo->path]))
            ->see($companies->get(1)->name)
            ->see(route('files.render', ['path' => $companies->get(1)->logo->path]));
    }

    /** @test */
    public function test_it_reads_companies_show()
    {
        $industry = factory(Industry::class)->create();
        $company = factory(Company::class)->create(['industry_id' => $industry->id]);

        $this->visit(route('industries.companies.show', ['industry_slug' => $industry->slug, 'company_slug' => $company->slug]))
            ->seePageIs(route('industries.companies.show', ['industry_slug' => $industry->slug, 'company_slug' => $company->slug]))
            ->see("<title> {$company->name} - {$industry->name} · Chamb.Net</title>")
            ->see(route('files.render', ['path' => $company->logo->path]));
    }
    
}
