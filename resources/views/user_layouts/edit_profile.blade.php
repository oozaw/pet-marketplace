@extends('user_layouts.user_master')
@section('content')
<div class="container">
    <!-- 
    CONTENT
    =============================================== -->
    <div class="row block none-padding-top">
        <div class="col-xs-12 col-md-12 col-lg-12 get-height">
            <div class="sdw-block">
                <div class="wrap bg-white">

                    <!-- Authirize form -->
                    <div class="row auth-form">
                        <!-- Header & nav -->
                        <div class="col-md-12">

                            <!-- Header -->
                            <h1 class="header text-uppercase">
                                Edit Biodata
                                <span>
                                    Profile
                                </span>
                            </h1>
                            
                            <!-- Modal body -->
                            <div class="col-md-10 col-md-offset-1 text-center">
                                {{-- @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif --}}
                                <h1 class="header text-uppercase">
                                    Update
                                    <span>
                                        Foto Data Profile
                                    </span>
                                </h1>

                                <form action="/profile/uploadfoto/{{$data_user->id}}" method="POST"  enctype="multipart/form-data">
                                    <div class="">
                                        <div class="form-group ">
                                            <input type="file" class="form-control" placeholder="Enter your promocode" name="foto_user[]" required>
                                        </div>
                                    </div>
                                    <span class="btn-panel col-md-2">
                                            @csrf
                                            <button type="submit" class="sdw-wrap btn-primary">
                                                <a  class="sdw-hover btn btn btn-material btn-primary ">
                                                    {{-- <i class="icon icofont icofont-check-circled"></i> --}}
                                                    <span class="body" >Submit</span></a>
        
                                            </button> 
                                    </span>
                                </form>

                                {{-- <form enctype="multipart/form-data" action="/profile" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputPassword2">Foto Profile</label>
                                        <input type="file" class="form-control">
                                    </div>
                                    
                                    <a href="/" class="btn btn-primary btn-material"> 
                                        <span class="body">Submit</span>
                                        <i class="icon icofont icofont-check-circled" onclick="return confirm('Anda yakin ingin mengganti foto profile?')"></i>
                                    </a>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: CONTENT -->
</div>
@endsection