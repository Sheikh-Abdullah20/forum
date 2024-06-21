
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header bg-dark">
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark text-light text-center">
          <h2>Sign-Up To Our Website</h2>
         <form class = 'my-5' method = 'post' action = 'loginsystem/signup.php'>

        <div class="mb-4">
          <input type="email" class="form-control" id="signupemail" aria-describedby="emailHelp" placeholder = 'Enter Your Email' name = 'signupemail' required>
        </div>
        <div class="mb-4">
          <input type="password" class="form-control" id="signuppassword" placeholder = 'Enter Your Password' name = 'signuppassword' required>
        </div>

        <div class="mb-4">
          <input type="password" class="form-control" id="signupcpassword" placeholder = 'Confirm Your Password' name = 'signupcpassword' required>
        </div>
    
        <div class="modal-footer bg-dark d-flex justify-content-center border border-dark">
          <button type="button" class="btn btn-outline-info w-25" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-info w-50">Sign-Up</button>
        </div>
      </form>

      </div>
    </div>
  </div>
</div>

