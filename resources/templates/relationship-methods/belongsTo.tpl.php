
    /**
     * Relationship to the `<?=$REFERENCED_TABLE_NAME?>` table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function <?=str_singular($REFERENCED_TABLE_NAME)?>()
    {
        return $this->belongsTo(<?=studly_case(str_singular($REFERENCED_TABLE_NAME))?>::class);
    }
