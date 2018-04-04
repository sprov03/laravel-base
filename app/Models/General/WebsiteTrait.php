<?php

namespace General;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WebsiteTrait
 * @mixin WebsiteInterface
 * @mixin Model
 *
 * Relationships
 * @property Site $site
 *
 * @package General
 */
trait WebsiteTrait
{

    /**
     * Relationship to a Website item
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne|Site
     */
    public function site()
    {
        return $this->morphOne(Site::class, 'website');
    }
}