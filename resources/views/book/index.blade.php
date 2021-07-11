@extends('layouts.layout')
@section('title', 'Books List')
@section('content')
<!-- leads list start -->
<section class="permissions-list-wrapper">
    <!-- Request Response Start -->
    @include('partial.response')
    <!-- Request Response End -->
    <!-- Striped rows start -->
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header py-1">
                    <h4 class="card-title"> Books List</h4>
                    <a href="{{route('books.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Name (English)</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Language</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ \Str::limit($book->name, 30)}}</td>
                                        <td>{{ $book->category->name }}</td>
                                        <td>{{ $book->language->name }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->publisher }}</td>
                                        <td>{{ $book->created_at->format('m-d-Y') }}</td>
                                        <td class="role-action" data-check="booksView">
                                            <a class="btn btn-warning btn-sm waves-effect waves-light" href="{{route('books.edit',$book->id)}}" title="Edit Book">
                                                <i class="feather icon-edit"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm waves-effect waves-light" href="{{route('books.show',$book->id)}}" title="View Detail">
                                                <i class="feather icon-eye"></i>
                                            </a>
                                            <form action="{{ route('books.destroy',$book->id) }}" method="POST" style="float: left;padding-right:5px;">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Are you sure?')" title="Delete Book"><i class="feather icon-trash"></i></button>
                                            </form>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($books->hasPages())
                <div class="card-footer">
                    {!! $books->links() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
</section>
<!-- leads list ends -->
@endsection