<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Language;
use App\Models\Book;
use App\Models\Message;
use DB;

class HomeController extends Controller
{
    private $category;
    private $language;
    private $book;
    private $searchTags;
    /**
     * HomeController constructor
     *
    */
    public function __construct(Category $category, Language $language, Book $book){
        $this->category = $category;
        $this->language = $language;
        $this->book = $book;
        $this->searchTags = [
            'name' => 'Name',
            'year' => 'Year',
            'author' => 'Author',
            'translator' => 'Translator',
            'publisher' => 'Publisher',
            'everything' => 'Everything',
        ];
    }
    public function index(){
        return view('website.home');
    }
    public function getKitaab(Request $request){
        $categories = $this->category->orderBy(DB::raw('ISNULL(sort_order), sort_order'), 'ASC')->get();
        $languages = $this->language->get();
        
        $books =  $this->book->orderBy('id','DESC');
        
        if(isset($request->category) && !empty($request->category) ){
            $books = $books->where('category_id',$request->category);
        }
        if(isset($request->language) && !empty($request->language) ){
            $books = $books->where('language_id',$request->language);
        }
        if(isset($request->keyword) && !empty($request->keyword) ){
            if(isset($request->title) && !empty($request->title) ){
                if (array_key_exists($request->keyword,$this->searchTags)){
                    $title = $request->title;
                    if($request->keyword == 'name'){
                        $books = $books->where('name','LIKE','%'.$title.'%')
                                ->orWhere('name_sindhi','LIKE','%'.$title.'%');
                    }
                    elseif($request->keyword == 'author'){
                        $books = $books->where('author','LIKE','%'.$title.'%')
                                ->orWhere('author_sindhi','LIKE','%'.$title.'%');
                    }
                    elseif($request->keyword == 'translator'){
                        $books = $books->where('translator','LIKE','%'.$title.'%');
                    }
                    elseif($request->keyword == 'publisher'){
                        $books = $books->where('publisher','LIKE','%'.$title.'%');
                    }
                    elseif($request->keyword == 'year'){
                        $books = $books->where('year','LIKE','%'.$title.'%');
                    }
                    elseif($request->keyword == 'everything'){
                        $books = $books->where('name','LIKE','%'.$title.'%')
                                ->orWhere('name_sindhi','LIKE','%'.$title.'%')
                                ->orWhere('author','LIKE','%'.$title.'%')
                                ->orWhere('author_sindhi','LIKE','%'.$title.'%')
                                ->orWhere('translator','LIKE','%'.$title.'%')
                                ->orWhere('publisher','LIKE','%'.$title.'%')
                                ->orWhere('year','LIKE','%'.$title.'%')
                                ->orWhere('short_description','LIKE','%'.$title.'%')
                                ->orWhere('short_description_sindhi','LIKE','%'.$title.'%')
                                ->orWhereHas('tags', function( $query ) use($title) {
                                    $query->where('name', $title);
                                });
                    }
                }
            }
        }
        $books = $books->paginate(12);
        return view('website.book.index',['categories'=>$categories,'languages'=>$languages,'books'=>$books,'searchTags'=>$this->searchTags]);
    }

    public function kitaabDetail($slug){
        $book = $this->book->where('slug',$slug)->first();
        return view('website.book.detail',['book'=>$book]);
    }

    public function sendMessage(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|max:500',
        ]);

        Message::create([
            'book_id' => $request->book_id,
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);
        return redirect(route('front.kitaab.detail',$request->slug))->with('message','Message sent successfully..');
    }

    /**
     * About 
    */
    public function about(){
        return view('website.about');
    }
}
