<?php

namespace App\Http\Controllers;

use Cache;
use GuzzleHttp\Client as Guzzle;

class PodcastController extends Controller
{
    /**
     * The Guzzle client.
     *
     * @var Guzzle
     */
    protected $guzzle;

    /**
     * Create a new PodcastController instance.
     *
     * @param Guzzle $guzzle
     */
    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function index()
    {
        $feed = $this->fetchFeed();

        return view('podcast.index', compact('feed'));
    }

    /**
     * Fetch the Laracasts Snippet feed.
     *
     * @return array
     */
    protected function fetchFeed()
    {
        return Cache::remember('podcast', 60 * 24 * 7, function () {
            $endpoint = 'https://api.simplecast.com/v1/podcasts/1486/episodes.json?api_key='
                        . config('services.simplecast.key');

            return json_decode($this->guzzle->get($endpoint)->getBody());
        });
    }
}
