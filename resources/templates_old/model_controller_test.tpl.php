[[open_php_tag]]

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use [[namespace]]\[[model]];

class [[model]]ControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/[[model_name_snake_case_plural]]");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
<?php foreach ($columns as $column): ?>
                    '<?=$column->Field?>',
<?php endforeach; ?>
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function show()
    {
        $[[model_name_snake_case_singular]] = [[model]]::first();

        $this->get("/[[model_name_snake_case_plural]]/{$[[model_name_snake_case_singular]]->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
<?php foreach ($columns as $column): ?>
            '<?=$column->Field?>',
<?php endforeach; ?>
        ]);
    }

    /**
     * @test
     */
    public function store()
    {
        $request = [
<?php foreach ($columns as $column): ?>
            // '<?=$column->Field?>' => 99999,
<?php endforeach; ?>
        ];

        $this->post("/[[model_name_snake_case_plural]]", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
<?php foreach ($columns as $column): ?>
            '<?=$column->Field?>',
<?php endforeach; ?>
        ]);
        $this->seeInDatabase('[[table_name]]', [
<?php foreach ($columns as $column): ?>
            // '<?=$column->Field?>' => 99999,
<?php endforeach; ?>
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $[[model_name_snake_case_singular]] = [[model]]::first();

        $request = [
<?php foreach ($columns as $column): ?>
            // '<?=$column->Field?>' => 99999,
<?php endforeach; ?>
        ];

        $this->put("/[[model_name_snake_case_plural]]/{$[[model_name_snake_case_singular]]->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
<?php foreach ($columns as $column): ?>
            '<?=$column->Field?>',
<?php endforeach; ?>
        ]);
        $this->seeInDatabase('[[table_name]]', [
<?php foreach ($columns as $column): ?>
            // '<?=$column->Field?>' => 99999,
<?php endforeach; ?>
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $[[model_name_snake_case_singular]] = [[model]]::first();

        $this->delete("/[[model_name_snake_case_plural]]/{$[[model_name_snake_case_singular]]->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($[[model_name_snake_case_singular]]);
        $this->seeJsonStructure([
<?php foreach ($columns as $column): ?>
            '<?=$column->Field?>',
<?php endforeach; ?>
        ]);
    }

}
