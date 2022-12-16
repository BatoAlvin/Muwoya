
@extends('layouts.navigation')

@section('content')

<script>
    function clearTexts()
{
    document.getElementById('nameid').value = "";
    document.getElementById('amountid').value = "";
    document.getElementById('descriptionid').value = "";
    document.getElementById('dateid').value = "";
}

</script>

<style>
    .coll{
color:#000;
    }

    .error{
    color:red;
    font-style:italic;
}
</style>
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
     <h5>Elders Gift Exchange </h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add User</i></button>
     <a href="{{ route('exportelders')}}" class="btn btn-success"><i class="fa fa-download" style="color:#fff;">Excel</i></a>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('elders.store')}}" method='post'>


                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                        <div class="form-group">
                         <label for="recipient-name" class="coll">Name</label>
                         <input type="text" class="form-control"  name="name" id="amountid" required>
                       </div>


                       <div class="form-group">
                         <label for="recipient-name" class="coll"> Name</label>
                         <textarea type="text" class="form-control"  name="eldergift" id="descriptionid" required></textarea>
                       </div>



                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" value="Reset" onclick="clearTexts()">Close</button>
                      <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
<!-- row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Name</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elderexchange as $elderexchanges)
                            <tr>
                                <td>{{$elderexchanges->name}}</td>
                                <td>{{$elderexchanges->eldergift}}</td>
                                </td>


                                <td>
                                    <a href="{{url('elders/'.$elderexchanges->id )}}"<button class="btn btn-success"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $elderexchanges->id }}"><i class='fa fa-edit'>
                                       </i>
                                       </button>

                                       <div class="modal fade" id="exampleModal{{ $elderexchanges->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Edit {{ $elderexchanges->name }}</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>
                                               <div class="modal-body">
                                                 <form action="{{ route('elders.update', [$elderexchanges->id])}}" method='post'>

                                                   @method('PUT')
                                                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                   <div class="form-group">
                                                     <label for="recipient-name" class="col-form-label">Name</label>
                                                     <input type="text" class="form-control"  name="name" required value="{{$elderexchanges->name}}">
                                                   </div>

                                                   <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Name</label>
                                                    <input type="text" class="form-control"  name="eldergift" required value="{{$elderexchanges->eldergift}}">
                                                  </div>





                                                   <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Update User</button>
                                               </div>
                                                 </form>
                                               </div>
                                             </div>
                                           </div>
                                         </div>



                                      <form action="{{route('elders.destroy', $elderexchanges->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

 @endsection
