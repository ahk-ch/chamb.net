<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace tests\functional\cms\administrator;

use App\Ahk\Article;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\Tag;
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
    public function read_published_articles()
    {
        $dbUserRepository = new DbUserRepository();
        $administrator = factory(User::class)->create(['verified' => true]);
        $dbUserRepository->assignAdministratorRole($administrator);

        $dbArticleRepository = new DbArticleRepository();
        $articles = factory(Article::class, 2)->create(['publish' => true]);
        $tags = factory(Tag::class, 6)->create();
        $dbArticleRepository->assignTags($articles->get(0), [$tags->get(0)->id, $tags->get(1)->id]);
        $dbArticleRepository->assignTags($articles->get(1), [$tags->get(2)->id, $tags->get(3)->id]);
        $unPublishedArticle = factory(Article::class)->create(['publish' => false]);

        $this->actingAs($administrator)
            ->visit(route('cms.articles.published'))
            ->seePageIs(route('cms.articles.published'))
            ->see('<title>'.trans('cms.articles').' | '.'CmsChamb</title>')
            ->see('<th>Actions</th>')
            ->see(route('cms.articles.edit', $articles->get(0)))
            ->see(route('cms.articles.edit', $articles->get(1)))
            ->dontSee(route('cms.articles.edit', $unPublishedArticle))
            ->see('<th>Title</th>')
            ->see('<td>'.$articles->get(0)->title.'</td>')
            ->see('<td>'.$articles->get(1)->title.'</td>')
            ->dontSee('<td>'.$unPublishedArticle->title.'</td>')
            ->see('<th>Industry</th>')
            ->see('<td>'.$articles->get(0)->industry->name.'</td>')
            ->see('<td>'.$articles->get(1)->industry->name.'</td>')
            ->dontSee('<td>'.$unPublishedArticle->industry->name.'</td>')
            ->see('<th>Tags</th>')
            ->see($tags->get(0)->name)->see($tags->get(1)->name)
            ->see($tags->get(2)->name)->see($tags->get(3)->name)
            ->dontSee($tags->get(4)->name)
            ->dontSee($tags->get(5)->name)
            ->see('<th>Author</th>')
            ->see('<td>'.$articles->get(0)->author->name.'</td>')
            ->see('<td>'.$articles->get(1)->author->name.'</td>')
            ->dontSee('<td>'.$unPublishedArticle->author->name.'</td>')
            ->see('<th>Created at / Updated at</th>')
            ->see($articles->get(0)->created_at)
            ->see($articles->get(0)->updated_at)
            ->see($articles->get(1)->created_at)
            ->see($articles->get(1)->updated_at)
            ->dontSee($unPublishedArticle->created_at)
            ->dontSee($unPublishedArticle->updated_at);
    }
}
