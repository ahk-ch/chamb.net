<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   27/2/2016
 */
namespace tests\integration\app\Ahk\Repositories\Tag;

use App\Ahk\Repositories\Tag\DbTagRepository;
use App\Ahk\Tag;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class DbTagRepositoryTest.
 */
class DbTagRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_returns_all_tags()
    {
        $dbTagRepository = new DbTagRepository();
        $tags = factory(Tag::class, 2)->create();
        $keys = $tags->get(0)->getFillable();

        $this->assertSame(
            array_only($tags->toArray(), $keys),
            array_only($dbTagRepository->all()->get()->toArray(), $keys));
    }

    /** @test */
    public function it_stores_a_tag()
    {
        $dbTagRepository = new DbTagRepository();
        $actualAuthor = factory(User::class)->create();
        $expectedTag = factory(Tag::class)->make();
        $keys = $expectedTag->getFillable();
        $expectedData = array_only($expectedTag->toArray(), $keys);

        $this->notSeeInDatabase('tags', $expectedData);

        $actualTag = $dbTagRepository->store($actualAuthor, $expectedData);

        $this->seeInDatabase('tags', $expectedData);

        $this->assertSame($actualAuthor->id, $actualTag->author->id);
    }

    /** @test */
    public function it_updates_tag_primary_data_by_id()
    {
        $dbTagRepository = new DbTagRepository();
        $expectedTag = factory(Tag::class)->make();
        $currentTag = factory(Tag::class)->create();
        $keys = $expectedTag->getFillable();
        $expectedData = array_only($expectedTag->toArray(), $keys);
        $currentData = array_only($currentTag->toArray(), $keys);

        $this->seeInDatabase('tags', $currentData);
        $this->notSeeInDatabase('tags', $expectedData);

        $dbTagRepository->updateById($currentTag->id, $expectedData);

        $this->notSeeInDatabase('tags', $currentData);
        $this->seeInDatabase('tags', $expectedData);
    }

    /** @test */
    public function it_returns_tag_by_id()
    {
        $dbTagRepository = new DbTagRepository();
        $currentTag = factory(Tag::class)->create();
        $keys = $currentTag->getFillable();
        $expectedData = array_only($currentTag->toArray(), $keys);
        $actualData = array_only($dbTagRepository->getById($currentTag->id)->toArray(), $keys);

        $this->assertEquals($expectedData, $actualData);
    }
}
