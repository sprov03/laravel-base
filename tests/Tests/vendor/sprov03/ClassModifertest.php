<?php

namespace Tests\vendor\sprov03;

use CrudGenerator\Modifiers\ClassModifier;
use Tests\TestCase;

class ClassModifertest extends TestCase
{
    /**
     * @test
     */
    public function stringHasClassDoc()
    {
        $doc_block = <<<EOF
/**
 * Class ClassModifertest
 *
 * @property ClassModifier \$variable
 *
 * @package Tests\vendor\sprov03
 */
EOF;

        $this->assertTrue(ClassModifier::stringHasClassDoc($doc_block, 'variable'));
        $this->assertFalse(ClassModifier::stringHasClassDoc($doc_block, 'notDefinedVariable'));
    }

    /**
     * @test
     */
    public function stringhasmethod()
    {
        $doc_block = <<<eof
    public function hasmethod1()
    {
    }
    public function hasmethod2 ()
    {
    }
private function hasmethod3 ()
{
}
private function hasmethod4 (\$test, \$parameter)
{
}
    /**
     * Relationship to the FormField Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|FormField
     */
    public function formFields()
    {
        return \$this->hasMany(FormField::class, 'form_field_type', 'name');
    }
    
    /**
     * Relationship to the FormField Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|FormField
     */
    public function formFields ()
    {
        return \$this->hasMany(FormField::class, 'form_field_type', 'name');
    }
eof;

        $this->asserttrue(classmodifier::stringHasMethod($doc_block, 'hasmethod1'));
        $this->asserttrue(classmodifier::stringHasMethod($doc_block, 'hasmethod2'));
        $this->asserttrue(classmodifier::stringHasMethod($doc_block, 'hasmethod3'));
        $this->asserttrue(classmodifier::stringHasMethod($doc_block, 'hasmethod4'));
        $this->assertTrue(classmodifier::stringHasMethod($doc_block, 'formFields'));
        $this->assertFalse(classmodifier::stringHasMethod($doc_block, 'formField'));
        $this->assertfalse(classmodifier::stringHasMethod($doc_block, 'nothasmethod'));
    }

    /**
     * @test
     */
    public function stringHasUseStatement()
    {
        $doc_block = <<<eof
use CrudGenerator\Modifiers\ClassModifier;
use Tests\TestCase;
eof;

        $this->assertTrue(classmodifier::stringHasUseStatement($doc_block, 'CrudGenerator\Modifiers\ClassModifier'));
        $this->assertTrue(classmodifier::stringHasUseStatement($doc_block, 'Tests\TestCase'));
        $this->assertFalse(classmodifier::stringHasUseStatement($doc_block, 'Tests\Bad\Namespace'));
    }



    /**
     * @test
     */
    public function docBlockMatcher()
    {
        $doc_block = <<<eof
    public function hasmethod1()
    {
    }
    public function hasmethod2 ()
    {
    }
private function hasmethod3 ()
{
}
private function hasmethod4 (\$test, \$parameter)
{
}
    /**
     * Relationship to the FormField Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|FormField
     */
    public function formField()
    {
        return \$this->hasMany(FormField::class, 'form_field_type', 'name');
    }

START    
    /**
     * Relationship to the FormField Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|FormField
     */
    public function formFields ()
    {
        return \$this->hasMany(FormField::class, 'form_field_type', 'name');
    }
END
eof;
        $method = 'formFields';
        $doc_block_pattern = '(    \/\*\**.*?\*\/)';
        $function_declaration_patter = '((public|private|protected)\s*function\s*' . $method . '\s?\(\))';
        $method_block_pattern = '({.*?(}))({.*?})';
        $pattern = "/{$doc_block_pattern}?\\s*{$function_declaration_patter}\\s*{$method_block_pattern}/sm";

        preg_match($pattern, $doc_block, $matches);
        $start = strpos($doc_block, $matches[0]);
        $end = $start + count($matches[0]);
        $removed = str_replace($matches[0], "\nNEW CONTETN\n", $doc_block);
//        dd($removed);
//        dd($end);
//        dd($matches);
    }
}
