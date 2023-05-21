<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Notebook;

class NotebookTest extends TestCase
{
    use RefreshDatabase;
    public function test_get_notebook()
    {
        $notebook = Notebook::factory()->create();
        $response = $this->getJson("/api/v1/notebook");
        $response->assertStatus(200);
        $response->assertJsonFragment(
            [
             "id" => $notebook->id,
             "fio" => $notebook->fio,
             "company" => $notebook->company,
             "phone_number" => $notebook->phone_number,
             "email" => $notebook->email,
             "birthday" => $notebook->birthday,
             "photo" => $notebook->photo
            ]
        );
    }

    public function test_get_concrete_notebook()
    {
        $notebook = Notebook::factory()->create();
        dump(json_encode($notebook));
        $response = $this->getJson("/api/v1/notebook/{$notebook->id}");
        $response->assertStatus(200);
        $response->assertJsonFragment(
            [
                "id" => $notebook->id,
                "fio" => $notebook->fio,
                "company" => $notebook->company,
                "phone_number" => $notebook->phone_number,
                "email" => $notebook->email,
                "birthday" => $notebook->birthday,
                "photo" => $notebook->photo
            ]
        );
    }

    public function test_create_notebook()
    {
        $notebook = Notebook::factory()->create();
        dump(json_encode($notebook));
        $notebook_raw = Notebook::factory()->raw();
        $response = $this->postJson("/api/v1/notebook/",$notebook_raw);
        $response->assertStatus(201);
        $this->assertDatabaseHas('notebooks',$notebook_raw);
    }

    public function test_update_notebook()
    {
        $notebook = Notebook::factory()->create();
        dump(json_encode($notebook));
        $notebook_raw = Notebook::factory()->raw();
        $response = $this->postJson("/api/v1/notebook/$notebook->id",$notebook_raw);
        $response->assertStatus(200);
        $this->assertDatabaseHas('notebooks',$notebook_raw);
    }

    public function test_delete_notebook()
    {
        $notebook = Notebook::factory()->create();
        dump(json_encode($notebook));
        $response = $this->deleteJson("/api/v1/notebook/{$notebook->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('notebooks',$notebook->toArray());
    }

}
