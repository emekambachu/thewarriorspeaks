<?php

namespace App\Services\Podcast;

use App\Models\Podcast\Podcast;

/**
 * Class PodcastService.
 */
class PodcastService
{
    public function podcast(): Podcast
    {
        return new Podcast();
    }

    public function podcastWithRelations(){
        return $this->podcast()->with('likes', 'comments', 'category');
    }

    public function podcastById($id){
        return $this->podcastWithRelations()->findOrFail($id);
    }

    public function createPodcast($request){

    }

    public function updatePodcast($request, $id){

    }

    public function publishPodcast($id){

    }
}
