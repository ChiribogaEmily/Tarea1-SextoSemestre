<?php
session_start();

if (!isset($_SESSION['resultado'])) {
  $_SESSION['resultado'] = "";
}

if (isset($_POST['accion'])) {
  $accion = $_POST['accion'];
  switch ($accion) {
    case "limpiar":
      $_SESSION['resultado'] = "";
      break;
    case "igualar":
      if (isset($_SESSION['resultado'])) {
        try {

          $_SESSION['resultado'] = eval("return " . $_SESSION['resultado'] . ";");
        } catch (DivisionByZeroError $e) {
          $_SESSION['resultado'] = "Error no se puede dividir por 0";
        } catch (ParseError $e) {
          $_SESSION['resultado'] = "Error en la expresión";
        } catch (Throwable $e) {
          $_SESSION['resultado'] = "Error en la operación";
        }
      }
      break;
    default:
      $_SESSION['resultado'] = $_SESSION['resultado'] . $accion;
      break;
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/estilos.css" />
  <link rel="stylesheet" href="../css/calculadora.css" />

  <title>Tarea 1 - Emily Chiriboga</title>
</head>

<body>
  <div>
    <header>
      <nav>
        <ul>
          <li><a href="/Tarea1_Emily_Chiriboga/index.html">Inicio</a></li>
          <li><a href="/Tarea1_Emily_Chiriboga/habilidades.html">Habilidades</a></li>
          <li><a href="/Tarea1_Emily_Chiriboga/php/calculadora.php">Calculadora</a></li>
      </nav>
    </header>
    <div>
      <form method="post">
        <table>
          <tr>
            <td colspan="4">
              <input type="text" value="<?php echo $_SESSION["resultado"]; ?>" readonly>
            </td>
          </tr>

          <tr>
            <td><button class="tecla" name="accion" value="7">7</button></td>
            <td><button class="tecla" name="accion" value="8">8</button></td>
            <td><button class="tecla" name="accion" value="9">9</button></td>
            <td><button class="tecla" name="accion" value="/">/</button></td>
          </tr>

          <tr>
            <td><button class="tecla" name="accion" value="4">4</button></td>
            <td><button class="tecla" name="accion" value="5">5</button></td>
            <td><button class="tecla" name="accion" value="6">6</button></td>
            <td><button class="tecla" name="accion" value="*">×</button></td>
          </tr>

          <tr>
            <td><button class="tecla" name="accion" value="1">1</button></td>
            <td><button class="tecla" name="accion" value="2">2</button></td>
            <td><button class="tecla" name="accion" value="3">3</button></td>
            <td><button class="tecla" name="accion" value="-">−</button></td>
          </tr>

          <tr>
            <td><button class="tecla" name="accion" value="igualar"> = </button></td>
            <td><button class="tecla" name="accion" value="0">0</button></td>

            <td><button class="tecla" name="accion" value="+">+</button></td>
          </tr>
          <tr>

            <td><button class="tecla" name="accion" value="limpiar">Limpiar</button></td>
          </tr>
        </table>
      </form>
    </div>
    <footer>
      <p>Desarrollado por Emily Chiriboga</p>
    </footer>
  </div>
</body>

</html>