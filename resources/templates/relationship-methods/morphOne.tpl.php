
    /**
     * Relationship to a <?=studly_case($interface)?> item
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function <?=camel_case($otherModel)?>()
    {
        return $this->morphOne(<?=$otherModel?>::class, '<?=$interface?>');
    }
