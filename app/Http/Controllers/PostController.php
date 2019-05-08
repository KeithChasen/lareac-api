<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request, EntityManagerInterface $entityManager) {

        $post = new Post(
            $request->get('title'),
            $request->get('body')
        );

        $entityManager->persist($post);
        $entityManager->flush();
        return response()->json(['ok' => true], 201);
	  }
}
