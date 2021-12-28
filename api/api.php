<?php
session_start();

//Recebendo dados do formulário
$request = $_REQUEST;

//Armazenando url do cliente
$url = $_SERVER["HTTP_REFERER"];

//obtendo tabela de preços
$priceJson = file_get_contents('../database/prices.json');
$price = json_decode($priceJson, 1);

//obtendo tabela de planos
$plansJson = file_get_contents('../database/plans.json');
$plans = json_decode($plansJson, 1);

$valorTotal = 0;

if ($request) {

    $subTotal = [] ;
    $numBen = isset($request['numBen']) ? $request['numBen']:'';

    //Organizando arrays recebidas pelo request
    for ($i=0; $i < count($request['nome']); $i++) { 
        $dadosBen[$i]['nome'] = isset($request['nome'][$i]) ? $request['nome'][$i]:'';
        $dadosBen[$i]['idade'] = isset($request['idade'][$i]) ? $request['idade'][$i]:'';
        $dadosBen[$i]['plano'] =  isset($request['plano'][$i]) ? $request['plano'][$i]:'';

        //Insere os dados na array sub total, de acordo com o plano escolhido
        switch ($dadosBen[$i]['plano']) {
            case 1:
                if($numBen >= $price[0]['minimo_vidas'] && $numBen < $price[1]['minimo_vidas']) {
                    if($dadosBen[$i]['idade'] < 18) {
                        $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plnas[0]['nome'], 'preco' => $price[0]['faixa1']];
                    } elseif($dadosBen[$i]['idade'] > 40) {
                        $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plnas[0]['nome'], 'preco' => $price[0]['faixa3']];
                    } elseif($dadosBen[$i]['idade'] > 17 || $dadosBen[$i]['idade'] <= 40) {
                        $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plnas[0]['nome'], 'preco' => $price[0]['faixa2']];
                    }
                
                }elseif($numBen >= $price[1]['minimo_vidas']) {
                    if($dadosBen[$i]['idade'] < 18) {
                        $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plnas[0]['nome'], 'preco' => $price[1]['faixa1']];
                    } elseif($dadosBen[$i]['idade'] > 40) {
                        $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plnas[0]['nome'], 'preco' => $price[1]['faixa3']];
                    } elseif($dadosBen[$i]['idade'] > 17 || $dadosBen[$i]['idade'] <= 40) {
                        $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plnas[0]['nome'], 'preco' => $price[1]['faixa2']];
                    }
                }
                
                break;
            case 2:
                if($dadosBen[$i]['idade'] < 18) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[1]['nome'], 'preco' => $price[2]['faixa3']];
                } elseif($dadosBen[$i]['idade'] > 40) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[1]['nome'], 'preco' => $price[2]['faixa3']];
                } elseif($dadosBen[$i]['idade'] > 17 || $dadosBen[$i]['idade'] <= 40) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[1]['nome'], 'preco' => $price[2]['faixa2']];
                }
                break;
            case 3:
                if($dadosBen[$i]['idade'] < 18) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[2]['nome'], 'preco' => $price[3]['faixa1']];
                } elseif($dadosBen[$i]['idade'] > 40) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[2]['nome'], 'preco' => $price[3]['faixa3']];
                } elseif($dadosBen[$i]['idade'] > 17 || $dadosBen[$i]['idade'] <= 40) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[2]['nome'], 'preco' => $price[3]['faixa2']];
                }
                break;
            case 4:
                if($dadosBen[$i]['idade'] < 18) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[3]['nome'], 'preco' => $price[4]['faixa1']];
                } elseif($dadosBen[$i]['idade'] > 40) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[3]['nome'], 'preco' => $price[4]['faixa3']];
                } elseif($dadosBen[$i]['idade'] > 17 || $dadosBen[$i]['idade'] <= 40) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[3]['nome'], 'preco' => $price[4]['faixa2']];
                }
                break;
            case 5:
                if($dadosBen[$i]['idade'] < 18) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[4]['nome'], 'preco' => $price[5]['faixa1']];
                } elseif($dadosBen[$i]['idade'] > 40) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[4]['nome'], 'preco' => $price[5]['faixa3']];
                } elseif($dadosBen[$i]['idade'] > 17 || $dadosBen[$i]['idade'] <= 40) {
                    $subTotal[$i]['subtotal'] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[4]['nome'], 'preco' => $price[5]['faixa2']];
                }
                break;
            case 6:
                if($numBen <= $price[6]['minimo_vidas'] && $numBen < $price[7]['minimo_vidas']) {
                    if($dadosBen[$i]['idade'] < 18) {
                        $subTotal[$i][] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[5]['nome'], 'preco' => $price[6]['faixa1']];
                    } elseif($dadosBen[$i]['idade'] > 40) {
                        $subTotal[$i][] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[5]['nome'], 'preco' => $price[6]['faixa3']];
                    } elseif($dadosBen[$i]['idade'] > 17 || $dadosBen[$i]['idade'] <= 40) {
                        $subTotal[$i][] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[5]['nome'], 'preco' => $price[6]['faixa2']];
                    }
                }elseif($numBen >= $price[7]['minimo_vidas']) {
                    if($dadosBen[$i]['idade'] < 18) {
                        $subTotal[$i][] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[5]['nome'], 'preco' => $price[7]['faixa1']];
                    } elseif($dadosBen[$i]['idade'] > 40) {
                        $subTotal[$i][] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[5]['nome'], 'preco' => $price[7]['faixa3']];
                    } elseif($dadosBen[$i]['idade'] > 17 || $dadosBen[$i]['idade'] <= 40) {
                        $subTotal[$i][] = ['nome' => $dadosBen[$i]['nome'], 'idade' => $dadosBen[$i]['idade'], 'nomePlano' => $plans[5]['nome'], 'preco' => $price[7]['faixa2']];
                    }
                }
                
            default:
                
                $_SESSION['erro'] = "Este plano não é válido!";
            break;
        }
            
      
    }
    
    for ($i=0; $i < count($subTotal) ; $i++) { 
        $valorTotal += $subTotal[$i]['subtotal']['preco'];
    }

   $proposta = [
       'subtotal' => $subTotal,
       'total' => $valorTotal
   ];
    
  
    


    $beneficiariosJson = '../database/beneficiarios.json';
    $beneficiarios = json_encode($proposta);
    file_put_contents($beneficiariosJson, $beneficiarios);
    
    $_SESSION['beneficiarios'] = file_get_contents($beneficiariosJson);
    

    header("Location: {$url}");
}
   

