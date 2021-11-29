<!DOCTYPE html>
<html>

<head>
    <title>Pesquisa interativa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Pesquisa interativa</h1>
    Filtrar por: <input type="search" id="pesquisa" oninput="limpar()" onkeyup="filtrar()">
    <!-- <button type="button" onclick="filtrar()">Filtrar</button> -->
    <ul class="lista">
        <li>Ana</li>
        <li>Mariana</li>
        <li>Banana</li>
        <li>Celular</li>
        <li>Smartphone</li>
        <li>Dumbphone</li>
        <li>Tablet</li>
        <li>Phablet</li>
        <li>Laptop</li>
        <li>Top-down</li>
    </ul>
    <ul class="lista">
        <li>Ana</li>
        <li>Mariana</li>
        <li>Banana</li>
        <li>Celular</li>
        <li>Smartphone</li>
        <li>Dumbphone</li>
        <li>Tablet</li>
        <li>Phablet</li>
        <li>Laptop</li>
        <li>Top-down</li>
    </ul>
    <ul class="lista">
        <li>Ana</li>
        <li>Mariana</li>
        <li>Banana</li>
        <li>Celular</li>
        <li>Smartphone</li>
        <li>Dumbphone</li>
        <li>Tablet</li>
        <li>Phablet</li>
        <li>Laptop</li>
        <li>Top-down</li>
    </ul>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        function limpar() {
            $('.lista li').show();
        }

        function filtrar() {
            var termo = $('#pesquisa').val().toUpperCase();
            $('.lista li').each(function() {
                if ($(this).html().toUpperCase().indexOf(termo) === -1) {
                    $(this).hide();
                }
            });
        }
    </script>
</body>

</html>