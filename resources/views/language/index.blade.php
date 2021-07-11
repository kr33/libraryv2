@extends('layouts.layout')
@section('title', 'Languages List')
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
                    <h4 class="card-title"> Languages List</h4>
                    <a href="{{route('languages.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Language Name</th>
                                    <th scope="col">ٻولي جو نالو</th>
                                    <th scope="col">زبان کا نام</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($languages as $language)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $language->name }}</td>
                                        <td>{{ $language->sindhi_name }}</td>
                                        <td>{{ $language->urdu_name }}</td>
                                        <td> @if($language->status == 1) Active @else Deactive @endif </td>
                                        <td>{{ $language->created_at->format('m-d-Y') }}</td>
                                        <td class="role-action" data-check="LanguagesView">
                                            <a class="btn btn-warning btn-sm waves-effect waves-light" href="{{route('languages.edit',$language->id)}}">
                                                <i class="feather icon-edit"></i>
                                            </a>
                                            <form action="{{ route('languages.destroy',$language->id) }}" method="POST" style="float: left;padding-right:5px;">
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
                @if($languages->hasPages())
                <div class="card-footer">
                    {!! $languages->links() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
</section>
<!-- leads list ends -->
@endsection