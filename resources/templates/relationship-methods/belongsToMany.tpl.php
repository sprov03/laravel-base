
    /**
     * Relationship to the `<?=$REFERENCED_TABLE_NAME?>` table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function <?=camel_case(str_plural($REFERENCED_TABLE_NAME))?>()
    {
        return $this->belongsToMany(<?=studly_case(str_singular($REFERENCED_TABLE_NAME))?>::class, '<?=$TABLE_NAME?>');
    }
