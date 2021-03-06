@extends('layouts.layout')

@section('title', 'Books')
@section('content')
<head>
<link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<style>
    .bootstrap-tagsinput .tag{
        background: #7367F0;
        padding: 3px;
        border-radius: 3px;
    }
    .bootstrap-tagsinput{
        width:100%;
    }
    .sindhi-font{
        font-size: 17px;
    }
    .sindhi-cursor{
        direction: rtl;
    }
</style>
</head>
<!-- Lead form start -->
<section class="banner-list-wrapper">
    <!-- Striped rows start -->
    @include('partial.response')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header py-1">
                    <h4 class="card-title">Edit Book</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data" class="form form-horizontal" novalidate>
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <div class="form-body">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="BookName">Name *</label>
                                    </div>
                                    <div class="col-md-8">
                                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Book Name" value="{{ $book->name }}" maxlength="255" required />
                                            @if($errors->has('name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="BookName" class="sindhi-font">???????? *</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control sindhi-cursor {{ $errors->has('name_sindhi') ? 'is-invalid' : '' }}" name="name_sindhi" placeholder="????????" value="{{ $book->name_sindhi }}" maxlength="255" required />
                                        @if($errors->has('name_sindhi'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name_sindhi') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="ISBNNUmber">ISBN Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control {{ $errors->has('isbn_number') ? 'is-invalid' : '' }}" name="isbn_number" placeholder="ISBN Number" value="{{ $book->isbn_number }}" maxlength="255" />
                                        @if($errors->has('isbn_number'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('isbn_number') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Author">Author / Editor</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author" placeholder="Author / Editor" value="{{ $book->author }}" maxlength="255" required />
                                        @if($errors->has('author'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('author') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Author" class="sindhi-font">???????? / ????????</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control sindhi-cursor {{ $errors->has('author_sindhi') ? 'is-invalid' : '' }}" name="author_sindhi" placeholder="???????? / ????????" value="{{ $book->author_sindhi }}" maxlength="255" required />
                                        @if($errors->has('author_sindhi'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('author_sindhi') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Translator">Translator</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control {{ $errors->has('translator') ? 'is-invalid' : '' }}" name="translator" placeholder="Translator" value="{{ $book->translator }}" maxlength="255" />
                                        @if($errors->has('translator'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('translator') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Publisher">Publisher</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control {{ $errors->has('publisher') ? 'is-invalid' : '' }}" name="publisher" placeholder="Publisher" value="{{ $book->publisher }}" maxlength="255" required />
                                        @if($errors->has('publisher'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('publisher') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Intro">Intro</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description" value="{{ $book->short_description }}" placeholder="Intro" >{{ $book->short_description }}</textarea>
                                        @if($errors->has('short_description'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('short_description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Intro" class="sindhi-font">??????????</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control sindhi-cursor {{ $errors->has('short_description_sindhi') ? 'is-invalid' : '' }}" name="short_description_sindhi" value="{{ $book->short_description_sindhi }}" placeholder="??????????" >{{ $book->short_description_sindhi }}</textarea>
                                        @if($errors->has('short_description_sindhi'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('short_description_sindhi') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Intro">Long Intro</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control {{ $errors->has('long_description') ? 'is-invalid' : '' }}" name="short_description" value="{{ old('short_description') }}" placeholder="Intro" required >{{ old('short_description') }}</textarea>
                                        @if($errors->has('long_description'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('long_description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Year">Year</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" name="year" placeholder="Year" value="{{ $book->year }}" maxlength="255" required />
                                        @if($errors->has('year'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('year') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Attachment">Attachment</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control {{ $errors->has('book_attachment') ? 'is-invalid' : '' }}" name="book_attachment" placeholder="Attachment" />
                                        @if($errors->has('book_attachment'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('book_attachment') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Thumbnail">Thumbnail</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control {{ $errors->has('book_thumbnail') ? 'is-invalid' : '' }}" name="book_thumbnail" placeholder="Thumbnail" />
                                        @if($errors->has('book_thumbnail'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('book_thumbnail') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Tags">Tags (Multiple tags comma separated)</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags" value="@if(isset($book->tags) && !empty($book->tags)) @foreach($book->tags as $value) {{$value->name}}, @endforeach @endif" data-role="tagsinput" />
                                        @if($errors->has('tags'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('tags') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Language">Language</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control {{ $errors->has('language_id') ? 'is-invalid' : '' }}" name="language_id" required>
                                            <option valaue="">Select Language</option>
                                            @forelse($languages as $value)
                                                <option value="{{$value->id}}" @if($value->id == $book->language_id) selected @endif >{{$value->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @if($errors->has('language_id'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('language_id') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="Category">Category</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" required>
                                            <option value="">Select Category</option>
                                            @forelse($categories as $value)
                                                <option value="{{$value->id}}" @if($value->id == $book->category_id) selected @endif>{{$value->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @if($errors->has('category_id'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" required />
                                            <option value="1" @if($book->status == 1) selected  @endif >Active</option>
                                            <option value="0" @if($book->status == 0) selected  @endif >Inactive</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-8 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
</section>
<!-- banner form end -->
@endsection
@push('page.scripts')
<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<script>
    $('select').select2();
</script>

@endpush