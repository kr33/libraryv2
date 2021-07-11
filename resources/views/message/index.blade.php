@extends('layouts.layout')
@section('title', 'Messages List')
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
                    <h4 class="card-title"> Messages List</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Book</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>@if(isset($value->book->name)) {{ $value->book->name }} @else N/A @endif</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->description }}</td>
                                        <td> @if($value->status == 1) Active @else Deactive @endif </td>
                                        <td>{{ $value->created_at->format('m-d-Y') }}</td>
                                        <td class="role-action">
                                            <form action="{{ route('messages.destroy',$value->id) }}" method="POST" style="float: left;padding-right:5px;">
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
                @if($messages->hasPages())
                <div class="card-footer">
                    {!! $messages->links() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
</section>
<!-- leads list ends -->
@endsection