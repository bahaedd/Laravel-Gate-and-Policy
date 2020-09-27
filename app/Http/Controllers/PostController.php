<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function delete()
    {

        if (Gate::denies('isAdmin')) {

            dd('You are not admin');

        } else {

            dd('Admin allowed');

        }

    }

    public function update(Request $request, Post $post)
    {
    $this->authorize('update', $post);

    // The current user can update the blog post...
    }
}
