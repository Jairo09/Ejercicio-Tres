<!DOCTYPE html>
<html>
<head>
    <title>Parte 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Parte 3:</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="inputText">Ingrese el texto:</label>
                <textarea class="form-control" id="inputText" name="input_text" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="process">Generar Respuesta</button>
        </form>

        <?php
        if (isset($_POST['process'])) {
            // Obtener el texto ingresado en el textarea
            $input_text = $_POST['input_text'];

            // Contar el número de veces que aparece cada carácter en 'abcdefghijklmnopqrstuvwxyz_'
            $character_count = array();
            $search_characters = 'abcdefghijklmnopqrstuvwxyz_';
            for ($i = 0; $i < strlen($search_characters); $i++) {
                $char = $search_characters[$i];
                $count = substr_count($input_text, $char);
                $character_count[$char] = $count;
            }

            // Ordenar el arreglo en orden descendente
            arsort($character_count);
            
            // Crear una cadena usando las keys del array ya ordenado desendendentemente
            $sorted_characters = implode('', array_keys($character_count));

            // Encontrar la posición del guión bajo
            $underscore_position = strpos($sorted_characters, '_');

            // Obtener la subcadena antes del guión bajo
            $answer = substr($sorted_characters, 0, $underscore_position);

            // Mostrar la respuesta en el h1
            echo '<h1>' . $answer . '</h1>';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
