<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class NotesController extends Controller
{
    public function index()
    {
        return view('notes.index');
    }
    public function single(int $id)
    {
        return view('notes.single', ['noteId' => $id]);
    }
    public function uploadNote()
    {
        return view('notes.upload');
    }
    public function download(Note $note)
    {

        $pathofFile = public_path("storage/app/$note->file_path");
        if (auth()->id() !== $note->user_id) {
            $note->user->increment('karma', 1);
        }

        return response()->download($pathofFile, Str::slug($note->title) . '.pdf');
    }
}
