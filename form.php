<?php 

require 'header.php';
include 'db.php';

$sql = "SELECT `id`, `nome` FROM `tb_evento`";
$result = mysqli_query($conn, $sql);

?>

<main>
  <div class="container">

    <h1>Impressão de certificado</h1>
    <p class="lead">Preencha o formulário a baixo com seus dados e o evento referente.</p>
    
    <form name="emitCert" action="emitcert.php" method="post">
        <div class="row mb-3">
            <div class="col-4 themed-grid-col">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
            </div>
            <div class="col-4 themed-grid-col">
                <select class="form-select" aria-label="Default select example" name="myId">
                    <?php while ($row1 = mysqli_fetch_array($result)):;?>
                    <option value="<?php echo $row1['id'];?>"><?php echo $row1['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-4 themed-grid-col">
                <button type="submit" class="btn btn-primary">Emitir certificado</button>
            </div>
        </div>
    </form>
  </div>
</main>

<?php require 'footer.php'; ?>
