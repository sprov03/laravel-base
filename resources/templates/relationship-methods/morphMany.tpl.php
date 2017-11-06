
    /**
     * Relationship to a <?=studly_case($interface)?> item
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function <?=camel_case(str_plural($otherModel))?>()
    {
        return $this->morphMany(<?=$otherModel?>::class, '<?=$interface?>');
    }
