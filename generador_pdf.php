<?php 

require ('fpdf/fpdf.php');
include ("conexion.php");

$query = "SELECT    inv.id_producto,
                    inv.producto,
                    inv.descripcion,
                    inv.cantidad,
                    inv.precio_unitario,
                    inv.fecha_ingreso,
                    inv.estado,
                    cat.nombre_categoria AS categoria,
                    prov.nombre_proveedor AS proveedor
            FROM inventario AS inv
            LEFT JOIN categorias AS cat ON(inv.id_categoria=cat.id_categoria)
            LEFT JOIN proveedores AS prov ON (inv.id_proveedor=prov.id_proveedor)";         
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
$pdf->Cell(20,10,'Id_Producto',1);
$pdf->Cell(40,10,'Producto',1);
$pdf->Cell(52,10,'Descripcion',1);
$pdf->Cell(30,10,'Cantidad',1);
$pdf->Cell(30,10,'Precio Unitario',1);
$pdf->Cell(30,10,'Fecha Ingreso',1);
$pdf->Cell(15,10,'Estado',1);
$pdf->Cell(20,10,'Categoria',1);
$pdf->Cell(40,10,'Proveedor',1);
$pdf->Ln();

//tbody
$pdf->SetFont('Arial','',8);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $pdf->Cell(20,10,$row['id_producto'],1);
        $pdf->Cell(40,10,$row['producto'],1);
        $pdf->Cell(52,10,$row['descripcion'],1);
        $pdf->Cell(30,10,$row['cantidad'],1);
        $pdf->Cell(30,10,$row['precio_unitario'],1);
        $pdf->Cell(30,10,$row['fecha_ingreso'],1);
        $pdf->Cell(15,10,$row['estado'],1);
        $pdf->Cell(20,10,$row['categoria'],1);
        $pdf->Cell(40,10,$row['proveedor'],1);
        $pdf->Ln();
    }
}else{
    $pdf->Cell(0,10,'No se encontraron registros',1,1,'C');
}

//Salida Archivo PDF, 'D'=Down load, 'I'= en el navegador es decir InLLine
$pdf->Output('I','reporte.pdf');

?>