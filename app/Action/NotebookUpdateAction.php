<?php
namespace App\Action;

use App\Models\Notebook;

class NotebookUpdateAction
{
    public function handle($id, $new): Notebook
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->update($new);
        return $notebook;
    }
}
