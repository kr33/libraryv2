@extends('layouts.layout')
@section('title', 'Categories')
@section('content')
<!-- Lead form start -->
<section class="banner-list-wrapper">
    <!-- Striped rows start -->
    @include('partial.response')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header py-1">
                    <h4 class="card-title">Edit Category</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data" class="form form-horizontal" novalidate>
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <div class="form-body" id="formBody">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="leadFormCustomerName">Category Name *</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Category Name" value="{{ $category->name }}" maxlength="255" required />
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="leadFormCustomerName">قسم جو نالو *</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" dir = "rtl" class="form-control {{ $errors->has('sindhi_name') ? 'is-invalid' : '' }}" name="sindhi_name" placeholder="قسم جو نالو" value="{{ $category->sindhi_name }}" maxlength="255" required />
                                        @if($errors->has('sindhi_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('sindhi_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="leadFormCustomerName">قسم کا نام *</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" dir = "rtl" class="form-control {{ $errors->has('urdu_name') ? 'is-invalid' : '' }}" name="urdu_name" placeholder="قسم کا نام" value="{{ $category->urdu_name }}" maxlength="255" required />
                                        @if($errors->has('urdu_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('urdu_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="leadFormCustomerName">Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" required />
                                            <option value="1" @if($category->status == 1) selected  @endif >Active</option>
                                            <option value="0" @if($category->status == 0) selected  @endif >Inactive</option>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
</section>
@endsection