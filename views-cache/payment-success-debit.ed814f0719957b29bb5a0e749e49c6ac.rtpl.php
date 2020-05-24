<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Checkout example · Bootstrap</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/"> -->

    <!-- Bootstrap core CSS -->
 <link href="/assets/dist/css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" href="/res/site/css/bootstrap.min.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="/assets/form-validation.css" rel="stylesheet">
  </head>

<body>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="jumbotron">
                    <h1 class="display-3">Pedido n° <?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?> recebido!</h1>
                    <p class="lead">Você ainda precisa pagar usando o site do seu banco.</p>
                    <hr class="my-4">
                    <p>Use o botão abaixo para acessar o site do seu banco:</p>
                    <p class="lead">
                        <a class="btn btn-success btn-lg" href="<?php echo htmlspecialchars( $order["despaymentlink"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank" role="button">Ir para o banco</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

</body>
</html>
<!-- <script src="https://code.jquery.com/jquery.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous">
</script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script src="/res/site/js/handlebars-v4.010.js"></script>
<!-- <script>
    window.jQuery || document.write('<script src="/assets/js/vendor/jquery.slim.min.js"><\/script>')
</script> -->

<script src="/assets/dist/js/bootstrap.bundle.js">
