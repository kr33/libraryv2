@extends('layouts.layout')
@section('title', 'Book Detail')
@section('content')
<section class="permissions-list-wrapper">
    @include('partial.response')
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header py-1">
                    <h4 class="card-title"> Book Detail </h4>
                </div>
                <div class="card-content card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover-animation mb-0">
                            <tbody>
                                <tr>
                                    <td>Name (English)</td>
                                    <td>{{$book->name}}</td>
                                </tr>
                                <tr>
                                    <td>Name (Sindhi)</td>
                                    <td>{{$book->name_sindhi}}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $book->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Language</td>
                                    <td>{{ $book->language->name }}</td>
                                </tr>
                                <tr>
                                    <td>ISBN Number</td>
                                    <td>{{$book->isbn_number}}</td>
                                </tr>
                                <tr>
                                    <td>Translator</td>
                                    <td>{{$book->translator}}</td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>{{$book->author}}</td>
                                </tr>
                                <tr>
                                    <td>Author (Sindhi)</td>
                                    <td>{{$book->author_sindhi}}</td>
                                </tr>
                                <tr>
                                    <td>Publisher</td>
                                    <td>{{$book->publisher}}</td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>{{$book->year}}</td>
                                </tr>
                                <tr>
                                    <td>Introduction</td>
                                    <td>{{$book->short_description}}</td>
                                </tr>
                                <tr>
                                    <td>Introduction (Sindhi)</td>
                                    <td>{{$book->short_description_sindhi}}</td>
                                </tr>
                                <tr>
                                    <td>Book</td>
                                    <td><a href="{{$book->book_attachment_url}}" target="_blank">Download</a></td>
                                </tr>
                                <tr>
                                    <td>Thumbnail</td>
                                    <td><a href="{{$book->book_thumbnail_url}}" target="_blank">View</a></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>{{ $book->created_at->format('m-d-Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection