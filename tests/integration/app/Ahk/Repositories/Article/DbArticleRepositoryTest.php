<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   27/2/2016
 */
namespace tests\integration\app\Ahk\Repositories\Article;

use App\Ahk\Article;
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\Tag;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class DbArticleRepositoryTest.
 */
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
    public function it_returns_most_viewed_articles()
    {
        $dbArticleRepository = new DbArticleRepository();

        $this->assertCount(0, $dbArticleRepository->mostViewed()->get());

        $article1 = factory(Article::class)->create(['view_count' => 1, 'publish' => 1]);
        $article2 = factory(Article::class)->create(['view_count' => 5, 'publish' => 1]);
        $article3 = factory(Article::class)->create(['view_count' => 10, 'publish' => 1]);
        $keys = $article1->getFillable();

        $mostViewedArticles = $dbArticleRepository->mostViewed()->get();
        $this->assertCount(3, $mostViewedArticles);

        $mostViewedArticles = $dbArticleRepository->mostViewed(1)->get();
        $this->assertCount(1, $mostViewedArticles);
        $this->assertSame(
            array_only($article3->toArray(), $keys),
            array_only($mostViewedArticles->get(0)->toArray(), $keys));

        $mostViewedArticles = $dbArticleRepository->mostViewed(2)->get();
        $this->assertCount(2, $mostViewedArticles);
        $this->assertSame(
            array_only($article2->toArray(), $keys),
            array_only($mostViewedArticles->get(1)->toArray(), $keys));
        $this->assertSame(
            array_only($article3->toArray(), $keys),
            array_only($mostViewedArticles->get(0)->toArray(), $keys));

        // It return only 10 articles
        factory(Article::class, 10)->create(['publish' => 1]);
        $mostViewedArticles = $dbArticleRepository->mostViewed()->get();
        $this->assertCount(10, $mostViewedArticles);
    }

    /** @test */
    public function it_returns_most_viewed_articles_by_industry()
    {
        $dbArticleRepository = new DbArticleRepository();
        $industry = factory(Industry::class)->create();
        $article1 = factory(Article::class)->create(['industry_id' => $industry->id, 'view_count' => 1, 'publish' => 1]);
        $article2 = factory(Article::class)->create(['industry_id' => $industry->id, 'view_count' => 5, 'publish' => 1]);
        $article3 = factory(Article::class)->create(['industry_id' => $industry->id, 'view_count' => 10, 'publish' => 1]);
        $articleChecker = factory(Article::class)->create(['view_count' => 15, 'publish' => 1]);
        $keys = $article1->getFillable();

        $mostViewedArticles = $dbArticleRepository->mostViewedByIndustry($industry)->get();
        $this->assertCount(3, $mostViewedArticles);

        $mostViewedArticles = $dbArticleRepository->mostViewedByIndustry($industry, 1)->get();
        $this->assertCount(1, $mostViewedArticles);
        $this->assertSame(
            array_only($article3->toArray(), $keys),
            array_only($mostViewedArticles->get(0)->toArray(), $keys));

        $mostViewedArticles = $dbArticleRepository->mostViewedByIndustry($industry, 2)->get();
        $this->assertCount(2, $mostViewedArticles);
        $this->assertSame(
            array_only($article2->toArray(), $keys),
            array_only($mostViewedArticles->get(1)->toArray(), $keys));
        $this->assertSame(
            array_only($article3->toArray(), $keys),
            array_only($mostViewedArticles->get(0)->toArray(), $keys));

        // It return only 10 articles
        factory(Article::class, 10)->create(['publish' => 1, 'industry_id' => $industry->id]);
        $mostViewedArticles = $dbArticleRepository->mostViewedByIndustry($industry)->get();
        $this->assertCount(10, $mostViewedArticles);
    }

    /** @test */
    public function it_stores_an_article()
    {
        $dbArticleRepository = new DbArticleRepository();
        $expectedAuthor = factory(User::class)->create();
        $expectedIndustry = factory(Industry::class)->create();
        $expectedFile = factory(File::class)->create();
        $expectedArticle = factory(Article::class)->make();
        $keys = $expectedArticle->getFillable();
        $expectedData = array_only($expectedArticle->toArray(), $keys);

        $this->notSeeInDatabase('articles', $expectedData);

        $actualArticle = $dbArticleRepository->store(array_merge($expectedData, [
            'author_id'    => $expectedAuthor->id,
            'thumbnail_id' => $expectedFile->id,
            'industry_id'  => $expectedIndustry->id,
        ]));

        $this->seeInDatabase('articles', $expectedData);

        $this->assertSame($expectedIndustry->id, $actualArticle->industry->id);

        $this->assertSame($expectedFile->id, $actualArticle->thumbnail->id);

        $this->assertSame($expectedAuthor->id, $actualArticle->author->id);
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

        $this->assertEquals($expectedData, $actualData);
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

    /** @test */
    public function it_returns_published_articles()
    {
        $dbArticleRepository = new DbArticleRepository();
        $actualPublishedArticles = factory(Article::class, 2)->create(['publish' => 1]);
        $actualUnPublishedArticles = factory(Article::class, 2)->create(['publish' => 0]);
        $expectedPublishedArticles = $dbArticleRepository->published()->get();
        $keys = $actualPublishedArticles->get(0)->getFillable();

        $this->assertNotSame(
            array_only($expectedPublishedArticles->get(0)->toArray(), $keys),
            array_only($actualUnPublishedArticles->get(0)->toArray(), $keys));
        $this->assertNotSame(
            array_only($expectedPublishedArticles->get(1)->toArray(), $keys),
            array_only($actualUnPublishedArticles->get(1)->toArray(), $keys));

        $this->assertNotSame(
            array_only($expectedPublishedArticles->get(0)->toArray(), $keys),
            array_only($actualUnPublishedArticles->get(0)->toArray(), $keys));
        $this->assertNotSame(
            array_only($expectedPublishedArticles->get(1)->toArray(), $keys),
            array_only($actualUnPublishedArticles->get(1)->toArray(), $keys));
    }

    /** @test */
    public function it_paginates_published_articles_by_industry()
    {
        $dbArticleRepository = new DbArticleRepository();
        $industry = factory(Industry::class)->create();
        $expectedArticles = factory(Article::class, 2)
            ->create(['publish' => 1, 'industry_id' => $industry->id]);
        factory(Article::class, 2)->create(['publish' => 0]);
        $actualArticles = $dbArticleRepository->paginatePublishedByIndustry($industry);
        $keys = $expectedArticles->get(0)->getFillable();

        $this->assertCount(2, $actualArticles);

        $this->assertNotSame(
            array_only($expectedArticles->get(0)->toArray(), $keys),
            array_only($actualArticles->get(1)->toArray(), $keys));

        $this->assertNotSame(
            array_only($expectedArticles->get(1)->toArray(), $keys),
            array_only($actualArticles->get(0)->toArray(), $keys));
    }

    /** @test */
    public function it_returns_unpublished_articles()
    {
        $dbArticleRepository = new DbArticleRepository();
        $actualPublishedArticles = factory(Article::class, 2)->create(['publish' => 1]);
        $actualUnPublishedArticles = factory(Article::class, 2)->create(['publish' => 0]);
        $expectedPublishedArticles = $dbArticleRepository->unpublished()->get();
        $keys = $actualPublishedArticles->get(0)->getFillable();

        $this->assertNotSame(
            array_only($expectedPublishedArticles->get(0)->toArray(), $keys),
            array_only($actualPublishedArticles->get(0)->toArray(), $keys));
        $this->assertNotSame(
            array_only($expectedPublishedArticles->get(1)->toArray(), $keys),
            array_only($actualPublishedArticles->get(1)->toArray(), $keys));

        $this->assertNotSame(
            array_only($expectedPublishedArticles->get(0)->toArray(), $keys),
            array_only($actualPublishedArticles->get(0)->toArray(), $keys));
        $this->assertNotSame(
            array_only($expectedPublishedArticles->get(1)->toArray(), $keys),
            array_only($actualPublishedArticles->get(1)->toArray(), $keys));
    }
}

