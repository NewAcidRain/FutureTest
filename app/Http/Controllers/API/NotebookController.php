<?php

namespace App\Http\Controllers\API;

use App\Action\NotebookCreateAction;
use App\Action\NotebookDeleteAction;
use App\Action\NotebookGetAction;
use App\Action\NotebookUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotebookRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NotebookController extends Controller
{
    public function getAllNotebooks(): JsonResponse|AnonymousResourceCollection
    {
        $notebooks = Notebook::paginate(5)->all();
        if ($notebooks == []) {
            return \response()->json("Page out of range", 400);
        }
        return NotebookResource::collection($notebooks);
    }

    public function getConcreteNotebook(string $id, NotebookGetAction $action): NotebookResource
    {
        return new NotebookResource($action->handle($id));
    }


    public function createNotebookObject(NotebookCreateAction $action, NotebookRequest $request): NotebookResource
    {
        return new NotebookResource($action->handle($request));
    }

    public function updateNotebookObject(string $id, NotebookRequest $request, NotebookUpdateAction $action): NotebookResource
    {
        return new NotebookResource($action->handle($id, $request->validated()));
    }

    public function deleteNotebookObject(string $id, NotebookDeleteAction $action): NotebookResource
    {
        return new NotebookResource($action->handle($id));
    }
}
