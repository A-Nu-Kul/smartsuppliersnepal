@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Add Banner</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Banner</a></li>
                                    <li class="active">Edit Banner</li>
                                </ol>
                            </div>
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
                                <strong>Edit Banner Form</strong> 
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
                                <form action="{{route('banner.update',$banner->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('patch')
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Title <span class="text-danger">*</span></label>
                                        <input type="text" id="text-input" name="title" placeholder="Title" class="form-control" value="{{$banner->title}}">
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
                                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                            <textarea id="description" class="form-control" name="description" placeholder="Write some text..." >{{$banner->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12">
                                        <label for="">Condition</label>
                                        <select name="condition" class="form-control show-tick">
                                            <option value="">-- Conditions --</option>
                                            <option value="banner" {{$banner->condition=='banner' ? 'selected': ''}} >Banner</option>
                                            <option value="promo" {{$banner->condition=='promo' ? 'selected': ''}} >Promotion</option>
                                        </select>
                                    </div>
                                    <br/>
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                        <select name="status" class="form-control show-tick">
                                            <option value="">-- Status --</option>
                                            <option value="active" {{$banner->status=='active' ? 'selected': ''}} >Active</option>
                                            <option value="inactive" {{$banner->status=='inactive' ? 'selected': ''}} >Inactive</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Update</button>
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