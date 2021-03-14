<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../build/tailwind.css">
    <script src="../js/validacion.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</head>

<body>
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
    <div class="flex flex-col items-center">
        <table class="table-auto m-5">
            <thead>
                <tr>
                    <th class="px-4 py-2">Codigo</th>
                    <th class="px-4 py-2">Usuario</th>
                    <th class="px-4 py-2">Contraseña</th>
                </tr>
            </thead>
            <?php
            include("manejoBase.php");
            $sql = "select * from usuarios";
            $result = db_query($sql);
            while ($row = mysqli_fetch_object($result)) {
            ?>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $row->id ?></td>
                        <td class="border px-4 py-2"><?php echo $row->username ?></td>
                        <td class="border px-4 py-2">*****************</td>
                    </tr>
                </tbody>

            <?php
            }
            ?>
        </table>
    </div>
    <br>
    <div class="flex flex-col items-center">
        <button onclick="window.location.assign('addUser.php')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            Añadir Usuario
        </button>
    </div>
</body>

</html>