<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Language;
use App\Models\Book;
use App\Models\User;
use App\Models\BookTag;
use Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use mikehaertl\pdftk\Pdf;

class BookController extends Controller
{
    private $category;
    private $language;
    private $book;
    private $tag;
    /**
     * BookController constructor
     *
     */
    public function __construct(Category $category, Language $language, Book $book, BookTag $tag){
        $this->category = $category;
        $this->language = $language;
        $this->book = $book;
        $this->tag = $tag;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $books =  $this->book->paginate(15);
        return view('book.index',['books' =>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      
        $categories = $this->category->all();
        $languages = $this->language->all();
        return view('book.create',['categories'=>$categories,'languages'=>$languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255|unique:books,name',
            'name_sindhi' => 'required|max:255',
            'author' => 'required|max:255',
            'author_sindhi' => 'required|max:255',
            'publisher' => 'required|max:255',
            'short_description' => 'max:1000',
            'short_description_sindhi' => 'max:1000',
            'language_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'book_attachment' => 'required|mimes:pdf',
            'book_thumbnail' => 'required|mimes:jpeg,png,jpg|max:1000',
        ]);
        
        $fileName = '';
        $file = $request->file('book_attachment')->getClientOriginalName();
        $array = explode('.pdf',$file);
        $firstPart = $array[0];
        if($request->language_id == 1){
            $fileName = Str::slug($firstPart, '_').'_'.Str::slug($request->author, '_').'_'.$request->year;
        }else{
            $fileName = Str::slug($firstPart, '_').'_'.Str::slug($request->author_sindhi, '_').'_'.$request->year;
        }
        $fileName = $fileName.'.'.$request->file('book_attachment')->getClientOriginalExtension();

        $book_attachment = $request->file('book_attachment')->storeAs('files',$fileName,'s3');
        
        $book_thumbnail = $request->file('book_thumbnail')->store('covers', 's3');
        
        Storage::disk('s3')->setVisibility($book_attachment, 'public');
        Storage::disk('s3')->setVisibility($book_thumbnail, 'public');

        $book_id = $this->book->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'name_sindhi' => $request->name_sindhi,
            'isbn_number' => $request->isbn_number,
            'author' => $request->author,
            'author_sindhi' => $request->author_sindhi,
            'translator' => $request->translator,
            'publisher' => $request->publisher,
            'short_description' => $request->short_description,
            'short_description_sindhi' => $request->short_description_sindhi,
            'year' => $request->year,
            'language_id' => $request->language_id,
            'category_id' => $request->category_id,
            'book_attachment' => $fileName,
            'book_attachment_url' => Storage::disk('s3')->url($book_attachment),
            'book_thumbnail' => basename($book_thumbnail),
            'book_thumbnail_url' => Storage::disk('s3')->url($book_thumbnail),
            'status' => $request->status,
        ])->id;
        
        if(!empty($request->tags)){
            $tags = explode(',',$request->tags);
            foreach($tags as $key => $value){
                $this->tag->create([
                    'book_id' => $book_id,
                    'name' => $value,
                    'slug' => Str::slug($value)
                ]);
            }
        }
        
        return redirect(route('books.index'))->with('message','Book added successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $book = $this->book->where('id',$id)->first();
        return view('book.show',['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $categories = $this->category->all();
        $languages = $this->language->all();
        $book = $this->book->find($id);
        return view('book.edit',['categories'=>$categories,'languages'=>$languages,'book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:255|unique:books,name,'.$id,
            'name_sindhi' => 'required|max:255',
            'author' => 'required|max:255',
            'author_sindhi' => 'required|max:255',
            'publisher' => 'required|max:255',
            'short_description' => 'max:500',
            'short_description_sindhi' => 'max:500',
            'year' => 'required|max:10',
            'language_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'book_attachment' => 'mimes:pdf',
            'book_thumbnail' => 'mimes:jpeg,png,jpg|max:1000',
        ]);
        
        $row = $this->book->find($id);
        
        $book_attachment = null;
        $book_attachment_url = null;
        $book_thumbnail = null;
        $book_thumbnail_url = null;

        if($request->hasFile('book_attachment')) {
            $book_attachment = $request->file('book_attachment')->store('files', 's3');
            Storage::disk('s3')->setVisibility($book_attachment, 'public');
            $book_attachment = basename($book_attachment);
            $book_attachment_url = Storage::disk('s3')->url($book_attachment);
        }else{
            $book_attachment = $row->book_attachment;
            $book_attachment_url = $row->book_attachment_url;
        }
        if($request->hasFile('book_thumbnail')) {
            $book_thumbnail = $request->file('book_thumbnail')->store('covers', 's3');
            Storage::disk('s3')->setVisibility($book_thumbnail, 'public');
            $book_thumbnail = basename($book_thumbnail);
            $book_thumbnail_url = Storage::disk('s3')->url($book_thumbnail);
        }else{
            $book_thumbnail = $row->book_thumbnail;
            $book_thumbnail_url = $row->book_thumbnail_url;
        }
    
        $this->book->where('id',$id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'name_sindhi' => $request->name_sindhi,
            'isbn_number' => $request->isbn_number,
            'author' => $request->author,
            'author_sindhi' => $request->author_sindhi,
            'translator' => $request->translator,
            'publisher' => $request->publisher,
            'short_description' => $request->short_description,
            'short_description_sindhi' => $request->short_description_sindhi,
            'year' => $request->year,
            'language_id' => $request->language_id,
            'category_id' => $request->category_id,
            'book_attachment' => $book_attachment,
            'book_attachment_url' => $book_attachment_url,
            'book_thumbnail' => $book_thumbnail,
            'book_thumbnail_url' => $book_thumbnail_url,
            'status' => $request->status,
        ]);
        
        if(!empty($request->tags)){
            $this->tag->where('book_id',$id)->delete();
            $tags = explode(',',$request->tags);
            foreach($tags as $key => $value){
                $this->tag->create([
                    'book_id' => $id,
                    'name' => $value,
                    'slug' => Str::slug($value)
                ]);
            }
        }
        
        return redirect(route('books.index'))->with('message','Book updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $this->book->where('id',$id)->delete();
        return redirect(route('books.index'))->with('message','Book deleted successfully..');
    }
    
    public function dashboard(){
        $categories = Category::count();
        $languages = Language::count();
        $books = Book::count();
        $users = User::count();
        return view('dashboard',['categories'=>$categories,'languages'=>$languages,'books'=>$books,'users'=>$users]);
    }
    
    public function userList(){
        $users = User::paginate(10);
        return view('user.index',['users'=>$users]);
        
    }
}
