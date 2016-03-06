<?php namespace tests\functional\ahk\any\Industry;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use App\Ahk\Article;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class HomeTest
 */
class NewsTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_reads_contents()
	{
		$articles = factory(Article::class, 2)->create(['publish' => true]);
		$unpublishedArticle = factory(Article::class)->create(['publish' => false]);

		$this->visit(route('health.news'))
			->seePageIs(route('health.news'))
			->see("<title> " . trans('ahk.news') . " · Chamb.Net</title>")
			->dontSee(route('files.render', ['path' => $unpublishedArticle->thumbnail->path]))
			->dontSee($unpublishedArticle->author->name)
			->dontSee($unpublishedArticle->title)
			->dontSee($unpublishedArticle->industry->name)
			->dontSee($unpublishedArticle->created_at)
			->dontSee($unpublishedArticle->description)
			->see(route('files.render', ['path' => $articles->get(0)->thumbnail->path]))
			->see($articles->get(0)->author->name)
			->see($articles->get(0)->industry->name)
			->see($articles->get(0)->created_at->format('M d, Y'))
			->see($articles->get(0)->title)
			->see($articles->get(0)->description)
			->see(route('files.render', ['path' => $articles->get(1)->thumbnail->path]))
			->see($articles->get(1)->author->name)
			->see($articles->get(1)->industry->name)
			->see($articles->get(1)->created_at->format('M d, Y'))
			->see($articles->get(1)->title)
			->see($articles->get(1)->description);
	}
}
