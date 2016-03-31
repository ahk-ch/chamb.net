<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  10/03/16
 */
namespace App\Ahk\Repositories\Decision;

use App\Ahk\Decision;
use App\Ahk\File;
use App\Ahk\Repositories\DbRepository;

/**
 * Class DbDecisionRepository.
 */
class DbDecisionRepository extends DbRepository implements DecisionRepository
{
    /**
     * DbDecisionRepository constructor.
     *
     * @param Decision $model
     */
    public function __construct(Decision $model = null)
    {
        $model = $model === null ? new Decision : $model;

        parent::__construct($model);
    }

    /**
     * @param Decision $decision
     * @param File     $file
     *
     * @return Decision|false
     */
    public function assignFile(Decision $decision, File $file)
    {
        $decision->file()->associate($file);

        return $decision->save() ? $decision : false;
    }

    /**
     * Return all decisions.
     *
     * @return mixed
     */
    public function all()
    {
        return Decision::all();
    }
}
