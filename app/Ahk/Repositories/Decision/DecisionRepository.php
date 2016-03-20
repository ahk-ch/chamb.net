<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  10/03/16
 */
namespace App\Ahk\Repositories\Decision;

use App\Ahk\Decision;
use App\Ahk\File;

/**
 * Interface DecisionRepository.
 */
interface DecisionRepository
{
    /**
     * @param Decision $decision
     * @param File     $file
     *
     * @return Decision|false
     */
    public function assignFile(Decision $decision, File $file);

    /**
     * Return all decisions.
     *
     * @return mixed
     */
    public function all();
}

