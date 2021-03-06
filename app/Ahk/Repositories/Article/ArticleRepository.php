<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */
namespace App\Ahk\Repositories\Article;

use App\Ahk\Article;
use App\Ahk\Industry;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface ArticleRepository.
 */
interface ArticleRepository
{
    /**
     * Get all articles.
     *
     * @return Collection
     */
    public function all();

    /**
     * Store an article on the storage.
     *
     * @param array $fillable Validated array parameters: author_id, industry_id, thumbnail_id
     * @param array $fillable
     *
     * @return Article|false
     */
    public function store(array $fillable);

    /**
     * Update an article given by its id.
     *
     * @param          $articleId
     * @param array $fillable
     * @param Industry $industry
     *
     * @return mixed
     */
    public function updateById($articleId, array $fillable, Industry $industry);

    /**
     * Return published articles.
     *
     * @return mixed
     */
    public function published();

    /**
     * Return published articles of an industry.
     *
     * @param Industry $industry
     *
     * @return mixed
     */
    public function paginatePublishedByIndustry(Industry $industry);

    /**
     * Return unpublished articles.
     *
     * @return mixed
     */
    public function unpublished();

    /**
     * Get an article given its id.
     *
     * @param $id
     *
     * @return Article
     */
    public function getById($id);

    /**
     * Update tags of an article.
     *
     * @param       $id
     * @param array $tagIds
     *
     * @return mixed
     */
    public function updateTagsById($id, array $tagIds);

    /**
     * Get most viewed articles.
     *
     * @param int $max
     *
     * @return mixed
     */
    public function mostViewed($max = 10);

    /**
     * Get most viewed articles.
     *
     * @param     $industry
     * @param int $max
     *
     * @return mixed
     */
    public function mostViewedByIndustry($industry, $max = 10);

    /**
     * Assign tags to the given article.
     *
     * @param Article $article
     * @param $tagIds
     * @return mixed
     */
    public function assignTags(Article $article, array $tagIds);
}
