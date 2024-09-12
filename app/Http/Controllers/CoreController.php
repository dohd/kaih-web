<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query as DeliveryQuery;

class CoreController extends Controller
{
    /**
     * @var DeliveryClient
     */
    private $client;

    /**
     * @var DeliveryQuery
     */
    private $query;

    public function __construct(DeliveryClient $client, DeliveryQuery $query)
    {
        $this->client = $client;
        $this->query = $query;
    }

    /**
     * Load landing page
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', [
            'headerSliderTexts' => $this->headerSliderTexts()->original,
            'aboutUs' => $this->aboutUs()->original,
            'pillars' => $this->pillars()->original,
            'programs' => $this->programs()->original,
            'testimonials' => $this->testimonials()->original,
            'partners' => $this->partners()->original,
            'blogPosts' => $this->blogPosts()->original,
        ]);
    }

    /**
     * Fetch Header Images
     * @return json
     */
    public function headerImages()
    {
        try {
            $query = $this->query->setContentType('header_images');
            $client = $this->client->getEntries($query);
            $images = array_map(fn ($client) => array_map(fn ($v) => toArray($v->getFile()), $client->getImage()), $client->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $images = @$images[0] ?: []; 
        return response()->json($images);
    }

    /**
     * Fetch Header Slide Texts
     * @return json
     */
    public function headerSliderTexts()
    {
        try {
            $query = $this->query->setContentType('header_slider_texts')->orderBy('sys.createdAt');;
            $client = $this->client->getEntries($query);
            $slider_texts = array_map(fn ($client) => toArray($client)['fields'], $client->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $slider_texts = @$slider_texts ?: [];
        return response()->json($slider_texts);
    }

    /**
     * Fetch About Us
     * @return json
     */
    public function aboutUs()
    {
        try {
            //code...
            $query = $this->query->setContentType('about_us');
            $client = $this->client->getEntries($query);
            $segments = array_map(fn ($client) => toArray($client)['fields'], $client->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $segments = @$segments[0] ?: [];
        return response()->json($segments);
    }

    /**
     * Fetch Pillars
     * @return json
     */
    public function pillars()
    {
        try {
            //code...
            $query = $this->query->setContentType('pillars')->orderBy('sys.createdAt');
            $client = $this->client->getEntries($query);
            $pillars = array_map(fn ($client) => toArray($client)['fields'], $client->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $pillars = @$pillars ?: [];
        return response()->json($pillars);
    }

    /**
     * Fetch Programs
     * @return json
     */
    public function programs()
    {
        try {
            //code...
            $query = $this->query->setContentType('programs')->orderBy('sys.createdAt');
            $client = $this->client->getEntries($query);
            $programs = array_map(fn ($client) => [
                'id' => $client->getId(),
                'name' => $client->getName(),
                'shortDescription' => $client->getShortDescription(),
                'description' => $client->getDescription(),
            ], $client->getItems());
            // dd($programs);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $programs = @$programs ?: [];
        return response()->json($programs);
    }


    /**
     * Fetch Program
     * @return json
     */
    public function program($id)
    {
        try {
            $client = $this->client->getEntry($id);
            $program = [
                'id' => $client->getId(),
                'name' => $client->getName(),
                'shortDescription' => $client->getShortDescription(),
                'description' => $client->getDescription(),
            ];
        } catch (\Throwable $th) {
            //throw $th;
        }
        $program = @$program ?: [];
        return response()->json($program);
    }

    /**
     * Fetch Testimonials
     * @return json
     */
    public function testimonials()
    {
        try {
            //code...
            $query = $this->query->setContentType('testimonials');
            $client = $this->client->getEntries($query);
            $testimonials = array_map(fn ($client) => toArray($client)['fields'], $client->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $testimonials = @$testimonials ?: [];
        return response()->json($testimonials);
    }

    /**
     * Partners
     * @return json
     */
    public function partners()
    {
        try {
            //code...
            $query = $this->query->setContentType('partners');
            $client = $this->client->getEntries($query);
            $images = array_map(fn ($client) => array_map(fn ($v) => toArray($v->getFile()), $client->getImage()), $client->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $images = @$images[0] ?: [];
        return response()->json($images);
    }

    /**
     * Fetch Contact
     * @return json
     */
    public function contacts()
    {
        try {
            //code...
            $query = $this->query->setContentType('contact');
            $client = $this->client->getEntries($query);
            $contacts = array_map(fn ($client) => toArray($client)['fields'], $client->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $contacts = $contacts[0] ?: [];
        return response()->json($contacts);
    }

    /**
     * Fetch Blog Posts
     * @return json
     */
    public function blogPosts()
    {
        try {
            //code...
            $query = $this->query->setContentType('blogPosts');
            $client = $this->client->getEntries($query);
            $blogPosts = array_map(fn ($client) => [
                'id' => $client->getId(),
                'author' => $client->getAuthor(),
                'tag' => $client->getTag()[0],
                'shortTitle' => $client->getShortTitle(),
                'shortDescription' => $client->getShortDescription(),
                'date' => toArray($client->getDate()),
                'article' => $client->getArticle(),
            ], $client->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $blogPosts = @$blogPosts ?: [];
        return response()->json($blogPosts);
    }


    /**
     * Load News page
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news()
    {
        return view('news');
    }

    /**
     * Load News detail
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showNews($id)
    {
        $categories = [
            1 => 'Access to Justice',
            2 => 'Self Advocacy',
            3 => 'Vocational Training',
        ];
        return view('news_details', ['category' => @$categories[$id]]);
    }

    /**
     * Load program details page
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProgram($id)
    {
        return view('program_details', [
            'program' => $this->program($id)->original
        ]);
    }

    /**
     * Load Not Found Page (404)
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function error_404()
    {
        return view('error_404');
    }
}
