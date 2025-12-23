@extends('layouts.admin')

@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="py-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.categories') }}">Categories</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                                <i class="fas fa-circle-info"></i> Edit Category
                            </h3>
                            <div>
                                <a href="{{ route('admin.categories') }}" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Go Back To List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group mb-3">
                                        <label for="name">Category Name</label>
                                        <input type="text" value="{{ $category->name }}" name="name"
                                            class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                            placeholder="Category Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="serial_no">Serial No.</label>
                                        <input type="number" value="{{ $category->serial_no }}" min="0" name="serial_no"
                                            class="form-control @error('serial_no')
                                        is-invalid
                                    @enderror"
                                            placeholder="e.g: 1, 2">
                                        @error('serial_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-control mb-3">
                                        <label for="status">Status</label>
                                        <select name="status"
                                            class="form-control @error('status')
                                        is-invalid
                                    @enderror)">
                                            <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
