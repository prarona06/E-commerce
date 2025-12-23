@extends('layouts.admin')

@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="py-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.products') }}">Products</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Product</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">
                                <i class="fas fa-circle-info"></i> Create Product
                            </h3>
                            <div>
                                <a href="{{ route('admin.products') }}" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Go Back To List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                    @csrf

                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Producuct Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                           id="name" placeholder="Product Name" value="{{ old('name', $category->name) }}" />
                                           @error('name')
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>


                                           @enderror
                                </div>
                                  <div class="form-group mb-3">
                                        <label for="name">Category <span class="text-danger">*</span></label>
                                      <select name="category_id" id="" class="form-danger"></select>
<option value="">Select Category</option>
@foreach ($categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>

@endforeach


                                      @error('name')
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>


                                           @enderror
                                </div>
                                  <div class="form-group mb-3">
                                        <label for="name">Producuct Name</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                           id="name" placeholder="Product Name" value="{{ old('name', $category->name) }}" />
                                           @error('name')
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>


                                           @enderror
                                </div>

                              </div>

                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Update Category
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
