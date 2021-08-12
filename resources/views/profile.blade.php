@extends('layouts.base')


@section('content')

<br>
<br>
<br>
<br>
<br><br>


<main id="main">


    @if ($status == TRUE)
        


<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 col-xl-6">
           
     <div class="card shadow p-3">

        <h3 style="color: #32325d;font-weight: bold">Profile</h3>


<br>
<h6 style="color:#8898aa">
    User Information
</h6>
<div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Username</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="{{$profile->fullname}}" disabled>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Phone</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="{{$profile->phone}}" disabled>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

           
            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" value="{{ Auth::user()->email }}" class="form-control" id="email" disabled placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

{{--            

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" disabled>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" disabled>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div> --}}
            <div class="col-md-12">
                <label for="zip" class="form-label">Address</label>
            <textarea name=""  disabled  class="form-control" id="" cols="30" rows="2">{{$profile->address}}</textarea>
            </div>
            <div class="col-md-12">
              <label for="zip" class="form-label">age</label>
              <input type="number" value="{{$profile->age}}" min="1" class="form-control" id="zip" placeholder="" disabled>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>

            <div class="col-md-12">
                <label for="zip" class="form-label">AboutMe !</label>
            <textarea name=""  class="form-control" id="" cols="30" rows="10">{{$profile->status}}</textarea>
            </div>

          </div>
     </div>
        
        </div>
        <div class="col-md-4 col-xl-3">
                <div class="card shadow p-3">
                    <img class="img-fluid w-100" style="border-radius: 10px" src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fmyanimeshelf.com%2Fupload%2Fdynamic%2F2013-12%2F08%2F372.jpg&f=1&nofb=1" alt="">
               

                    <div class="card-body">


                    <input type="text" class="form-control" id="firstName" placeholder="" value="{{Auth::user()->name}}" required="">
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                 
                    </div>
                </div>

                
        </div>
    </div>
</div>
    @else
        <!-- Button trigger modal -->


        <div class="container">
            <br>
            <br>
<center>

    <button type="button" class=" w-50 btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
        You dont have profile :(
      </button>
</center>
              
        </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" enctype="multipart/form-data" id="send">
            @csrf
            <div class="modal-body">
                <div class="input-group mb-3">
                   
                    <input type="text" class="form-control" placeholder="fullname" aria-label="fullname" name="fullname" aria-describedby="basic-addon1">
                  </div>
                  
                  <div class="input-group mb-3">
                   
                    <input type="number" class="form-control" placeholder="age" aria-label="age" name="age" aria-describedby="basic-addon1">
                  </div>
                  
                  <div class="input-group mb-3">
                   
                    <input type="text" class="form-control" placeholder="phone" aria-label="phone" name="phone" aria-describedby="basic-addon1">
                  </div>
                  
                 
                 
                 
                  <div class="input-group">
                    <span class="input-group-text">status</span>
                    <textarea name="status" class="form-control" aria-label="With textarea"></textarea>
                  </div>


                 <br>
                 
                  <div class="input-group">
                    <span class="input-group-text">address</span>
                    <textarea name="address" class="form-control" aria-label="With textarea"></textarea>
                  </div>
<br>
                  <div class="input-group mb-3">
                    <input type="file" name="thumb" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
      </div>
    </div>
  </div>
  
    @endif

</main>



<script>
      $('#send').submit(function (e) {

e.preventDefault();
// var formData = new FormData(this);
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
  url: '{{ route("create_profile") }}',
  type: 'POST',
  data: new FormData(this),
  dataType: 'JSON',
  contentType: false,
  cache: false,
  processData: false,

  success: function (data) {
    window.location.reload();
  }
});


});
</script>
@endsection