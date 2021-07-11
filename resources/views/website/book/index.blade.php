@extends('website.layout.app')
@section('title', 'Books')
@section('content')
<head>
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/css/responsive.dataTables.min.css" rel="stylesheet">
<style>
    .grid-header .btn-link{
        padding: 0px !important;
    }
    .dataTables_filter, .dataTables_info { 
        display: none; 
    }
    .gridtitle{
        font-size: 16px;
        text-align: center;
        margin: 1px;
        padding-bottom: 2px;
        padding-top: 9px;
    }
    .gridauthor{
        font-size: 13px;
        text-align: center;
    }
    .navbar-brand{
        padding-top: 0px;
    }
    .form-control{
        font-size: 14px !important;
    }
    label{
        font-size: 18px !important;
    }
    .gridDescription{
        font-size: 13px;
        text-align: justify;
        padding-right: 10px;
        padding-left: 10px;
        margin-top: -10px;
    }
    #grid > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between{
        display:none !important;
    }
    #list > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between{
        display:none !important;
    }
</style>
</head>
<div class="container grid-lg"></div>
<div class="container grid-xl">
    <div class="col-md-12">
    <form action="{{route('front.kitaab')}}">
    @csrf
        <div class="row" style="padding-bottom: 15px;">
           
                <div class="col-md-6" style="border: 1px solid #c8c5c5;border-radius: 4px;margin-bottom: 10px;">
                    <h6 style="font-size: 20px;padding: 10px;">“Be curious. Read widely. Try new things. What people call intelligence just boils down to curiosity.”  <span style="font-size: 16px;">― Aaron Swartz</span></h6>
                </div>
                 <div class="col-md-6" style="border: 1px solid #c8c5c5;border-radius: 4px;padding-top: 10px;margin-bottom: 10px;">
                    <h6 class='sindhi' style="font-size: 20px;">" 
تَجَسُس۔ بي انت پڙهائي۔ نوان نوان تجربا، ڪمَ ۽ شيون ڪري ڏسو۔ ماڻهو جنهن کي ذهانت ٿا چون، اها در اصل هُــرکُــر (تَجَسُس) آهي."<span style="font-size:16px;">― ايرون سوارٽز</span><span style="font-size: 16px;"></h6> 
                </div>
          
