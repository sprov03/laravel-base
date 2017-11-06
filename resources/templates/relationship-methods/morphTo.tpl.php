
    /**
     * Relationship to a <?=studly_case($interface)?> item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function <?=camel_case(str_singular($interface))?>()
    {
        return $this->morphTo();
    }
