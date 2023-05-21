<?php
namespace App\Action;

use App\Models\Notebook;


class NotebookDeleteAction
{
    public function handle($id)
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->delete();
        return $notebook;
    }
}
