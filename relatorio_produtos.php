<?php
require_once __DIR__ . '/vendor/autoload.php';

$produtos = [
    [
        'nome' => 'Caderno Universitário',
        'categoria' => 'Papelaria',
        'preco' => 19.90,
        'descricao' => 'Caderno universitário com 200 folhas pautadas.'
    ],
    [
        'nome' => 'Caneta Azul',
        'categoria' => 'Papelaria',
        'preco' => 2.50,
        'descricao' => 'Caneta esferográfica azul de ponta fina.'
    ],
    [
        'nome' => 'Garrafa Térmica',
        'categoria' => 'Utilidades Domésticas',
        'preco' => 45.00,
        'descricao' => 'Garrafa térmica de aço inoxidável com capacidade de 1L.'
    ],
    [
        'nome' => 'Fone de Ouvido',
        'categoria' => 'Eletrônicos',
        'preco' => 79.90,
        'descricao' => 'Fone de ouvido estéreo com cancelamento de ruído.'
    ]
];

$mpdf = new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            font-size: 24px;
        }
        .data {
            text-align: right;
            font-size: 12px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
            padding: 10px;
        }
        td {
            padding: 10px;
        }
        .logo {
            width: 100px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <img class="logo" src="logo.png" alt="Logo da Empresa"> <!-- Substitua logo.png com o caminho do seu logo -->
    
    <h1>Relatório de Produtos</h1>
    <p class="data">Gerado em: ' . date("d/m/Y H:i:s") . '</p>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($produtos as $produto) {
            $html .= '
            <tr>
                <td>' . $produto['nome'] . '</td>
                <td>' . $produto['categoria'] . '</td>
                <td>R$ ' . number_format($produto['preco'], 2, ',', '.') . '</td>
                <td>' . $produto['descricao'] . '</td>
            </tr>';
        }

$html .= '
        </tbody>
    </table>

</body>
</html>';

$mpdf->WriteHTML($html);

$mpdf->Output('relatorio_produtos.pdf', 'I'); 

?>
