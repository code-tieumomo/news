<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function downloadCV($id)
    {
        return response()->download(public_path() . '/admin-assets/cv/CV_of_' . $id . '.pdf');
    }

    public function downloadSA($id)
    {
        return response()->download(public_path() . '/admin-assets/sample_article/sample_article_of_' . $id . '.pdf');
    }
}
