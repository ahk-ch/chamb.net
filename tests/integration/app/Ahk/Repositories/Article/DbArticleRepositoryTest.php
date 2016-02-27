<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   27/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\Article;

use App\Ahk\Article;
use App\Ahk\Industry;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\Tag;
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

		$this->assertSame(
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
		$this->assertSame($actualIndustry->id, $actualArticle->industry->id);
	}

	/** @test */
	public function it_updates_article_by_id()
	{
		$dbArticleRepository = new DbArticleRepository();
		$expectedIndustry = factory(Industry::class)->create();
		$currentArticle = factory(Article::class)->create();
		$expectedArticle = factory(Article::class)->make();
		$keys = $currentArticle->getFillable();
		$currentData = array_only($currentArticle->toArray(), $keys);
		$expectedData = array_only($expectedArticle->toArray(), $keys);

		$this->seeInDatabase('articles', $currentData);
		$this->notSeeInDatabase('articles', $expectedData);
		$this->assertNotSame($expectedIndustry->id, $currentArticle->industry->id);

		$actualArticle = $dbArticleRepository
			->updateById($currentArticle->id, $expectedData, $expectedIndustry);

		$this->seeInDatabase('articles', $expectedData);
		$this->notSeeInDatabase('articles', $currentData);
		$this->assertSame($expectedIndustry->id, $actualArticle->industry->id);
	}

	/** @test */
	public function it_returns_article_by_id()
	{
		$dbArticleRepository = new DbArticleRepository();
		$currentArticle = factory(Article::class)->create();
		$keys = $currentArticle->getFillable();
		$expectedData = array_only($currentArticle->toArray(), $keys);
		$actualData = array_only($dbArticleRepository->getById($currentArticle->id)->toArray(), $keys);

		$this->assertSame($expectedData, $actualData);
	}

	/** @test */
	public function it_update_tags_by_id()
	{
		$dbArticleRepository = new DbArticleRepository();
		$article = factory(Article::class)->create();
		$expectedTags = factory(Tag::class, 2)->create();
		$newTagIds = [$expectedTags->get(0)->id, $expectedTags->get(1)->id];

		$this->assertCount(0, $article->tags()->get());

		$article = $dbArticleRepository->updateTagsById($article->id, $newTagIds);

		$actualTags = $article->tags()->get();

		$this->assertCount(2, $actualTags);

		$this->assertSame(
			$expectedTags->get(0)->name,
			$actualTags->get(0)->name);

		$this->assertSame(
			$expectedTags->get(1)->name,
			$actualTags->get(1)->name);
	}
}