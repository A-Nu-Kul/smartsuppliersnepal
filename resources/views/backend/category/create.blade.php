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
                                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                                    <li class="breadcrumb-item active">Add Category</li>
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
                                <strong>Create Category Form</strong> 
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
                                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Title <span class="text-danger">*</span></label>
                                        <input type="text" id="text-input" name="title" placeholder="Title" class="form-control" value="{{old('title')}}">
                                    </div>
                                </div> 

                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Summary</label>
                                            <textarea id="description" class="form-control" name="summary" placeholder="Write some text..." >{{old('summary')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Is parent :<span class="text-danger">*</span></label>
                                            <input id="is_parent" type="checkbox" name="is_parent" value="1" checked> Yes 
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12 d-none" id="parent_cat_div">
                                    <label for="parent_id">Parent Category</label>
                                        <select name="parent_id" class="form-control show-tick">
                                            <option value="">-- Parent Category --</option>
                                            @foreach($parent_cats as $pcats)
                                                <option value="{{$pcats->id}}"{{old('parent_id')==$pcats->id ? 'selected' : ''}}>{{$pcats->title}}</option>
                                            @endforeach
                                        </select>
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
    <script>
        $('#is_parent').change(function(e) {
            e.preventDefault();
            var is_checked=$('#is_parent').prop('checked');
            //alert(is_checked);
            if(is_checked){
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat_div').val('');
            }
            else{
                $('#parent_cat_div').removeClass('d-none');
            }
        });
    </script>
@endsection