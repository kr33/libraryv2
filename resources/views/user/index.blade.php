@extends('layouts.layout')
@section('title', 'Users List')
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
                    <h4 class="card-title"> Users List</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($users->hasPages())
                <div class="card-footer">
                    {!! $users->links() !!}
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
</script>
@endpush