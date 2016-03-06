<?php namespace tests\functional\ahk\any\Industry;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use App\Ahk\Article;
use App\Ahk\Industry;
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
		$industry = factory(Industry::class)->create();
		$articles = factory(Article::class, 2)->create(['publish' => true, 'industry_id' => $industry->id]);
		$unpublishedArticle = factory(Article::class)->create(['publish' => false, 'industry_id' => $industry->id]);
		$publishedOtherIndustry = factory(Article::class)->create(['publish' => true]);

		$this->visit(route('industries.news', ['industry_slug' => $industry->slug]))
			->seePageIs(route('industries.news', ['industry_slug' => $industry->slug]))
			->see("<title> " . trans('ahk.news') . " · Chamb.Net</title>")
			->dontSee(route('files.render', ['path' => $unpublishedArticle->thumbnail->path]))
			->dontSee($unpublishedArticle->author->name)
			->dontSee($publishedOtherIndustry->author->name)
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
