@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                    <div class="col-lg-12 col-md-8 col-sm-12">
                        <div class="page-header float-center">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i> Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">User</a></li>
                                    <li class="breadcrumb-item active">Add Users</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="content">
            <div class="animated fadeIn">
            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Create User Form</strong> 
                            </div>
                            <div class="col-md-12">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                        </ul>            
                                    </div>
                                @endif
                            </div>
                            <div class="card-body card-block">
                                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Full Name<span class="text-danger">*</span></label>
                                        <input type="text" id="text-input" name="full_name" placeholder="Full Name" class="form-control" value="{{old('full_name')}}">
                                    </div>
                                </div> 
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for=""> Username</label>
                                        <input type="text" id="text-input" name="username" placeholder="Username" class="form-control" value="{{old('username')}}">
                                    </div>
                                </div> 
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Email<span class="text-danger">*</span></label>
                                        <input type="email" id="text-input" name="email" placeholder="Email Address" class="form-control" value="{{old('email')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Password<span class="text-danger">*</span></label>
                                        <input type="password" id="text-input" name="password" placeholder="Password" class="form-control" value="{{old('password')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" id="text-input" name="phone" placeholder="Phone" class="form-control" value="{{old('phone')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" id="text-input" name="address" placeholder="Address" class="form-control" value="{{old('address')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Photo</label>
                                        <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="photo">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12">
                                        <label for="">Role<span class="text-danger">*</span></label>
                                        <select name="role" class="form-control show-tick">
                                            <option value="">-- Role --</option>
                                            <option value="admin" {{old('role')=='admin' ? 'selected': ''}} >-- Admin --</option>
                                            <option value="customer" {{old('role')=='customer' ? 'selected': ''}}>-- Customer --</option>
                                            <option value="vendor" {{old('role')=='vendor' ? 'selected': ''}}>-- Vendor --</option>
                                        </select>
                                    </div>
                                    <br/>
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                        <select name="status" class="form-control show-tick">
                                            <option value="">-- Status --</option>
                                            <option value="active" {{old('status')=='active' ? 'selected': ''}} >-- Active --</option>
                                            <option value="inactive" {{old('status')=='inactive' ? 'selected': ''}}>-- Inactive --</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                        <button class="btn btn-outline-secondary" type="submit">Cancel</button>
                                     </div>
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
</div>
@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
    <script>
        $(document).ready(function() {
        $('#description').summernote();
        });
    </script>
@endsection