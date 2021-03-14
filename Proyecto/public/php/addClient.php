<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Cliente</title>
    <link rel="stylesheet" href="../build/tailwind.css">
    <script src="../js/validacion.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
    <div class="flex flex-col items-center ">
        <div class="w-full max-w-xs m-5">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="formulario" name="formulario">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                        Nombre
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" name="nombre" type="text" placeholder="Nombre">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="cedula">
                        Cedula
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cedula" name="cedula" type="number" placeholder="Cedula" maxlength="10">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
                        Direccion
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="direccion" name="direccion" type="text" placeholder="Direccion">
                </div>
                <p id="warning" class=""></p>
                <div class="flex items-center justify-between">
                    <button onclick="addClient()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Añadir Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>