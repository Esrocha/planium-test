<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themefisher.com">

  <title>Planium</title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- Header Start --> 

<header class="navigation">
	<div class="header-top ">
		<div class="container">
			
		</div>
	</div>
	
</header>

<!-- Header Close --> 

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-4 text-lg">Planium</h1>
          <ul class="list-inline">
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- contact form start -->
  <section   class="contact-form-wrap section">
    <div class="container">
      <div class="row">
        <h4 class="text-capitalize mb-12 text-lg">Faça seu Orçamento</h4>
        <div class="col-lg-6 mt-5 col-md-12 col-sm-12">
          <form action="#">
                <label for="numBen">Digite o numero de beneficiários</label>
                <input type="number" name="numBen">
                <button type="submit"> ok</button>
            </form>
            <form action='http://localhost/TestePlanium/api/api.php' name="formul" method='get'>

                <?php
                    
                    $numBen = isset($_GET['numBen'])? $_GET['numBen'] : "" ;
                    for ($i=0; $i < $numBen ; $i++) { 
                        echo "<input class='form-group col-md-12 mt-3' type='hidden' name='numBen' value='{$numBen}' ><input class='form-group col-md-12 mt-3' type='text' placeholder='Nome do Beneficiário' name='nome[]'><br><input class='form-group col-md-12 mt-3' col-md-12 mt-3' type='number' placeholder='Idade do Beneficiário' name='idade[]'><br><input class='form-group col-md-12 mt-3' type='text' placeholder='Escolha o plano' name='plano[]'><br>";
                    }
                    
                ?>
                <button type='submit'>confirmar</button>
            </form>
        
        </div>
        <div class="col-lg-5 col-sm-12 ">
            <!-- Consumindo a API com PHP -->
            <?php session_start();if (isset($_SESSION['erro'])) {echo $_SESSION['erro'];session_destroy();die;}elseif(isset($_SESSION['beneficiarios'])) {$beneficiarios = json_decode($_SESSION['beneficiarios'], 1) ; session_destroy();}else{ die;}?>
            <?php for($i=0; $i < $numBen; $i++ ): ?>
                
            <div class="justify-content-center mt-4 " >
                <p> <strong>Beneficiário:</strong>  <span> <?php echo $beneficiarios['subtotal'][$i]['subtotal']['nome'] ?></span> </p>
                <p> <strong>Idade: </strong> <span> <?php echo $beneficiarios['subtotal'][$i]['subtotal']['idade'] ?></span></p> 
                <p> <strong>Plano: </strong> <span> <?php echo $beneficiarios['subtotal'][$i]['subtotal']['nomePlano'] ?></span></p> 
                <p> <strong>Valor do Plano:</strong>  R$ <span> <?php echo number_format($beneficiarios['subtotal'][$i]['subtotal']['preco'],2, ',', '.') ?></span></p>
                <hr>
                <?php endfor?>

            </div>
            
            
            <p><strong>Total:</strong>  R$ <?php echo number_format($beneficiarios['total'],2, ',', '.')?></p> 
        </div>
    
    </div>
</section>

<!-- footer Start -->
<footer class="footer section">
	
</footer>
   
    </div>

  
  </body>
  </html>