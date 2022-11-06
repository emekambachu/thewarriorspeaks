<?php

namespace App\Services\Podcast;

use App\Models\Podcast\Podcast;
use App\Services\Base\CrudService;
use Illuminate\Support\Facades\Session;

/**
 * Class PodcastService.
 */
class PodcastService
{
    protected string $audioPath = 'audio/podcasts';
    protected string $imagePath = 'photos/podcasts';

    protected CrudService $crud;
    public function __construct(CrudService $crud){
        $this->crud = $crud;
    }

    public function podcast(): Podcast
    {
        return new Podcast();
    }

    public function podcastWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->podcast()->with('likes', 'comments', 'category');
    }

    public function publishedPodcasts(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->podcastWithRelations()->where('status', 1);
    }

    public function publishedJoinedPodcast(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->podcastWithRelations()->where('blog_posts.status', 1);
    }

    public function podcastById($id){
        return $this->podcastWithRelations()->findOrFail($id);
    }

    public function createPodcast($request)
    {
        $input = $request->all();

        $input['image'] = $this->crud->compressAndUploadImage($request, $this->imagePath, 700, 500);
        $input['image_path'] = @config('app.url').$this->imagePath.'/';
        $input['audio'] = $this->crud->uploadAudio($request, $this->audioPath);
        $input['audio_path'] = @config('app.url').$this->audioPath.'/';

        if($input['status'] === 'publish' ){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }
        return $this->podcast()->create($input);
    }

    public function updatePodcast($request, $id): void
    {
        $input = $request->all();
        $podcast = $this->podcastById($id);
        Session::put('image', $podcast->image);
        Session::put('audio', $podcast->audio);

        $image = $this->crud->compressAndUploadImage($request, $this->imagePath, 700, 500);
        if($image){
            $input['image'] = $image;
        }else{
            $input['image'] = $podcast->image;
        }
        $audio = $this->crud->uploadAudio($request, $this->audioPath);
        if($audio){
            $input['audio'] = $audio;
        }else{
            $input['audio'] = $podcast->audio;
        }
        if($input['status'] === 'publish'){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }
        $podcast->update($input);

        if(Session::get('image') !== $podcast->image){
            $this->crud->deleteFile(Session::get('image'), $this->imagePath);
        }
        if(Session::get('audio') !== $podcast->audio){
            $this->crud->deleteFile(Session::get('audio'), $this->audioPath);
        }
    }

    public function publishPodcast($id){
        $podcast = $this->podcastById($id);
        $this->crud->publishItem($podcast->id);
    }

    public function deletePodcast($id){
        $podcast = $this->podcastById($id);
        $this->crud->deleteFile($podcast->image, $this->imagePath);
        $this->crud->deleteFile($podcast->audio, $this->audioPath);
        $this->crud->deleteRelation([$podcast->likes, $podcast->comments]);
        $podcast->delete();
    }
}
