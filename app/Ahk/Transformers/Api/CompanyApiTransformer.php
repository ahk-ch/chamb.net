<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */

namespace App\Ahk\Transformers\Api;

use App\Ahk\Transformers\Transformer;

class CompanyApiTransformer extends Transformer implements ApiTransformer
{

    /**
     * @param $item
     *
     * @return mixed
     */
    public function transform($item)
    {
        return [
            'name'            => $item->name,
            'slug'            => $item->slug,
            'description'     => $item->description,
            'focus'           => $item->focus,
            'business_leader' => $item->business_leader,
            'address'         => $item->address,
            'email'           => $item->email,
            'phone_number'    => $item->phone_number,
            'created_at'      => [
                'date'     => $item->created_at->toDateTimeString(),
                'timezone' => $item->created_at->tzName,
            ],
            'updated_at'      => [
                'date'     => $item->updated_at->toDateTimeString(),
                'timezone' => $item->updated_at->tzName,
            ],
            'link'            => route('industries.companies.show', [
                'industry_slug' => $item->industry->slug, 'company_slug' => $item->slug
            ]),
            'relationships'   => [
                'logo'    => [
                    'link' => route('files.download', ['path' => $item->logo->path]),
                    'name' => $item->logo->name
                ],
                'country' => [
                    'name' => $item->country->name
                ],
            ]
        ];
    }
}
