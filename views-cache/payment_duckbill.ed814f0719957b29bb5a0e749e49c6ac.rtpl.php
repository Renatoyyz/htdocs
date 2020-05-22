<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

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
  <body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
          <img  src="/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">  
          <h2>Checkout form</h2>
        </div>

        <div class="row">
          
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Valor da Compra</h4>
            <?php echo htmlspecialchars( $order["vltotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></br>
            <?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></br>
            <?php echo htmlspecialchars( $order["yearCard"], ENT_COMPAT, 'UTF-8', FALSE ); ?></br>
            <?php echo htmlspecialchars( $order["mouthCard"], ENT_COMPAT, 'UTF-8', FALSE ); ?></br>
            <?php echo htmlspecialchars( $pagseguro["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></br>

            <div id="alert-error" class="alert alert-danger hide">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <span class="msg">Error</span>
            </div>
            
            <form action="/payment_duckbill/credit" class="needs-validation" method="POST">

              <div class="row">
                
              </div>
              <hr class="mb-4">
          
              <hr class="mb-4">

              <h4 class="mb-3">Pagamento</h4>

              <div class="d-block my-3">
                
              </div>

              <!-- Campo criado na função do pagseguro PagSeguroDirectPayment.getBrand-->
              <input type="hidden" name="brand" id="brand_field" >

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Nome no Cartão</label>
                  <input type="text" class="form-control" id="cc-name" value="Renato Oliveira" name="nomecartao" placeholder="" required>
                  <small class="text-muted">Nome completo como mostrado no cartão</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Número do cartão</label>
                  <input type="text" class="form-control" id="cc-number" value="4111111111111111" name="numerocartao"  placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Mes</label>
                  <input type="text" class="form-control" id="cc-expiration" value="07" placeholder="" name="expirames"  required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>

                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Ano</label>
                  <input type="text" class="form-control" id="cc-expiration" value="23" placeholder="" name="expiraano"  required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>

                <div class="col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" value="123" placeholder="" name="cvv"  required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue o Pagamento</button>
            </form>
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
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
              integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
              crossorigin="anonymous">
      </script>
      <script src="/res/site/js/handlebars-v4.010.js"></script>
      <script>
          window.jQuery || document.write('<script src="/assets/js/vendor/jquery.slim.min.js"><\/script>')
      </script>
      
      <script src="/assets/dist/js/bootstrap.bundle.js">
      </script>
      <script src="/assets/form-validation.js"></script>
      <script src="<?php echo htmlspecialchars( $pagseguro["urlJS"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></script>

      <script type="text/javascript">
          PagSeguroDirectPayment.setSessionId('<?php echo htmlspecialchars( $pagseguro["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>');
      </script>

      <script>

        function showError(error){
          $("#alert-error span.msg").text(error);
          $("#alert-error").removeClass("hide");
        }

        PagSeguroDirectPayment.getPaymentMethods({
            amount: parseFloat("<?php echo htmlspecialchars( $order["vltotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"),
            success: function (response) {
              // Retorna os meios de pagamento disponíveis.
              //Devolve os bancos disponíveis para Débito
              $.each(response.paymentMethods.ONLINE_DEBIT.options,  function(index, option){
                // console.log(option.name);
                // console.log(option.images.MEDIUM.path);
                // console.log(option.displayName);
              });

              //Devolve os bandeiras disponíveis para Crédito
              $.each(response.paymentMethods.CREDIT_CARD.options,  function(index, option){
                // console.log(option.name);
                // console.log(option.images.MEDIUM.path);
                // console.log(option.displayName);
              });
            },
            error: function (response) {
              // Callback para chamadas que falharam.
              var errors = [];
              for ( var code in response.errors ){
                errors.push(response.errors[code]);
              }
              showError(errors.toString());
            },
            complete: function (response) {
              // Callback para todas chamadas.
            }
          });

          PagSeguroDirectPayment.getBrand({
              cardBin: parseInt("<?php echo htmlspecialchars( $order["cardBin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"),
              success: function (response) {
                //bandeira encontrada
                console.log("Sucesso getBrand");
                console.log(response);
                $("#brand_field").val(response.brand.name);//vai criar um campo no html, colocar como hiden
              },
              error: function (response) {
                //tratamento do erro
                  var errors = [];
                  for (var code in response.errors) {
                    errors.push(response.errors[code]);
                  }
                  showError(errors.toString());
              },
              complete: function (response) {
                //tratamento comum para todas chamadas
              }
            });

      </script>
    
  </body>
</html>
