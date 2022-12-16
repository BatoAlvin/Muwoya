
@extends('layouts.navigation')

@section('content')

<script>
    function clearTexts()
{
  location.reload();
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
     <h5>Loans </h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Loan</i></button>
     <a href="{{ route('exportsaving')}}" class="btn btn-success"><i class="fa fa-download" style="color:#fff;">Excel</i></a>

        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Saving</i></button> --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Loan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('loans.store')}}" method='post'>


                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                 <div class="form-group">
                                  <label for="recipient-name" class="coll">Name</label>
                                  <select class="form-control" name="loan_name" required>

                                    <option selected disabled value=''>Choose Name</option>
                                        @foreach($consignee as $consignees)

                                        <option value="{{ $consignees->id}}">{{ $consignees->family_name}}</option>
                                        <div id="editor-container" class="mb-1"></div>
                                        @endforeach

                                   </select>

                                </div>

                        <div class="form-group">
                         <label for="recipient-name" class="coll">Loan Amount</label>
                         <input type="text" class="form-control"  name="loan_amount" id="amountid" required>
                       </div>

                       <div class="form-group">
                        <label for="recipient-name" class="coll">Percentage</label>
                        <input type="number" onblur="calculateReturn(this.value)" step="any" class="form-control"  name="loan_percentage" id="" min="0" max="100" required>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="coll">Return Amount</label>
                        <input type="text" readonly class="form-control"  name="return_amount" id="return">
                      </div>
<script>
  function calculateReturn(percentage){
    var loan = document.getElementById("amountid").value;
    var retun = ((percentage/100)*loan)+parseInt(loan);
    document.getElementById("return").value = retun;
  }
</script>
                       <div class="form-group">
                         <label for="recipient-name" class="coll"> Description</label>
                         <textarea type="text" class="form-control"  name="loan_description" id="descriptionid" required></textarea>
                       </div>

                       <div class="form-group">
                         <label for="recipient-name" class="coll">Date</label>
                         <input type="date" class="form-control"  name="loan_date" id="dateid" required>
                       </div>


                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="clearTexts()">Close</button>
                      <button type="submit" class="btn btn-primary">Add Loan</button>
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
                                <th>No</th>
                                <th>Names</th>
                                <th>Loan Amount</th>
                                <th>Return Amount</th>
                                <th>Percentage</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loan as $loans)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                                <td>{{$loans->member->family_name}}</td>
                                <td>{{ number_format($loans->loan_amount)}}</td>
                                <td>{{ number_format($loans->return_amount)}}</td>
                                <td>{{$loans->loan_description}}</td>
                                <td>{{$loans->loan_date}}</td>
                                </td>


                                <td>
                                    <a href="{{url('loans/'.$loans->id )}}"<button class="btn btn-success"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $loans->id }}"><i class='fa fa-edit'>
                                       </i>
                                       </button>

                                       <div class="modal fade" id="exampleModal{{ $loans->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Edit {{ $loans->loan_name }}</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>
                                               <div class="modal-body">
                                                 <form action="{{ route('loans.update', [$loans->id])}}" method='post'>

                                                   @method('PUT')
                                                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                   <div class="form-group">
                                                     <label for="recipient-name" class="col-form-label">Names</label>
                                                     <input type="text" class="form-control"  name="loan_name" required value="{{$loans->loan_name}}">
                                                   </div>

                                                   <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Loans Amount</label>
                                                    <input type="text" class="form-control"  name="loan_amount" required value="{{$loans->loan_amount}}">
                                                  </div>


                                                    <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Percentage</label>
                                                    <input type="number" onblur="calculateReturn(this.value)" step="any" class="form-control"  name="loan_percentage" id="" min="0" max="100" required value="{{$loans->loan_percentage}}">
                                                  </div>


                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Return Amount</label>
                                                    <input type="text" readonly class="form-control"  name="return_amount" id="return" value="{{$loans->return_amount}}">
                                                  </div>


                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label"> Description</label>
                                                    <input type="text" class="form-control"  name="loan_description" required value="{{$loans->loan_description}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Date</label>
                                                    <input type="date" class="form-control"  name="loan_date" required value="{{$loans->loan_date}}">
                                                  </div>


                                                   <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Update Loan</button>
                                               </div>
                                                 </form>
                                               </div>
                                             </div>
                                           </div>
                                         </div>



                                      <form action="{{route('loans.destroy', $loans->id)}}" method="post">
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
