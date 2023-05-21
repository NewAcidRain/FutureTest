<?php

namespace App\Action;

use App\Models\Notebook;


class NotebookCreateAction
{
    public function handle($request)
    {
        return Notebook::create($request->validated());
    }
}
