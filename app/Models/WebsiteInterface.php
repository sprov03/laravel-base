<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WebsiteInterface
 * @mixin Model
 *
 * Relationships
 * @property Site $site
 *
 * @package Models
 */
interface WebsiteInterface
{

    /**
     * Relationship to a Website item
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne|Site
     */
    public function site();
}