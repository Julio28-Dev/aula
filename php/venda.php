<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Tela de Venda - Corinthians</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000; /* Fundo preto */
            color: #FFFFFF; /* Texto branco */
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: left;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
            color: #FFFFFF;
            border-bottom: 2px solid #FFFFFF;
            padding-bottom: 10px;
        }

        .field-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #FFFFFF;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #888;
            border-radius: 5px;
            background-color: #1C1C1C; /* Fundo cinza escuro */
            color: #FFFFFF; /* Texto branco */
        }

        .products {
            margin-bottom: 20px;
        }

        .calculate-btn {
            display: block;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #333333; /* Cinza escuro */
            color: #FFFFFF; /* Texto branco */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .calculate-btn:hover {
            background-color: #555555; /* Cinza mais claro ao passar o mouse */
        }

        .results {
            margin-top: 20px;
            padding: 15px;
            background-color: #1C1C1C; /* Fundo cinza escuro */
            border: 1px solid #888;
            border-radius: 5px;
            color: #FFFFFF; /* Texto branco */
        }

        .php-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #CCCCCC;
            font-size: 16px;
            text-decoration: none;
        }

        .php-link:hover {
            color: #FFFFFF;
        }
    </style>
</head>
<body>

    <h1>Tela de Venda - Corinthians</h1>

    <div class="field-group">
        <label for="clientName">Nome do Cliente:</label>
        <input type="text" id="clientName">
    </div>
    <div class="field-group">
        <label for="clientPhone">Celular:</label>
        <input type="text" id="clientPhone">
    </div>
    <div class="field-group">
        <label for="clientEmail">Email:</label>
        <input type="text" id="clientEmail">
    </div>

    <div class="products">
        <h3>Produtos:</h3>
        
        <div class="field-group">
            <label for="product1">Produto 1:</label>
            <input type="text" id="product1" placeholder="Nome do Produto">
            <input type="number" id="price1" placeholder="Preço">
            <input type="number" id="quantity1" placeholder="Quantidade">
        </div>
        
        <div class="field-group">
            <label for="product2">Produto 2:</label>
            <input type="text" id="product2" placeholder="Nome do Produto">
            <input type="number" id="price2" placeholder="Preço">
            <input type="number" id="quantity2" placeholder="Quantidade">
        </div>
        
        <div class="field-group">
            <label for="product3">Produto 3:</label>
            <input type="text" id="product3" placeholder="Nome do Produto">
            <input type="number" id="price3" placeholder="Preço">
            <input type="number" id="quantity3" placeholder="Quantidade">
        </div>
    </div>

    <div class="field-group">
        <label for="frete">Opção de Frete:</label>
        <select id="frete">
            <option value="15">Expresso - R$15,00</option>
            <option value="10">Normal - R$10,00</option>
            <option value="5">Econômico - R$5,00</option>
        </select>
    </div>

    <button class="calculate-btn" onclick="calculateTotal()">Calcular e Exibir Dados</button>

    <div class="results" id="results"></div>

    <a href="../index.php" class="php-link">Voltar</a>

    <script>
        function calculateTotal() {
            const clientName = document.getElementById("clientName").value;
            const clientPhone = document.getElementById("clientPhone").value;
            const clientEmail = document.getElementById("clientEmail").value;
            
            let total = 0;
            const products = [];
            
            for (let i = 1; i <= 3; i++) {
                const productName = document.getElementById("product" + i).value;
                const price = parseFloat(document.getElementById("price" + i).value) || 0;
                const quantity = parseInt(document.getElementById("quantity" + i).value) || 0;
                
                if (productName && price && quantity) {
                    const subtotal = price * quantity;
                    total += subtotal;
                    products.push(`${productName} - Preço: R$${price}, Quantidade: ${quantity}, Subtotal: R$${subtotal}`);
                }
            }

            const frete = parseFloat(document.getElementById("frete").value);
            total += frete;

            document.getElementById("results").innerHTML = `
                <h2>Resumo da Compra</h2>
                <p><strong>Cliente:</strong> ${clientName}</p>
                <p><strong>Celular:</strong> ${clientPhone}</p>
                <p><strong>Email:</strong> ${clientEmail}</p>
                <h3>Produtos:</h3>
                <ul>${products.map(prod => `<li>${prod}</li>`).join('')}</ul>
                <p><strong>Frete:</strong> R$${frete}</p>
                <p><strong>Total da Compra:</strong> R$${total}</p>
            `;
        }
    </script>

</body>
</html>
