<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */

namespace App\Ahk\Transformers;

abstract class Transformer
{
    /**
     * Transform a collection of items.
     *
     * @param array $items
     *
     * @return array
     */
    public function transformCollection($items)
    {
        $transformedItems = [];

        foreach ($items as $item) {
            $transformedItems[] = $this->transform($item);
        }

        return $transformedItems;
    }

    /**
     * @param $item
     *
     * @return mixed
     */
    abstract public function transform($item);
}
