
    /**
     * Relationship to this <?=studly_case($interface)?> items
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function <?=camel_case(str_plural($otherModel))?>()
    {
        return $this->morphToMany(<?=$otherModel?>::class, '<?=$interface?>');
    }
