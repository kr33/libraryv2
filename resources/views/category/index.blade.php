@extends('layouts.layout')
@section('title', 'Categories List')
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
                    <h4 class="card-title"> Categories List</h4>
                    <a href="{{route('categories.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">قسم جو نالو</th>
                                    <th scope="col">قسم کا نام</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Sort</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->sindhi_name }}</td>
                                        <td>{{ $category->urdu_name }}</td>
                                        <td> @if($category->status == 1) Active @else Deactive @endif </td>
                                        <td>{{ $category->created_at->format('m-d-Y') }}</td>
                                        <td>
                                            <select class="form-control" style="width:120px;" onchange="sortCategory($(this), {{$category->id}})">
                                                <option value="">Sort</option>
                                                @if(!empty($count))
                                                    @foreach(range(1,$count) as $value)
                                                        <option value="{{$value}}" @if($value == $category->sort_order) selected @endif >{{$value}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p id="msg{{$category->id}}"></p>
                                        </td>
                                        <td class="role-action" data-check="CategoriesView">
                                            <a class="btn btn-warning btn-sm waves-effect waves-light" href="{{route('categories.edit',$category->id)}}">
                                                <i class="feather icon-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST" style="float: left;padding-right:5px;">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Are you sure?')"><i class="feather icon-trash"></i></button>
                                            </form>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($categories->hasPages())
                <div class="card-footer">
                    {!! $categories->links() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
</section>
<!-- leads list ends -->
@endsection
@push('page.scripts')
<script>
    $('select').select2();

    function sortCategory(elm, id){
        $.ajax({
            url: "{{route('sortCategory')}}",
            method: "post",
            data: {sort_order:elm.val(),id:id,_token:'{{csrf_token()}}'} ,
            success: function (response) {
                if(response ==  1){
                    $('#msg'+id).css('color','green').html('Updated.');
                }else{
                    $('#msg'+id).css('color','red').html('Error.');
                }
                console.log(response);
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
</script>
@endpush