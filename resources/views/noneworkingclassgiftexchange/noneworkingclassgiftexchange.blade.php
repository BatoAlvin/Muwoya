

   @extends('layouts.navigation')

   @section('content')

   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">

    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">NoneWorkingclassgiftExchange</a></li>
        </ol>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">

                    <div class="media pt-3">

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3"> Name :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $noneworking['working_classname']}}</h5>

                        </div>

                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">And :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $noneworking['working_classnames']}}</h5>
                        </div>
                    </div>





                    <a class="btn btn-primary mt-4" href="/noneworkingclass">Back</a>


                </div>
            </div>
        </div>
    </div>
</div>

        @endsection

