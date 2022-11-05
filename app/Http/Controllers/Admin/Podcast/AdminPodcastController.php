<?php

namespace App\Http\Controllers\Admin\Podcast;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Podcast\AdminStorePodcastRequest;
use App\Http\Requests\Admin\Podcast\AdminUpdatePodcastRequest;
use App\Services\Podcast\PodcastService;
use Illuminate\Http\Request;

class AdminPodcastController extends Controller
{
    protected $podcast;
    public function __construct(PodcastService $podcast){
        $this->podcast = $podcast;
//        $this->middleware('auth:web');
    }

    public function recentPodcast($limit): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->podcast->podcastWithRelations();
            return response()->json([
                'success' => true,
                'podcasts' => $data->latest()->limit($limit)->get(),
                'total' => $data->count(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->podcast->podcastWithRelations()->latest()
                ->paginate(12);
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

    public function store(AdminStorePodcastRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->podcast->createPodcast($request);
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

    public function update(AdminUpdatePodcastRequest $request, $id){
        try {
            $this->podcast->updatePodcast($request, $id);
            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function deletePodcast($id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->podcast->deletePodcast($id);
            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


}
