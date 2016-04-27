<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace tests\functional\cms\administrator;

use App\Ahk\Article;
use App\Ahk\Company;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class articlesTest.
 */
class ArticlesTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_reads_published_articles_index()
    {
        $dbUserRepository = new DbUserRepository();
        $administrator = factory(User::class)->create(['verified' => true]);
        $dbUserRepository->assignAdministratorRole($administrator);

        $articles = factory(Article::class, 2)->create();

        $this->actingAs($administrator)
            ->visit(route('cms.articles.published'))
            ->seePageIs(route('cms.articles.published'))
            ->see('<title>' . trans('cms.articles') . ' | ' . 'CmsChamb</title>')
            ->see('<th>Actions</th>')
            ->see(route('cms.articles.edit', $articles->get(0)))
            ->see(route('cms.articles.edit', $articles->get(1)))
            ->see('<th>Title</th>')
            ->see('<td>' . $articles->get(0)->title . '</td>')
            ->see('<td>' . $articles->get(1)->title . '</td>')
            ->see('<th>Industry</th>')
            ->see('<td>' . $articles->get(0)->industry->name . '</td>')
            ->see('<td>' . $articles->get(1)->industry->name . '</td>')
            ->see('<th>Tags</th>')
            // tags
            ->see('<th>Author</th>')
            ->see('<th>Created at / Updated at</th>')
            ->see($articles->get(0)->name)
            ->see($articles->get(0)->name_of_contact_partner)
            ->see($articles->get(1)->name)
            ->see($articles->get(1)->name_of_contact_partner);
    }
}
