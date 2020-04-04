<?php 
// Conexion mysql
include'../conexion/conexionli.php';
// $nhcP=$_POST['nhc'];

$cadena = "SELECT
                id_ecivil,
                activo,
                descripcion
            FROM
                ecivil ORDER BY id_ecivil DESC";
$consultar = mysqli_query($conexionLi, $cadena);
// $row = mysqli_fetch_array($consultar);
?>

<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr class="hTabla">
                <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Imprimir</th>
                <th scope="col">Datos</th>
                <th scope="col">Estado Civil</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Recorro el arreglo y le asigno variables a cada valor del item
            $n=1;
            while( $row = mysqli_fetch_array($consultar) ) {

                $id          = $row[0];

                if ($row[1] == 1) {
                    $chkChecado    = "checked";
                    $dtnDesabilita = "";
                    $chkValor      = "1";
                }else{
                    $chkChecado    = "";
                    $dtnDesabilita = "disabled";
                    $chkValor      = "0";
                }

                $descripcion     = $row[2];

                ?>
                <tr class="centrar">
                    <th scope="row" class="textoBase">
                        <?php echo $n?>
                    </th>
                    <td>
                        <button <?php echo $dtnDesabilita?> type="button" class="editar btn btn-outline-success fa-1x activo" id="btnEditar<?php echo $n?>" onclick="llenar_formulario('<?php echo $id?>','<?php echo $descripcion?>')">
                                    <i class="far fa-edit fa-lg"></i>
                        </button>
                    <td>
                        <button <?php echo $dtnDesabilita?> type="button" class="imprimir btn btn-outline-warning fa-1x activo" id="btnImprimir<?php echo $n?>" onclick="abrirModalPDF('<?php echo $id?>')">
                                    <i class="fas fa-print fa-lg"></i>
                        </button>
                    </td>
                    <td>
                        <button <?php echo $dtnDesabilita?> type="button" class="ventana btn btn-outline-info fa-1x activo"  id="btnModal<?php echo $n?>" onclick="abrirModalDatos('<?php echo $id?>','<?php echo $descripcion?>')">
                            <i class="far fa-window-maximize fa-lg"></i>
                        </button>
                    </td>
                    <td>
                        <label class="textoBase">
                            <?php echo $descripcion?>
                        </label>
                    </td>
                    <td>
                        <input value="<?php echo $chkValor?>" onchange="cambiar_estatus(<?php echo $id?>,<?php echo $n?>)" class="toggle-two" type="checkbox" <?php echo $chkChecado?> data-toggle="toggle" data-onstyle="outline-success" data-width="101" data-offstyle="outline-danger" data-on="<i class='fa fa-check'></i> Si" data-off="<i class='fa fa-times'></i> No" id="check<?php echo $n?>">
                    </td>
                </tr>
            <?php
            $n++;
            }
        ?>
        </tbody>
        <tfoot>
            <tr class="hTabla">
                <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Imprimir</th>
                <th scope="col">Datos</th>
                <th scope="col">Estado Civil</th>
                <th scope="col">Status</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php 
// En caso de error imprime
print_r(mysqli_error($conexionLi));
// Cierro la conexionLi
mysqli_close($conexionLi);
?>

<script type="text/javascript">
  $(document).ready(function() {
        $('#example2').DataTable( {
            "language": {
                    // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    "url": "../plugins/dataTablesB4/langauge/Spanish.json"
                },
            "order": [[ 0, "asc" ]],
            "paging":   true,
            "ordering": true,
            "info":     true,
            "responsive": true,
            "searching": true,
            stateSave: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
            ],
            columnDefs: [ {
                // targets: 0,
                // visible: false
            }],
            buttons: [
                      {
                          text: "<i class='fas fa-plus fa-lg' aria-hidden='true'></i> &nbsp;Nuevo Registro",
                          className: 'btn btn-outline-primary',
                          id: 'btnNuevo',
                          action : function(){
                            nuevo_registro2();
                          }
                      },
                      {
                          extend: 'excel',
                          text: "<i class='far fa-file-excel fa-lg' aria-hidden='true'></i> &nbsp;Exportar a Excel",
                          className: 'btn btn-outline-secondary',
                          title:'Lista_datos',
                          id: 'btnExportar',
                          exportOptions: {
                              columns: ':visible'
                          }
                      }

            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
    //inputs();
</script>