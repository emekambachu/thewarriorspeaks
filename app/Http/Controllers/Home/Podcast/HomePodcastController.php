<?php

namespace App\Http\Controllers\Home\Podcast;

use App\Http\Controllers\Controller;
use App\Services\Podcast\PodcastService;
use Illuminate\Http\Request;

class HomePodcastController extends Controller
{
    protected PodcastService $podcast;
    public function __construct(PodcastService $podcast){
        $this->podcast = $podcast;
    }

    public function homePage()
    {
        try {
            $data = $this->podcast->publishedPodcasts()->latest()->limit(3)->get();
            return view('home.index', compact('data'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->podcast->publishedPodcasts()->latest()->paginate(12);
            return response()->json([
                'success' => true,
                'podcasts' => $data,
                'total' => $data->total(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->podcast->podcastById($id);
            return response()->json([
                'success' => true,
                'podcast' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
