<?php
/**
 * @author Rizart Dokollari
 * @since  06/03/16
 */
namespace functional\ahk\any\Industry;

use App\Ahk\Article;
use App\Ahk\Company;
use App\Ahk\Decision;
use App\Ahk\Event;
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\User;
use App\Ahk\Workgroup;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class WorkGroupTest.
 */
class WorkGroupTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_view_work_groups_index()
    {
        $dbIndustryRepository = new DbIndustryRepository();
        $industry = factory(Industry::class)->create();
        $workGroups = factory(Workgroup::class, 11)->create();
        $workGroupIds = $workGroups->lists('id')->toArray();
        $dbIndustryRepository->assignWorkGroupsById($industry, $workGroupIds);

        $this
            ->visit(route('industries.work_groups.index', ['industry_slug' => $industry->slug]))
            ->seePageIs(route('industries.work_groups.index', ['industry_slug' => $industry->slug]))
            ->see('<title> Work-groups - Health · Chamb.Net</title>')
            ->see('<h2>All Work-groups</h2>')
            ->see('<span class="results-number">11 result(s)</span>')
            ->seeLink($workGroups->get(0)->name,
                route('industries.work_groups.show', [
                    'industry_slug' => $industry->slug, 'work_group_slug' => $workGroups->get(0)->slug,
                ]))
            ->see($workGroups->get(1)->description)
            ->seeLink($workGroups->get(1)->name,
                route('industries.work_groups.show', [
                    'industry_slug' => $industry->slug, 'work_group_slug' => $workGroups->get(1)->slug,
                ]))
            ->seeLink(2,
                route('industries.work_groups.index', [
                    'industry_slug' => $industry->slug, 'page' => 2,
                ]));
    }

    /** @test */
    public function it_reads_work_groups_show()
    {
        $dbIndustryRepository = new DbIndustryRepository();
        $dbArticleRepository = new DbArticleRepository();
        $dbCompanyRepository = new DbCompanyRepository();

        $users = factory(User::class, 2)->create();
        $industry = factory(Industry::class)->create();
        $workGroup = factory(Workgroup::class)->create();
        $dbIndustryRepository->assignWorkGroupsById($industry, [$workGroup->id]);
        $articles = factory(Article::class, 3)->create(['industry_id' => $industry->id, 'publish' => true]);
        $articleChecker = factory(Article::class)->create();

        $company = factory(Company::class)->create(['industry_id' => $industry->id, 'user_id' => $users->get(0)->id]);
        $files = factory(File::class, 2)->create();
        $dbCompanyRepository->assignFiles($company, $files);

        $events = factory(Event::class, 2)->create();
        $dbCompanyRepository->assignEvents($company, $events);

        $decisions = factory(Decision::class, 2)->create();
        $dbCompanyRepository->assignDecisions($company, $decisions);

        $this
            ->visit(route('industries.work_groups.show',
                ['industry_slug' => $industry->slug, 'work_group_slug' => $workGroup->slug]))
            ->seePageIs(route('industries.work_groups.show',
                ['industry_slug' => $industry->slug, 'work_group_slug' => $workGroup->slug]))
            ->see("<title> $workGroup->name - $industry->name · Chamb.Net</title>")
            ->see('<span>Protocols</span>')
            ->see('<span>Ideas</span>')
            ->see('<span>Decisions</span>')
            ->see('<span>Events</span>')
            ->see('<h2 class="title-v2 title-center">POPULAR NEWS</h2>')
            ->see($articles->get(0)->title)
            ->see($articles->get(1)->title)
            ->see($articles->get(2)->title)
            ->dontSee($articleChecker->title)
            ->see('<h2 class="title-v2 title-center">PROTOCOLS</h2>')
            ->see($files->get(0)->name)
            ->see($files->get(0)->description)
            ->see(route('files.download', ['path' => $files->get(0)->path]))
            ->see($files->get(1)->name)
            ->see($files->get(1)->description)
            ->see(route('files.download', ['path' => $files->get(1)->path]))
            ->see("<span>{$events->get(0)->start_date->format('d')}</span>")
            ->see("<small>{$events->get(0)->start_date->format('m, Y')}</small>")
            ->see($events->get(0)->name)
            ->see($events->get(0)->description)
            ->see("<span>{$events->get(1)->start_date->format('d')}</span>")
            ->see("<small>{$events->get(1)->start_date->format('m, Y')}</small>")
            ->see($events->get(1)->name)
            ->see($events->get(1)->description)
            ->see('<i class="fa fa-pencil"></i>Decisions')
            ->see($decisions->get(0)->name)
            ->see($events->get(0)->description)
            ->see($decisions->get(1)->name)
            ->see($events->get(1)->description)
            ->see($users->get(0)->name)
            ->see($users->get(0)->created_at->format('M D, Y'))
            ->see($users->get(0)->facebook_url)
            ->see($users->get(0)->twitter_url)
            ->see($users->get(0)->linked_in_url)
            ->see($users->get(0)->email)
            ->see($users->get(0)->website_url)
            ->dontSee($users->get(1)->name);
    }
}
