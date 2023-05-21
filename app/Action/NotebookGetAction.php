<?php

namespace App\Action;

use App\Models\Notebook;

class NotebookGetAction
{
    public function handle($id):Notebook
    {
        return Notebook::findOrFail($id);
    }
}
