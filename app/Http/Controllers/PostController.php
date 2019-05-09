<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use App\Transformers\PostTransformer;
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
    public function index(EntityManagerInterface $entityManager) {
        $posts = $entityManager
            ->getRepository(Post::class)
            ->findAll();

        $transformer = new PostTransformer();
        return $transformer->transformAll($posts);
    }

    public function show($id, EntityManagerInterface $entityManager) {
        $post = $entityManager
            ->getRepository(Post::class)
            ->findOneBy([
                'id' => $id
            ]);
        $transformer = new PostTransformer();
        return $transformer->transform($post);
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
