@extends('backend.layouts.master')
@section('content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Assingment
            <small>
                Control panel
            </small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard">
                    </i>
                    Home
                </a>
            </li>
            <li class="active">
                Assingment Edit
            </li>
        </ol>
    </section>
    <!-- Main content -->
    @include('backend.partials.messages')


          {{--
    <div class="pad margin no-print">
        <div class="alert alert-info" style="margin-bottom: 0!important;">
            <i class="fa fa-info">
            </i>
            <b>
                Note:
            </b>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
        </div>
    </div>
    --}}
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            assingment Edit
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{!! route('admin.assingment.update',$assingment->id) !!}" method="post" role="form">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputassingment1">
                                    assingment Name
                                </label>
                                <input class="form-control" id="exampleInputassingment1" name="name" placeholder="Enter Name" required="" type="text" value="{{$assingment->assingment_name}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPriority1">
                                    Descriotion
                                </label>
                                <textarea class="form-control" name="assingment_details">{{$assingment->assingment_details}}</textarea>
                            </div>
                                 </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-warning" type="submit">
                                Update
                            </button>
                        </div>
                    </form> 
                            <div class="form-group">
                                <label>
                                    Image
                                </label>
                                <br>
                                <div id="image_preview"></div>
                                    @foreach ($assingment->images as $image)
                                    <img id="image" height="300px" src="{!! asset('/files/images/'.$image->image) !!}" width="300px">
                                        <form action="{!! route('admin.assingment.imagechage',$image->id) !!}" class="" enctype="multipart/form-data" method="post"> </img>
                                            @csrf
                                            <input id="upload_file" class="form-control" name="image" onchange="preview_image();" type="file" accept="image/*">
                                                <button class="btn btn-primary form-control" name="submit" type="submit">
                                                    Change Image
                                                </button>
                                    
                                        </form>
                                        @endforeach
                                   
                                </br>
                            </div>
                            <div class="form-group">
                                <label>
                                    Files
                                </label>
                                <br>
                                    @foreach ($assingment->files as $file)
                                    <iframe height="300px" src="{!! asset('/files/others/'.$file->file) !!}" width="300px">

                                        <form action="{!! route('admin.assingment.filechange',$file->id) !!}" class="" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <input id="upload_file" class="form-control" name="file" type="file" accept=".pdf,.doc,.docs,.txt">
                                                <button class="btn btn-primary form-control" name="submit" type="submit">
                                                    Change File
                                                </button>
                                           
                                        </form>
                                        @endforeach
                                    
                                </br>
                            </div>
                  
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</aside>
<!-- /.right-side -->
<!-- ./wrapper -->

<script language="javascript" type="text/javascript">
function preview_image()
{
 
 document.getElementById('image').src = URL.createObjectURL(event.target.files[0]);
  // $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[0])+"' height='150px' width='150px'>");
 
}

</script>
@endsection
