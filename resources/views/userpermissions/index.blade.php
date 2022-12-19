
@extends('layouts.navigation')

@section('content')


<script>

function clearText()
{
    document.getElementById('role').value = "";

}


    $(document).ready(function() {
   const roleValidation = document.querySelector('#role');
   roleValidation.addEventListener('blur', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validaterole',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': roleValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){
      document.getElementById('role_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('role_res_message').style.display = 'none'
        document.getElementById('btn').disabled = false
      }
      },
      error: function(error) {
        console.log(error);
      }
      });
      }
      );
      }
      );


</script>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Roles Table</h4>



<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Role</i></button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('userpermission.store')}}" method='post'>

                     <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <div class="form-group">
                        <label class="col-form-label"> Roles</label>
                        <input type="text" class="form-control" id="role" name="role_name" required>


                      </div>
            <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
          <button type="submit" class="btn btn-primary">Add Role</button>
        </div>
          </form>
        </div>

      </div>
    </div>
  </div>


                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="m-t-0 header-title mb-4"><b>Roles</b></h4>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th>Roles</th>

                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

 @endsection