<!--             <div class="col-md-12 hide"><h6 style="font-size: 23px">“Be curious. Read widely. Try new things. What people call intelligence just boils down to curiosity.”  ― Aaron Swartz</h6></div>-->
<!--            <div class="col-md-12"><h6 class='sindhi' style="font-size: 24px"> -->
<!--تَجَسُس۔ بي انت پڙهائي۔ نوان نوان تجربا، ڪمَ ۽ شيون ڪري ڏسو۔ ماڻهو جنهن کي ذهانت ٿا چون، اها در اصل هُــرکُــر (تَجَسُس) آهي -- ايرون سوارٽزـ</h6></div>-->
            
            <div class="col-md-3">
                <!--<label>Categories</label>-->
                <select class="form-control" name="category">
                    <option value="">Select Category</option>
                    @forelse($categories as $key => $value)
                        <option value="{{$value->id}}" @if($value->id == request('category')) selected @endif >{{$value->name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="col-md-3">
                <!--<label>Languages</label>-->
                <select class="form-control" name="language">
                    <option value="">Select Language</option>
                    @forelse($languages as $key => $value)
                        <option value="{{$value->id}}"  @if($value->id == request('language')) selected @endif>{{$value->name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="col-md-3">
                <!--<label>Field</label>-->
                <select class="form-control" name="keyword">
                    <option value="">Select field</option>
                    @forelse($searchTags as $key => $value)
                        <option value="{{$key}}" @if($key == request('keyword')) selected @endif>{{$value}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="col-md-3">
                <!--<label>Search</label>-->
                <input type="text" class="form-control" placeholder="Search here..." name="title" value="{{request('title')}}">
            </div>
            <div class="col-md-12" style="top:10px;">
                <input type="submit" class="btn btn-primary" value="Search" style="padding-top: 3px;">
                <a href="{{route('front.kitaab')}}" class="btn btn-primary" style="padding-top: 3px;">Reset</a>
                
                <a href="javascript:;" onclick="view('list','grid')" title="List View" style="font-size: 33px;float:right;"><li class="fa fa-list"></li></a>
                <a href="javascript:;" onclick="view('grid','list')" title="Grid View" style="font-size: 33px;float:right;padding-right: 10px;"><li class="fa fa-th"></li></a>
            </div>
        </div>
        </form>
    </div>
    <div id="list" style="display:none;">
        <table id="listView" class="table table-striped display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th><a href="javascript:;">Title</a></th>
                    <th><a href="javascript:;">Author / Editor</a></th>
                    <th class="hide-sm"><a href="javascript:;">Published</a></th>
                    <th direction="rtl" class="sindhi"><a href="javascript:;">ليکڪ / مرتب</a></th>
                    <th direction="rtl" class="sindhi"><a href="javascript:;">نالو</a></th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($books))
                    @foreach($books as $key => $value)
                    <tr>
                        <td><a target="_blank" href="{{route('front.kitaab.detail',$value->slug)}}">{{ \Str::limit($value->name, 30)}}</a></td>
                        
                        <td><a href="javascript:;">{{$value->author}}</a></td>
                        <td class="hide-sm">{{$value->year}}</td>
                        <td direction="rtl" @if(in_array($value->language->id,[3,4,5,6,7])) class="not-sindhi-arabic" @else class="sindhi" @endif ><a href="javascript:;">{{$value->author_sindhi}}</a></td>              
                        <td direction="rtl" @if(in_array($value->language->id,[3,4,5,6,7])) class="not-sindhi-arabic" @else class="sindhi" @endif ><a target="_blank" href="{{route('front.kitaab.detail',$value->slug)}}">{{ \Str::limit($value->name_sindhi, 30)}}</a></td>              
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if(!empty($books))
            {!! $books->links() !!}
        @endif
    </div>
    <div id="grid">
            <div class="col-md-12">
                <div class="row">
                @if(!empty($books))
                    @foreach($books as $key => $value)
                    <div class="col-md-3">
                        <div class="card" style="margin-bottom: 20px;">
                            <a target="_blank" href="{{route('front.kitaab.detail',$value->slug)}}"><img src="{{$value->book_thumbnail_url}}" class="card-img-top" style="padding: 10px;height: 350px;" alt="...">
                            </a>
                            <div class="list-group list-group-flush">
                                <p  direction="rtl" @if(in_array($value->language->id,[3,4,5,6,7])) class="not-sindhi-arabic gridtitle" @else class="sindhi gridtitle" @endif><a target="_blank" href="{{route('front.kitaab.detail',$value->slug)}}">{{$value->name_sindhi}} - {{$value->year}}</a></p>
                                <p class="gridauthor" style="margin-bottom: 3px;">By: {{$value->author}}</p>
                                <p direction="rtl" @if(in_array($value->language->id,[3,4,5,6,7])) class="not-sindhi-arabic gridauthor" @else class="sindhi gridauthor" @endif>{{$value->author_sindhi}}</p>
                                @if(!empty($value->short_description))
                                <p class="gridDescription">{{ \Str::limit($value->short_description, 150)}}</p>
                                @endif
                                @if(!empty($value->short_description_sindhi))
                                <p  direction="rtl" @if(in_array($value->language->id,[3,4,5,6,7])) class=" gridDescription not-sindhi-arabic gridtitle" @else class="sindhi gridDescription" @endif>{{ \Str::limit($value->short_description_sindhi, 150)}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                </div>
            </div>
        @if(!empty($books))
            {!! $books->links() !!}
        @endif
    </div>
</div>

<script src="/js/jquery-3.5.1.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap4.min.js"></script>
<script src="/js/dataTables.responsive.min.js"></script>
<script>

    function view(layoutshow, layouthide){
        $("#"+layoutshow).show();
        $("#"+layouthide).hide();
    }

    $(document).ready(function() {
        $('#listView').DataTable( {
            "paging":   false,
            "responsive": true,
            "dom": 'lrtip',
            "rowReorder": {
                selector: 'td:nth-child(2)'
            }
        } );

        $('#gridView').DataTable( {
            "paging":   false,
            "dom": 'lrtip',
        } );

    } );
</script>
@endsection
