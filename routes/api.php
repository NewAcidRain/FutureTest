<?php

use App\Http\Controllers\API\NotebookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('v1/notebook/', [NotebookController::class, 'getAllNotebooks']);
Route::post('v1/notebook/', [NotebookController::class, 'createNotebookObject']);
Route::get('v1/notebook/{id}', [NotebookController::class, 'getConcreteNotebook']);
Route::post('v1/notebook/{id}', [NotebookController::class, 'updateNotebookObject']);
Route::delete('v1/notebook/{id}', [NotebookController::class, 'deleteNotebookObject']);


