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
                                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                                    <li class="breadcrumb-item active">List Products</li>
                                </ol>
                                <p class="float-right">Total Products: {{\App\Models\Product::count()}}</p>
                                <a class="btn btn-sm btn-outline-secondary" href="{{route('product.create')}}"><i class="icon-plus"></i> Create Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- START PAGE CONTENT-->
            <div class="col-lg-12">
                @include('backend.layouts.notification')
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><strong>Product List</strong></div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Size</th>
                                    <th>Condition</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Size</th>
                                    <th>Condition</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($products as $item)
                                @php
                                    $photo=explode(',',$item->photo);
                                @endphp
                            <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->title}}</td>
                                    <td><img src="{{$photo[0]}}" alt="product image" style="max: height 98px;max-width:128px;"></td>
                                    <td>{{number_format($item->price,2)}}</td>
                                    <td>{{$item->discount}}%</td>
                                    <td>{{$item->size}}
                                    <td>
                                        <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                    </td>
                                    <td>
                                        @if($item->conditions=='new')
                                            <span class="badge badge-success">{{$item->conditions}}</span>
                                        @elseif($item->conditions=='popular')
                                            <span class="badge badge-warning">{{$item->conditions}}</span>
                                        @else
                                            <span class="badge badge-primary">{{$item->conditions}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);"data-toggle="modal" data-target="#productID{{$item->id}}" title="view" class="float-left btn btn-sm btn-outline-secondary" data-placement="bottom"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('product.edit',$item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fa fa-edit"></i></a>
                                        <form class="float-left ml-2" action="{{route('product.destroy',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash-alt"></i></a>
                                        </form>
                                        
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="productID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            @php
                                            $product=\App\Models\Product::where('id',$item->id)->first();
                                            @endphp
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{\Illuminate\Support\Str::upper($product->title)}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Summary:</strong>
                                                <p>{!! html_entity_decode($product->summary) !!}</p>
                                                <strong>Description:</strong>
                                                <p>{!! html_entity_decode($product->description) !!}</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Price:</strong>
                                                    <p>${{number_format($product->price,2)}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Offer Price:</strong>
                                                    <p>${{number_format($product->offer_price,2)}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Stock:</strong>
                                                    <p>{{$product->stock}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Category:</strong>
                                                    <p>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Child Category:</strong>
                                                    <p>{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Brand:</strong>
                                                    <p>{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Size:</strong>
                                                    <p class="badge badge-warning">{{$product->size}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Vendor:</strong>
                                                    <p>{{\App\Models\User::where('id',$product->vendor_id)->value('full_name')}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Conditions:</strong>
                                                    <p class="badge badge-primary">{{$product->conditions}}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Status:</strong>
                                                    <p class="badge badge-warning">{{$product->status}}</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e){
            var form = $(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        });
    </script>
    <script>
        $('input[name=toogle]').change(function (){
            var mode=$(this).prop('checked');
            var id=$(this).val();
            //alert(id);    
            $.ajax({
                url:"{{route('product.status')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function (response){
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>
    @endsection