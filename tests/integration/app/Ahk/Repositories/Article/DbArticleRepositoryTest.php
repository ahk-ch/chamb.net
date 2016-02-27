<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   27/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\Article;

use App\Ahk\Article;
use App\Ahk\Industry;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class DbArticleRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_returns_all_articles()
	{
		$dbArticleRepository = new DbArticleRepository();
		$articles = factory(Article::class, 2)->create();
		$keys = $articles->get(0)->getFillable();

		$this->assertEquals(
			array_only($articles->toArray(), $keys),
			array_only($dbArticleRepository->all()->get()->toArray(), $keys));
	}

	/** @test */
	public function it_stores_an_article()
	{
		$dbArticleRepository = new DbArticleRepository();
		$actualAuthor = factory(User::class)->create();
		$actualIndustry = factory(Industry::class)->create();
		$expectedArticle = factory(Article::class)->make();
		$keys = $expectedArticle->getFillable();
		$expectedData = array_only($expectedArticle->toArray(), $keys);

		$this->notSeeInDatabase('articles', $expectedData);

		$actualArticle = $dbArticleRepository->store($actualAuthor, $expectedData, $actualIndustry);

		$this->seeInDatabase('articles', $expectedData);

		$this->assertEquals($actualIndustry->id, $actualArticle->industry->id);
		$this->assertEquals($actualAuthor->id, $actualArticle->author->id);
	}
}