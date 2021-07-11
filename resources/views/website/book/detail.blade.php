@extends('website.layout.app')
@section('title', 'Book Detail')
@section('content')
<style>
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.error{
  color:red;
}
</style>
<div class="container grid-lg"></div>
<div class="container grid-xl hide-md">
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-image">
          <img src="{{$book->book_thumbnail_url}}" class="img-responsive">
        </div>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
          {{$book->name}}
          </h4>
          <h6 class="card-subtitle">by {{$book->author}} in <label class="label">{{$book->year}}</label>
            <p>Published by {{$book->publisher}}.</p>
                <p style="margin: 0">Language: {{$book->language->name}}</p>
          </h6>
            <div class="tile tile-centered">
              <div class="tile-icon">
                  <i class="icon icon-download centered"></i>
                </div>
              <div class="tile-content">
                <div class="tile-title"><a class="umami--click--download-button" href="{{$book->book_attachment_url}}">Download</a></div>
                <div class="tile-subtitle">{{$book->created_at->format('Y-m-d')}}</div>
              </div>
            </div>
          <br>
            @if(isset($book->tags) && !empty($book->tags))
                @foreach($book->tags as $key => $value)
                    <label class="chip">{{$value->name}}</label>
                @endforeach
            @endif
            </br>
        <p style="text-align:justify;">{{$book->short_description}}</p>
        </div>
      </div>
    <br>
      <div class="card">

        <div class="card-header">
          <h4 @if(in_array($book->language->id,[3,4,5,6,7])) class="card-title not-sindhi-arabic" @else class="card-title sindhi" @endif >
             {{$book->name_sindhi}}
          </h4>
          @if(!empty($book->author_sindhi))
            <p  direction="rtl" @if(in_array($book->language->id,[3,4,5,6,7])) class="card-title not-sindhi-arabic" @else class="card-title sindhi" @endif>- {{ $book->author_sindhi }}</p>
            @endif
           @if(!empty($book->short_description_sindhi))
            <p  direction="rtl" @if(in_array($book->language->id,[3,4,5,6,7])) class="card-title not-sindhi-arabic" @else class="card-title sindhi" @endif>{{ $book->short_description_sindhi }}</p>
            @endif
        </div>
        <div class="card-body sindhi">
          
        </div>
        <div class="card-body">
            <a class="btn btn-default" href="{{route('front.kitaab')}}">Back</a>
        </div>
      </div>
      <br>
      <div class="card">
        <div class="card-header">
          <button class="btn btn-primary" onclick="getMessage()">&copy; Copyright</button>
          @if(session()->has('message'))
              <h5 class="card-title" style="color: green;">{{ session()->get('message') }} </h5>
          @endif
        </div>
        <div class="card-body">
          <div class="row messagebox" style="display:none;">
            <p style='text-align: justify;'>
            The purpose of this collection is educative, hence the books here in our understanding come under fair-use clause of copyright laws. It is never our intention to violate any copyright laws.
            If despite the above note, you think presence of any document on this site is infringing upon your Copyrights, please fill in and send the following form, and we shall make sure to remove it from our site. 
            </p>
            <p>Sorry and Thanks.
            <hr>
            </p>
            <form action="{{route('front.kitaab.message',$book->slug)}}" method="post">
              <div class="row col-md-12">
                    {{csrf_field()}}
                    <input type="hidden" name="book_id" value="{{$book->id}}">
                    <div class="col-md-3">
                        <label>Your FuLL Name</label>
                        <input type="text" class="form-control" placeholder="John Snow" name="name" value="{{old('name')}}" required>
                        @if($errors->has('name')) <p class="error">{{ $errors->first('name') }} </p> @endif
                    </div>
                    <div class="col-md-3">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="john.snow@gmail.com" name="email" value="{{old('email')}}" required>
                        @if($errors->has('email')) <p class="error">{{ $errors->first('email') }} </p> @endif
                    </div>
                    <div class="col-md-3">
                        <label>Message</label>
                        <textarea class="form-control" rows="4" style="height: auto;" cols="50" placeholder="The title of the book and evidence of Copyright" name="description" value="{{old('description')}}" required>{{old('description')}}</textarea>
                        @if($errors->has('description')) <p class="error">{{ $errors->first('description') }} </p> @endif
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" style="margin-top:15px;">
              </div>
            </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container grid-sm show-md">
    <img src="{{$book->book_thumbnail_url}}" class="img-responsive">

    <br>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">
        {{$book->name}}
        </h4>
        <h6 class="card-subtitle">by {{$book->author}} in <label class="label">{{$book->year}}</label>
          <p>Published by {{$book->publisher}}.</p>
              <p style="margin: 0">Language: {{$book->language->name}}</p>
        </h6>

          <div class="tile tile-centered">
            <div class="tile-icon">
                <i class="icon icon-download centered"></i>
              </div>
            <div class="tile-content">
              <div class="tile-title"><a class="umami--click--download-button" href="{{$book->book_attachment_url}}">Download</a></div>
              <div class="tile-subtitle">{{$book->created_at->format('Y-m-d')}}</div>
            </div>
          </div>
        <br>
            @if(isset($book->tags) && !empty($book->tags))
                @foreach($book->tags as $key => $value)
                    <label class="chip">{{$value->name}}</label>
                @endforeach
            @endif
        </br>
        <p style="text-align:justify;">{{$book->short_description}}</p>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header">
        <h4 @if(in_array($book->language->id,[3,4,5,6,7])) class="card-title not-sindhi-arabic" @else class="card-title sindhi" @endif >
            {{$book->name_sindhi}}
        </h4>
            @if(!empty($book->author_sindhi))
                <p  direction="rtl" @if(in_array($book->language->id,[3,4,5,6,7])) class="card-title not-sindhi-arabic" @else class="card-title sindhi" @endif>- {{ $book->author_sindhi }}</p>
            @endif
           @if(!empty($book->short_description_sindhi))
            <p  direction="rtl" @if(in_array($book->language->id,[3,4,5,6,7])) class="card-title not-sindhi-arabic" @else class="card-title sindhi" @endif>{{ $book->short_description_sindhi }}</p>
            @endif
      </div>
      <div class="card-body sindhi">        
      </div>
      <div class="card-body">
          <a class="btn btn-default" href="{{route('front.kitaab')}}">Back</a>
      </div>
    </div>
    <div class="card">
        <div class="card-header">
        <button class="btn btn-primary" onclick="getMessage()">&copy; Copyright</button>
          @if(session()->has('message'))
              <h5 class="card-title" style="color: green;">{{ session()->get('message') }} </h5>
          @endif
        </div>
        <div class="card-body">
        <div class="row messagebox" style="display:none;">
            <p style='text-align: justify;'>
            The purpose of this collection is educative, hence the books here in our understanding come under fair-use clause of copyright laws. It is never our intention to violate any copyright laws.
            If despite the above note, you think presence of any document on this site is infringing upon your Copyrights, please fill in and send the following form, and we shall make sure to remove it from our site. 
            </p>
            <p>Sorry and Thanks.
            <hr>
            </p>
            <form action="{{route('front.kitaab.message',$book->slug)}}" method="post">
              <div class="row col-md-12">
                    {{csrf_field()}}
                    <input type="hidden" name="book_id" value="{{$book->id}}">
                    <div class="col-md-12">
                        <label>Your FuLL Name</label>
                        <input type="text" class="form-control" placeholder="John Snow" name="name" value="{{old('name')}}" required>
                        @if($errors->has('name')) <p class="error">{{ $errors->first('name') }} </p> @endif
                    </div>
                    <div class="col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="john.snow@gmail.com" name="email" value="{{old('email')}}" required>
                        @if($errors->has('email')) <p class="error">{{ $errors->first('email') }} </p> @endif
                    </div>
                    <div class="col-md-12">
                        <label>Message</label>
                        <textarea class="form-control" rows="4" style="height: auto;" cols="50" placeholder="The title of the book and evidence of Copyright" name="description" value="{{old('description')}}" required>{{old('description')}}</textarea>
                        @if($errors->has('description')) <p class="error">{{ $errors->first('description') }} </p> @endif
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" style="margin-top:15px;">
              </div>
            </form>
        </div>
        </div>
      </div>
</div>
@endsection
<script>
  function getMessage(){
    $('.messagebox').show();
  }
</script>
