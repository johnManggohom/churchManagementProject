<form action="" method="post" enctype="multipart/form">
    <div class="modal fade text-left" id="newModal" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                {{ __('Create New Service') }}
            </h4>

            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>
            </button>
          
        </div>

        <div class="modal-body">
            <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="">Submit</button>
        </div>
    </div>
</div>


    </div>



</form>