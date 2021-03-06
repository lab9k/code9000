<?php

namespace App\Listeners;

use App\Services\Imgur\ImgurApi;
use App\Events\ObservationIsValid;
use Illuminate\Support\Facades\Storage;
use App\Events\ObservationUploadedToImgur;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendObservationImgur implements ShouldQueue
{
    /**
     * @var \App\Services\Imgur\ImgurApi
     */
    private $imgurApi;

    /**
     * Create the event listener.
     *
     * @param \App\Services\Imgur\ImgurApi $imgurApi
     */
    public function __construct(ImgurApi $imgurApi)
    {
        $this->imgurApi = $imgurApi;
    }

    /**
     * Handle the event.
     *
     * @param  ObservationIsValid $event
     *
     *@return void
     */
    public function handle(ObservationIsValid $event)
    {
        $observation = $event->observation;

        $picture = Storage::get($observation->picture_storage);

        $link = $this->uploadImage($picture);

        $observation->imgur = $link;
        $observation->save();

        event(new ObservationUploadedToImgur($observation));
    }

    private function uploadImage($picture)
    {
        $response = $this->imgurApi->upload($picture);

        return array_get($response, 'link');
    }
}
