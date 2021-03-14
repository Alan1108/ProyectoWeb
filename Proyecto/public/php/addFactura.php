<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Factura</title>
    <link rel="stylesheet" href="../css/factura.css">
    <link rel="stylesheet" href="../build/tailwind.css">
    <script src="../js/funciones.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body onload="esconderFactura()">
    <nav class="flex items-center bg-gray-800 p-3 flex-wrap">
        <a href="#" class="p-2 mr-4 inline-flex items-center">
            <span class="text-xl text-white font-bold uppercase tracking-wide">Facturacion Web</span>
        </a>
        <button class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler" data-target="#navigation">
            <i class="material-icons">menu</i>
        </button>
        <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
            <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">

                <a href="../html/menu.html" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                    <span>Regresar</span>
                </a>
            </div>
        </div>
    </nav>
    <div class="p-5">
        <h1 class="block text-gray-700 text-xl font-bold mb-2 text-center">
            Seleccione el codigo del cliente
        </h1>
    </div>
    <div class="flex flex-col items-center">
        <div class="inline-block relative w-50">

            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="codigo" id="codigo">
                <option value="">Seleccionar Usuario</option>
                <?php
                include("manejoBase.php");
                $sql = "select * from clientes";
                $result = db_query($sql);
                while ($row = mysqli_fetch_object($result)) {
                ?>
                    <option value="<?php echo $row->idclientes; ?>"><?php echo "$row->idclientes  $row->nombre"; ?></option>
                <?php
                }
                ?>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>

    </div>
    <br>
    <div class="flex flex-col items-center">
        <div class="flex items-center justify-between">
            <button onclick="seleccionarUser()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Seleccionar Usuario
            </button>
        </div>
    </div>
    <div class="flex flex-col items-center">
        <table class="table-auto m-5">
            <thead>
                <tr>
                    <th class="px-4 py-2">Codigo Cliente</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Cedula</th>
                    <th class="px-4 py-2">Direccion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2" id="cliente"></td>
                    <td class="border px-4 py-2" id="nombre"></td>
                    <td class="border px-4 py-2" id="cedula"></td>
                    <td class="border px-4 py-2" id="direccion"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="p-5">
        <h1 class="block text-gray-700 text-xl font-bold mb-2 text-center">
            Seleccione los Productos a Vender
        </h1>
    </div>
    <div class="flex flex-col items-center">
        <table class="table-auto m-5">
            <thead>
                <tr>
                    <td class="px-4 py-2">Codigo</td>
                    <td class="px-4 py-2">Descripcion</td>
                    <td class="px-4 py-2">Stock</td>
                    <td class="px-4 py-2">Cantidad</td>
                    <td class="px-4 py-2">Precio</td>
                    <td class="px-4 py-2">Total</td>
                </tr>
            </thead>
            <tbody>
                <tr id="producto">
                    <td class="border px-4 py-2" id="cod"><input type="text" id="cod1" onkeyup="buscarProducto()"></td>
                    <td class="border px-4 py-2" id="descripcion">-</td>
                    <td class="border px-4 py-2" id="stock">-</td>
                    <td class="border px-4 py-2" id="cantidad"><input type="text" id="quantity" onkeyup="establecerTotal()"></td>
                    <td class="border px-4 py-2" id="precio">0.00</td>
                    <td class="border px-4 py-2" id="total">0.00</td>
                </tr>
            </tbody>
        </table>
        <div class="flex items-center justify-between">
            <button onclick="factura()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Añadir a Factura
            </button>
        </div>
    </div>
    <div class="p-5">
        <h1 class="block text-gray-700 text-2xl font-bold mb-2 text-center">
            Factura
        </h1>
    </div>
    <div class="flex flex-col items-center">
        <table class="table-auto m-5">
            <thead>
                <tr>
                    <td class="px-4 py-2">Descripcion</td>
                    <td class="px-4 py-2">Cantidad</td>
                    <td class="px-4 py-2">Precio</td>
                    <td class="px-4 py-2">Total</td>
                </tr>
            </thead>
            <tbody id="productos">
            </tbody>
        </table>
        <div class="flex items-center justify-between">
            <button onclick="generarFactura()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Generar Factura
            </button>
        </div>
    </div>
    <div id="factura">
        <table id="factura_head">
            <tr>
                <td class="logo_factura">
                    <div>
                        <img src="../img/dideb.jpg">
                    </div>
                </td>
                <td class="info_empresa">
                    <div>
                        <span class="h2">DISTRIBUIDORA DENTAL BERMUDEZ</span>
                        <p>RUC: 0914966437-001</p>
                        <p>S47A y E2 El Beaterio</p>
                        <p>Teléfono: 0993574650</p>
                        <p>Email: bermudez_alan@hotmail.com</p>
                    </div>
                </td>
                <td class="info_factura">
                    <div class="round">
                        <span class="h3">Factura</span>
                        <p>No. Factura: <strong><?php echo $factura['nofactura']; ?></strong></p>
                        <p>Fecha: <?php echo $factura['fecha']; ?></p>
                        <p>Hora: <?php echo $factura['hora']; ?></p>
                    </div>
                </td>
            </tr>
        </table>
        <table id="factura_cliente">
            <tr>
                <td class="info_cliente">
                    <div class="round">
                        <span class="h3">Cliente</span>
                        <table class="datos_cliente">
                            <tr>
                                <td><label>Cedula:</label>
                                    <p id="ced"></p>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Nombre:</label>
                                    <p id="nom"></p>
                                </td>
                                <td><label>Dirección:</label>
                                    <p id="dir"></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>

            </tr>
        </table>

        <table id="factura_detalle">
            <thead>
                <tr>
                    <th width="50px">Cant.</th>
                    <th class="textleft">Descripción</th>
                    <th class="textright" width="150px">Precio</th>
                    <th class="textright" width="150px">Total</th>
                </tr>
            </thead>


            <?php
            $precio_total = $row['precio_total'];
            $subtotal = round($subtotal + $precio_total, 2);

            $impuesto     = round($subtotal * ($iva / 100), 2);
            $tl_sniva     = round($subtotal - $impuesto, 2);
            $total         = round($tl_sniva + $impuesto, 2);
            ?>
            <tfoot id="detalle_totales">
                <tr>
                    <td colspan="3" class="textright"><span>SUBTOTAL</span></td>
                    <td class="textright" id="subtotal"><span></span></td>
                </tr>
                <tr>
                    <td colspan="3" class="textright"><span>IVA (12 %)</span></td>
                    <td class="textright" id="iva"><span></span></td>
                </tr>
                <tr>
                    <td colspan="3" class="textright"><span>TOTAL</span></td>
                    <td class="textright" id="sumaTotal"><span></span></td>
                </tr>
            </tfoot>
        </table>
        <div>
            <p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
            <h4 class="label_gracias">¡Gracias por su compra!</h4>
        </div>

    </div>

</body>

</html>