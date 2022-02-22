<?php
  // Declaramos la libreria
  require_once "../vendor/autoload.php";
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  include_once '../includes/funciones/db_conexion.php';

  $fecha_desde = $_POST['fecha_desde'];
  $fecha_hasta = $_POST['fecha_hasta'];

  if(isset($_POST['registro']) == 'export') {

    $documento = new Spreadsheet();
    $documento
    ->getProperties()
    ->setCreator("Esteban Robert")
    ->setLastModifiedBy('')
    ->setTitle('DPQ Agenda')
    ->setDescription('Reservas Finalizadas');

    $hojaReserva = $documento->getActiveSheet();
    $hojaReserva->setTitle("Reservas");

    # Encabezado de los productos
    $encabezado = ["Cliente", "Modelo", "Categoria", "Fecha de Inicio", "Fecha de Fin", "Total"];

    # El último argumento es por defecto A1
    $hojaReserva->fromArray($encabezado, null, 'A1');

    # Consulta
    try {
      $sql = " SELECT reserva.*, nombre, identificacion, modelo, nombre_cat FROM reserva";
      $sql .= " INNER JOIN cliente ";
      $sql .= " ON reserva.cliente = cliente.id_cliente ";
      $sql .= " INNER JOIN vehiculo ";
      $sql .= " ON reserva.vehiculo = vehiculo.id_vehiculo ";
      $sql .= " INNER JOIN categoria ";
      $sql .= " ON reserva.categoria = categoria.id_categoria ";
      $sql .= " AND reserva.estado_reserva = 2 ";
      $resultado = $conn->query($sql);
    } catch(Exception $e) {
      $error = $e->getMessage();
      echo $error;
    }

    # Comenzamos en la fila 2
    $numeroDeFila = 2;

    while ($reserva = $resultado->fetch_object()) {
      # Obtener registros de MySQL
      $cliente = $reserva->cliente;
      $modelo = $reserva->modelo;
      $categoria = $reserva->nombre_cat;
      $fecha_ini = $reserva->fecha_ini;
      $fecha_fin = $reserva->fecha_fin;
      $total = $reserva->total;
      $editado = $reserva->editado;
      $fecha_cierre = date("Y-m-d", strtotime($editado));

      if($fecha_desde <= $fecha_cierre and $fecha_cierre <= $fecha_hasta) {
        # Escribir registros en el documento
        $hojaReserva->setCellValueByColumnAndRow(1, $numeroDeFila, $cliente);
        $hojaReserva->setCellValueByColumnAndRow(2, $numeroDeFila, $modelo);
        $hojaReserva->setCellValueByColumnAndRow(3, $numeroDeFila, $categoria);
        $hojaReserva->setCellValueByColumnAndRow(4, $numeroDeFila, $fecha_ini);
        $hojaReserva->setCellValueByColumnAndRow(5, $numeroDeFila, $fecha_fin);
        $hojaReserva->setCellValueByColumnAndRow(6, $numeroDeFila, $total);
        $numeroDeFila++;
      }
    }

    $fileName="Reservas.xlsx";

    # Crear un "escritor"
    $writer = new Xlsx($documento);

    # Le pasamos la ruta de guardado
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.urlencode($fileName).'"');
    $writer->save('php://output');

  }
?>