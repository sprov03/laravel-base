
    /**
     * Relationship to the `<?=$TABLE_NAME?>` table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function <?=str_singular($TABLE_NAME)?>()
    {
        return $this->hasOne(<?=studly_case(str_singular($TABLE_NAME))?>::class);
    }
