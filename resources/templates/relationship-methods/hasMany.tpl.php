
    /**
     * Relationship to the `<?=$TABLE_NAME?>` table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function <?=str_plural($TABLE_NAME)?>()
    {
        return $this->hasMany(<?=studly_case(str_singular($TABLE_NAME))?>::class);
    }
