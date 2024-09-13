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
            'blogPosts' => $this->blogPosts(3)->original,
            'contacts' => $this->contacts()->original,
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
    public function blogPosts($limit=0, $tag='')
    {
        try {
            //code...
            $query = $this->query->setContentType('blogPosts');
            if ($limit) $query->setLimit($limit);
            if ($tag) $query->where('fields.tag', $tag);

            $entries = $this->client->getEntries($query);
            $blogPosts = array_map(fn ($entry) => [
                'id' => $entry->getId(),
                'author' => $entry->getAuthor(),
                'tag' => $entry->getTag()[0],
                'shortTitle' => $entry->getShortTitle(),
                'shortDescription' => $entry->getShortDescription(),
                'date' => toArray($entry->getDate()),
                'image' => $entry->getHeaderImage()? toArray($entry->getHeaderImage()->getFile()) : [],
                'article' => $entry->getArticle(),
            ], $entries->getItems());
        } catch (\Throwable $th) {
            //throw $th;
        }
        $blogPosts = @$blogPosts ?: [];
        return response()->json($blogPosts);
    }

    /**
     * Fetch Blog Post
     * @return json
     */
    public function blogPost($id)
    {
        try {
            $entry = $this->client->getEntry($id);
            $blogPost = [
                'id' => $entry->getId(),
                'author' => $entry->getAuthor(),
                'tag' => $entry->getTag()[0],
                'shortTitle' => $entry->getShortTitle(),
                'shortDescription' => $entry->getShortDescription(),
                'date' => toArray($entry->getDate()),
                'image' => $entry->getHeaderImage()? toArray($entry->getHeaderImage()->getFile()) : [],
                'article' => $entry->getArticle(),
            ];
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
        }
        $blogPost = @$blogPost ?: [];
        return response()->json($blogPost);
    }

    /**
     * Fetch Post Tags Count
     * @return json
     */
    public function postTagsCount()
    {
        try {
            $query = $this->query->setContentType('blogPosts')->select(['fields.tag']);
            
            $entriesA = $this->client->getEntries($query->where('fields.tag', 'Access to Justice'));
            $entriesB = $this->client->getEntries($query->where('fields.tag', 'Access to Quality Healthcare'));
            $entriesC = $this->client->getEntries($query->where('fields.tag', 'Self Advocacy'));
            $entriesD = $this->client->getEntries($query->where('fields.tag', 'Vocational Training'));
            $entriesE = $this->client->getEntries($query->where('fields.tag', 'Quality Inclusive Education'));
            $entriesF = $this->client->getEntries($query->where('fields.tag', 'Family Empowerment'));

            $entriesCount = [
                'Access to Justice' => count($entriesA->getItems()),
                'Access to Quality Healthcare' => count($entriesB->getItems()),
                'Self Advocacy' => count($entriesC->getItems()),
                'Vocational Training' => count($entriesD->getItems()),
                'Quality Inclusive Education' => count($entriesE->getItems()),
                'Family Empowerment' => count($entriesF->getItems()),
            ];
        } catch (\Throwable $th) {
            //throw $th;
        }
        $entriesCount = @$entriesCount ?: [];
        return response()->json($entriesCount);
    }

    /**
     * Load News Page
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news()
    {
        return view('news', [
            'blogPosts' => $this->blogPosts(0, request('tag'))->original,
        ]);
    }

    /**
     * Load News detail
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showNews($id)
    {
        $blogPost = $this->blogPost($id)->original;
        if (!$blogPost) return redirect()->back();

        $postTagsCount = $this->postTagsCount()->original;

        return view('news_details', compact('blogPost', 'postTagsCount'));
    }

    /**
     * Load program details page
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProgram($id)
    {
        $program = $this->program($id)->original;
        if (!$program) return redirect()->back();

        return view('program_details', compact('program'));
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
