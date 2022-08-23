<?php require('header.php'); ?>

<div class="container p-5 my-5 border">
  <h1>Bem vindo(a) a instação automática</h1>
  <p>Siga agora os próximos passos para configuração e instalação.</p>

  <form>
  <div class="mb-">
    <label for="dbHost" class="form-label">Host</label>
    <input type="email" class="form-control" id="dbUser" aria-describedby="emailHelp">
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>







<?php require('footer.php'); ?>
