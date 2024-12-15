<?php 

require ('fpdf/fpdf.php');
include ("conexion.php");

$query = "SELECT    id_proveedor,
                    nombre_proveedor,
                    telefono_proveedor,
                    direccion_proveedor
            FROM proveedores";         
$result = $conn->query($query);

//Instancia para fpdf
$pdf = new FPDF();
//Horizontal = L, sin especicicar() = Vertical
//190 VERTICAL, 210 HORIZONTAL
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',14);

//Titulo, ancho , 'alto titulo,
$pdf->Cell(0,10,'Productos de Inventario',1,1,'C');
$pdf->Ln(5);

//Encabezado
$pdf->SetFont('Arial','B',8);
//Ancho y Alto, borde = 1
$pdf->Cell(20,10,'Id_Proveedor',1);
$pdf->Cell(40,10,'Nombre Proveedor',1);
$pdf->Cell(52,10,'Telefono',1);
$pdf->Cell(30,10,'Direccion',1);
$pdf->Ln();

//tbody
$pdf->SetFont('Arial','',8);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $pdf->Cell(20,10,$row['id_proveedor'],1);
        $pdf->Cell(40,10,$row['nombre_proveedor'],1);
        $pdf->Cell(52,10,$row['telefono_proveedor'],1);
        $pdf->Cell(30,10,$row['direccion_proveedor'],1);
        $pdf->Ln();
    }
}else{
    $pdf->Cell(0,10,'No se encontraron registros',1,1,'C');
}

//Salida Archivo PDF, 'D'=Down load, 'I'= en el navegador es decir InLLine
$pdf->Output('I','reporte.pdf');

?>