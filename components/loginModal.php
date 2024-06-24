
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header bg-dark">
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark text-light text-center">
          <h2>Login To Our Website</h2>
         <form class = 'my-5' method='post' action='loginsystem/login.php'>

        <div class="mb-4">
          <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder = 'Enter Your Email' name = 'loginEmail' required>
        </div>
        <div class="mb-5">
          <input type="password" class="form-control" id="loginPassword" placeholder = 'Enter Your Password' name = 'loginPassword' required>
        </div>
    
        <div class="modal-footer bg-dark d-flex justify-content-center border border-dark">
          <button type="button" class="btn btn-outline-info w-25" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-info w-50">Login</button>
        </div>
      </form>

      </div>
    </div>  
  </div>
</div>