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
                                    <li class="breadcrumb-item active">List Users</li>
                                </ol>
                                <p class="float-right">Total User: {{\App\Models\User::count()}}</p>
                                <a class="btn btn-sm btn-outline-secondary" href="{{route('user.create')}}"><i class="icon-plus"></i> Create User</a>
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
                        <div class="ibox-title"><strong>User List</strong></div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Full Name</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.N</th>
                                    <th>Full Name</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($users as $item)
                            <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->full_name}}</td>
                                    <td><img src="{{$item->photo}}" alt="user image" style="border-radius:50%; height:60px; width:60px;"></td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->role}}</td>
                                    <td>
                                        <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);"data-toggle="modal" data-target="#userID{{$item->id}}" title="view" class="float-left btn btn-sm btn-outline-secondary" data-placement="bottom"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('user.edit',$item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-warning"data-placement="bottom"><i class="fa fa-edit"></i></a>
                                        <form class="float-left ml-2" action="{{route('user.destroy',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash-alt"></i></a>
                                        </form>
                                        
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="userID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            @php
                                            $user=\App\Models\User::where('id',$item->id)->first();
                                            @endphp
                                            <div class="modal-content">
                                                <div class="text-center">
                                                    <img src="{{$user->photo}}" style="height:60px; width:60px; border-radius:50%; margin: 2% 0" alt="User image">
                                                </div>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$user->full_name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Username:</strong>
                                                    <p>{{$user->username}}</p>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>Email:</strong>
                                                        <p>{{$user->email}}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Phone:</strong>
                                                        <p>{{$user->phone}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>Address:</strong>
                                                        <p>{{$user->address}}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Role:</strong>
                                                        <p>{{$user->role}}</p>
                                                    </div>
                                                </div>
                                                

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <strong>Status:</strong>
                                                        <p class="badge badge-warning">{{$user->status}}</p>
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
                url:"{{route('user.status')}}",
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