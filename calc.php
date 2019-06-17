<?php
  $url = "http://webservice.enfoque.com.br/wsDegustacambio/getDataHistory.asmx/GetQuotes?login=ws_17-06-2019&senha=Cambio2018";
  // create a new cURL resource
  $ch = curl_init();
  // set URL and other appropriate options
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  // grab URL and pass it to the browser
  $result = curl_exec($ch);
  // close cURL resource, and free up system resources
  curl_close($ch);
  //header("Content-type: application/json");
  //echo($result);
  $cotacoes = json_decode($result, true);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
 @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap&subset=latin-ext');
body{
  font-family: 'Open Sans', sans-serif;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100%;
}
.Calculadora{
  width: 350px;
  background-color: #ffcf49;
  border-radius: 24px;
}
.Calculadora_Container{
  width: calc(100% - 64px);
  margin: 32px;
}
.Calculadora_Titulo{
  font-size: 32px;
  font-weight: 700;
  color: #222;
}
.LabelCalc{
  font-weight: 700;
  margin-bottom: 4px;
}
.FormataInput{
  margin-top: 24px;
  display: flex;
  flex-direction: column;
}
.Row_Inputs{
  display: flex;
  justify-content: space-between;
  flex-direction: row;
}
.Row_Cotacao{
  display: flex;
  justify-content: space-between;
  flex-direction: column;
}
.InputMoeda{
  width: 45%;
}
.InputQuantidade{
  width: 45%;
}
.InputTotal{
  width: 100%;
}
.FormataCampo{
  border: none;
  padding: 14px;
  border-radius: 4px;
}
.BtnComprar{
  width: 100%;
  margin-top: 24px;
  margin-bottom: 12px;
  padding: 16px;
  border: none;
  background-color: #b93232;
  color: #fff;
  text-transform: uppercase;
  font-weight: 700;
  border-radius: 4px;
}
.CalcTituloCotacao{
  padding-top: 8px;
  font-weight: 700;
  font-size: 16px;
  color: #b93232;
}
.CalcResultCotacao{
  font-size: 13px;
}
    </style>
</head>

<body>
<div class="Calculadora">
      <div class="Calculadora_Container">
        <div class="Calculadora_Titulo">faça uma cotação
        </div>
        <form method="get" action=".">
            <div class="Row_Inputs">
              <div class="FormataInput InputMoeda">
                <label class="LabelCalc" for="moeda">Moeda</label>
                <select require id="moeda" class="FormataCampo">
                <option disabled selected> Escolha</option>
                <?php
                if (!empty($cotacoes)) {
                    foreach($cotacoes['Cotacoes'] as $moeda) {
                        echo '<option value="'.$moeda['Ult'].'">'.$moeda['Cod'].'</option>'.PHP_EOL;
                    }
                }
                ?>
                </select>
              </div>
              <div class="FormataInput InputQuantidade">
                <label  for="quantidade" class="LabelCalc">Quantidade</label>
                <input id="quantidade" class="FormataCampo" placeholder="1.500,00">
              </div>
            </div>
          <div class="Row_Inputs">
              <div class="FormataInput InputTotal">
                <label for="totalInput" class="LabelCalc">Total com IOF</label>
                <input id="totalInput" class="FormataCampo" placeholder="R$ 199,00">
              </div>
          </div>
          <div class="Row_Inputs">
            <button class="BtnComprar">Comprar</button>
          </div>
          <div class="Row_Cotacao">
            <span class="CalcTituloCotacao">Cotação turismo</span>
            <span id="total" class="CalcResultCotacao">Selecione a moeda</span>
          </div>
        </form>
      </div>
    </div>

    <script type="text/javascript">
    let moedaHtml = document.getElementById("moeda");
    let quantidadeHtml = document.getElementById("quantidade");
    quantidadeHtml.addEventListener('blur', calculaCambio);
    moedaHtml.addEventListener('change', calculaCambio);
    //função pra calcular o cambio com IOF
    function calculaCambio() {
        let moedaHtml = document.getElementById("moeda");
        let quantidadeHtml = document.getElementById("quantidade");
        let totalHtml = document.getElementById("total");
        let totalHtmlInput = document.getElementById("totalInput");
        let totalComercialHtml = document.getElementById("totalcomercial");
        let cotacaoMoeda = moedaHtml.value;
        let quantidade = quantidadeHtml.value;
        if ((quantidade > 0 && !isNaN(quantidade)) && !isNaN(cotacaoMoeda)) {
            let cambio = (cotacaoMoeda * quantidade);
            totalHtml.innerHTML = 'R$ ' + (cambio * 1.011).toFixed(2);
            totalHtmlInput.value = 'R$' + (cambio * 1.011).toFixed(2);
            totalComercialHtml.innerHTML = 'R$ ' + cambio.toFixed(2);
        }
    }
    </script>
</body>

</html>
