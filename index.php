<!DOCTYPE html>
<html lang="pt-BR">
<head>O
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">
    <title>Dogão e CIA - Página de Cadastro </title>
</head>
<body style="background-image: url('background.webp'); background-repeat: repeat;
background-attachment: fixed; background-size: cover;">

<?php
    function get_endereco($cep) {
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";
        $xml = simplexml_load_file($url);
        return $xml;
    }

    if (!isset($_SESSION)) {
        session_start();
    }
    
    $_SESSION['nome'] = "";
    $_SESSION['cep'] = "";
    $_SESSION['logradouro'] = "";
    $_SESSION['numero'] = "";
    $_SESSION['bairro'] = "";
    $_SESSION['cidade'] = "";
    $_SESSION['estado'] = "";

    if(isset($_POST['btnBuscar'])) {
        $endereco = get_endereco($_POST["txtCEP"]);
        $_SESSION["nome"] = $_POST["txtNome"];
        $_SESSION["cep"] = $_POST["txtCEP"];
        $_SESSION["logradouro"] = (string) $endereco->logradouro;
        $_SESSION["numero"] = $_POST["txtNumero"];
        $_SESSION["bairro"] = (string) $endereco->bairro;
        $_SESSION["cidade"] = (string) $endereco->localidade;
        $_SESSION["estado"] = (string) $endereco->uf;
    }
    
?>

    <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding-large w3-card">
        <a href="#menu" class="w3-bar-item w3-button"><b>DOGÃO</b> Lanches</a>
        <div class="w3-right w3-hide-small">
        <a href="#produtos" class="w3-bar-item w3-button">Produtos</a>
        <a href="#sobre" class="w3-bar-item w3-button">Sobre</a>
        <a href="#cadastro" class="w3-bar-item w3-button">Cadastro</a>
        </div>
    </div>
    </div>

    <div class="w3-content" style="max-width:1200px; height:978px;">
    <div class="w3-text-black w3-center w3-card-4 w3-light-grey w3-display-middle w3-round-xlarge" id="" style="width:800px; opacity:100;">
        <h2 class=""><b>CADASTRO DE CLIENTES</b></h2>
        <form action="#" method="post" class="w3-row w3-text-blue w3-center" style="width: 95%;">
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-user"></i>
                 </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large w3-hover-light-grey" name="txtNome" type="text" placeholder="Nome Completo" value="">
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge far fa-envelope-open"></i>
                </div>
                <div class="w3-col" style="width:50%;">
                    <input class="w3-input w3-border w3-round-large w3-hover-light-grey" name="txtCEP" type="text" placeholder="Ex: 11111000 (apenas números)" value="<?php echo $_SESSION['cep'];?>">
                </div>
                <div class="w3-rest" style="">
                    <button name="btnBuscar" class="w3-button w3-amber w3-round-large w3-right w3-hover-orange"
                    style="width: 95%;">Buscar Endereço</button>
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fas fa-home"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large w3-hover-light-grey" name="txtLogradouro"
                    type="text" placeholder="Rua, Avenida e etc."
                    value="<?php echo $_SESSION['logradouro'];?>">
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <span class="w3-xxlarge ">Nº</span>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large w3-hover-light-grey" name="txtNumero" type="text"
                    placeholder="Número ex (1111)"
                    value="<?php echo $_SESSION['numero'];?>">
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fas fa-home"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large w3-hover-light-grey" name="txtBairro" type="text"
                    placeholder="Bairro."
                    value="<?php echo $_SESSION['bairro'];?>">
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fas fa-map-marked"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large w3-hover-light-grey" name="txtCidade" type="text"
                    placeholder="Cidade."
                    value="<?php echo $_SESSION['cidade'];?>">
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fas fa-map-marked-alt"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large w3-hover-light-grey" name="txtEstado" type="text"
                    placeholder="Estado."
                    value="<?php echo $_SESSION['estado'];?>">
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-center">
                    <button name="btnCadastrar" class="w3-button w3-block w3-margin w3-blue w3-cell w3-round-large w3-hover-green" style="width: 20%;">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>
</html>