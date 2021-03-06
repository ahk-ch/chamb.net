<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   26/11/2015
 */
namespace App\Ahk\Repositories\Article;

use App\Ahk\Article;
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class DbArticleRepository.
 */
class DbArticleRepository extends DbRepository implements ArticleRepository
{
    /**
     * DbArticleRepository constructor.
     *
     * @param Article $model
     */
    public function __construct(Article $model = null)
    {
        $model = $model === null ? new Article : $model;

        parent::__construct($model);
    }

    /**
     * Get all articles.
     *
     * @return Collection
     */
    public function all()
    {
        return Article::with('author', 'industry', 'tags');
    }

    /**
     * Store an article on the storage.
     *
     * @param array $fillable Validated array parameters: author_id, industry_id, thumbnail_id
     *
     * @return Article|false
     */
    public function store(array $fillable)
    {
        $article = new Article($fillable);

        $article->assignAuthor(User::find($fillable['author_id']));

        $article->assignIndustry(Industry::find($fillable['industry_id']));

        $article->assignThumbnail(File::find($fillable['thumbnail_id']));

        return $article->save() ? $article : false;
    }

    /**
     * Update an article given it's id.
     *
     * @param          $articleId
     * @param array $fillable
     * @param Industry $industry
     *
     * @return mixed
     */
    public function updateById($articleId, array $fillable, Industry $industry)
    {
        $article = $this->getById($articleId);

        $article->fill($fillable);

        $article->assignIndustry($industry);

        return $article->save() ? $article : false;
    }

    /**
     * Get an article given it's id.
     *
     * @param $id
     *
     * @return Article|\Illuminate\Database\Eloquent\Model|null|static
     */
    public function getById($id)
    {
        return Article::with('author', 'industry', 'tags')
            ->where('articles.id', $id)->first();
    }

    /**
     * Update the tags of an article.
     *
     * @param       $id Article id
     * @param array $tagIds
     *
     * @return Article|false
     */
    public function updateTagsById($id, array $tagIds)
    {
        $article = $this->getById($id);

        $article->tags()->sync($tagIds);

        return $article->save() ? $article : false;
    }

    /**
     * Return unpublished articles.
     *
     * @return mixed
     */
    public function unpublished()
    {
        return Article::with('author', 'industry', 'tags')->where('publish', false);
    }

    /**
     * Paginate published articles of an industry.
     *
     * @param Industry $industry
     * @param int $perPage
     * @param array $columns
     * @param string $pageName
     * @param null $page
     *
     * @return mixed
     */
    public function paginatePublishedByIndustry(Industry $industry, $perPage = 10, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return Article::where('industry_id', $industry->id)
            ->where('publish', true)
            ->with('author', 'industry', 'tags')
            ->paginate($perPage, $columns, $pageName, $page);
    }

    /**
     * Get most viewed articles.
     *
     * @param int $max
     *
     * @return mixed
     */
    public function mostViewed($max = 10)
    {
        return $this->published()->orderBy('view_count', 'desc')->take($max);
    }

    /**
     * Return published articles.
     *
     * @return mixed
     */
    public function published()
    {
        return Article::with('author', 'industry', 'tags')->where('publish', true);
    }

    /**
     * Get most viewed articles.
     *
     * @param     $industry
     * @param int $max
     *
     * @return mixed
     */
    public function mostViewedByIndustry($industry, $max = 10)
    {
        return $this->published()
            ->where('industry_id', $industry->id)
            ->orderBy('view_count', 'desc')
            ->take($max);
    }

    /**
     * Assign tags to the given article.
     *
     * @param Article $article
     * @param $tagIds
     * @return mixed
     */
    public function assignTags(Article $article, array $tagIds)
    {
        $article->tags()->sync($tagIds);

        return $article->save() ? $article : false;
    }
}
