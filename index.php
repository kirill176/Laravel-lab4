<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обчислення числа та перевірка трикутника</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Математичні обчислення</h1>

        <!-- Форма для увеличения числа -->
        <div class="form-container">
            <h2>Збільшити число</h2>
            <form method="POST" action="index.php#result-number">
                <label for="number">Введіть число:</label>
                <input type="number" name="number" id="number" required>
                <button type="submit">Збільшити</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['number'])) {
                // Получаем число и увеличиваем его на 30% и 120%
                $number = $_POST['number'];
                $increase_30 = $number * 1.30;
                $increase_120 = $number * 2.20;

                echo "<div id='result-number' class='result'>";
                echo "<h3>Результати збільшення числа:</h3>";
                echo "<p>Число, збільшене на 30%: $increase_30</p>";
                echo "<p>Число, збільшене на 120%: $increase_120</p>";
                echo "</div>";
            }
            ?>
        </div>

        <!-- Форма для проверки треугольника -->
        <div class="form-container">
            <h2>Перевірка трикутника</h2>
            <form method="POST" action="index.php#result-triangle">
                <label for="x1">x1:</label>
                <input type="number" name="x1" id="x1" required><br>
                <label for="y1">y1:</label>
                <input type="number" name="y1" id="y1" required><br>

                <label for="x2">x2:</label>
                <input type="number" name="x2" id="x2" required><br>
                <label for="y2">y2:</label>
                <input type="number" name="y2" id="y2" required><br>

                <label for="x3">x3:</label>
                <input type="number" name="x3" id="x3" required><br>
                <label for="y3">y3:</label>
                <input type="number" name="y3" id="y3" required><br>

                <button type="submit">Перевірити трикутник</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['x1'], $_POST['y1'], $_POST['x2'], $_POST['y2'], $_POST['x3'], $_POST['y3'])) {
                // Получаем координаты вершин треугольника
                $x1 = $_POST['x1'];
                $y1 = $_POST['y1'];
                $x2 = $_POST['x2'];
                $y2 = $_POST['y2'];
                $x3 = $_POST['x3'];
                $y3 = $_POST['y3'];

                // Функция для проверки, принадлежит ли точка (0, 0) треугольнику
                function triangle_contains_origin($x1, $y1, $x2, $y2, $x3, $y3) {
                    function area($x1, $y1, $x2, $y2, $x3, $y3) {
                        return abs(($x1 * ($y2 - $y3) + $x2 * ($y3 - $y1) + $x3 * ($y1 - $y2)) / 2.0);
                    }
                    $area_total = area($x1, $y1, $x2, $y2, $x3, $y3);
                    $area1 = area(0, 0, $x2, $y2, $x3, $y3);
                    $area2 = area($x1, $y1, 0, 0, $x3, $y3);
                    $area3 = area($x1, $y1, $x2, $y2, 0, 0);
                    return ($area_total == $area1 + $area2 + $area3);
                }

                // Вывод результата
                echo "<div id='result-triangle' class='result'>";
                if (triangle_contains_origin($x1, $y1, $x2, $y2, $x3, $y3)) {
                    echo "<p>Початок координат належить трикутнику.</p>";
                } else {
                    echo "<p>Початок координат не належить трикутнику.</p>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>