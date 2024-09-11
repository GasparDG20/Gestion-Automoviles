<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Automóviles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 20px;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-400 to-purple-500">
    <main class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto" x-data="{ activeTab: 'registrar' }">
            <h1 class="text-4xl font-bold text-center text-white mb-8 shadow-text">Gestión de Automóviles</h1>
            
            <!-- Tabs -->
            <div class="mb-4 border-b border-gray-200 bg-white bg-opacity-20 rounded-t-lg">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a class="inline-block p-4 rounded-t-lg transition duration-300 ease-in-out" :class="{ 'text-white bg-indigo-600': activeTab === 'registrar', 'text-gray-200 hover:text-white hover:bg-indigo-500': activeTab !== 'registrar' }" @click.prevent="activeTab = 'registrar'" href="#">Registrar</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 rounded-t-lg transition duration-300 ease-in-out" :class="{ 'text-white bg-indigo-600': activeTab === 'buscar', 'text-gray-200 hover:text-white hover:bg-indigo-500': activeTab !== 'buscar' }" @click.prevent="activeTab = 'buscar'" href="#">Buscar</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 rounded-t-lg transition duration-300 ease-in-out" :class="{ 'text-white bg-indigo-600': activeTab === 'actualizar', 'text-gray-200 hover:text-white hover:bg-indigo-500': activeTab !== 'actualizar' }" @click.prevent="activeTab = 'actualizar'" href="#">Actualizar</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 rounded-t-lg transition duration-300 ease-in-out" :class="{ 'text-white bg-indigo-600': activeTab === 'eliminar', 'text-gray-200 hover:text-white hover:bg-indigo-500': activeTab !== 'eliminar' }" @click.prevent="activeTab = 'eliminar'" href="#">Eliminar</a>
                    </li>
                </ul>
            </div>

            <!-- Tab Contents -->
            <div class="bg-white bg-opacity-90 p-8 rounded-b-lg shadow-xl">
                  <!-- Registrar -->
                  <div x-show="activeTab === 'registrar'">
                    <h2 class="text-2xl font-semibold mb-6 text-center text-indigo-800">Registrar Automóvil</h2>
                    <form action="procesar_registro.php" method="post" class="space-y-4">
                        <input type="hidden" name="action" value="registrar">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="marca" class="block text-sm font-medium text-gray-700">Marca:</label>
                                <input type="text" id="marca" name="marca" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo:</label>
                                <input type="text" id="modelo" name="modelo" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="anio" class="block text-sm font-medium text-gray-700">Año:</label>
                                <input type="number" id="anio" name="anio" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="color" class="block text-sm font-medium text-gray-700">Color:</label>
                                <input type="text" id="color" name="color" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="placa" class="block text-sm font-medium text-gray-700">Placa:</label>
                                <input type="text" id="placa" name="placa" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="motor" class="block text-sm font-medium text-gray-700">Motor:</label>
                                <input type="text" id="motor" name="motor" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="chasis" class="block text-sm font-medium text-gray-700">Chasis:</label>
                                <input type="text" id="chasis" name="chasis" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de vehículo:</label>
                                <input type="text" id="tipo" name="tipo" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="Registrar" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                        </div>
                    </form>
                </div>

                <!-- Buscar -->
                <div x-show="activeTab === 'buscar'">
                    <h2 class="text-2xl font-semibold mb-6 text-center text-indigo-800">Buscar Automóvil</h2>
                    <form action="procesar_registro.php" method="post" class="space-y-4">
                        <input type="hidden" name="action" value="buscar">
                        <div>
                            <label for="criterio" class="block text-sm font-medium text-gray-700">Criterio de búsqueda:</label>
                            <input type="text" id="criterio" name="criterio" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <input type="submit" value="Buscar" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-300 ease-in-out">
                        </div>
                    </form>
                </div>



                  <!-- Actualizar -->
                  <div x-show="activeTab === 'actualizar'">
                    <h2 class="text-2xl font-semibold mb-6 text-center text-indigo-800">Actualizar Automóvil</h2>
                    <form action="procesar_registro.php" method="post" class="space-y-4">
                        <input type="hidden" name="action" value="actualizar">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="id_actualizar" class="block text-sm font-medium text-gray-700">ID del automóvil a actualizar:</label>
                                <input type="number" id="id_actualizar" name="id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="marca_actualizar" class="block text-sm font-medium text-gray-700">Nueva Marca:</label>
                                <input type="text" id="marca_actualizar" name="marca" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="modelo_actualizar" class="block text-sm font-medium text-gray-700">Nuevo Modelo:</label>
                                <input type="text" id="modelo_actualizar" name="modelo" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="anio_actualizar" class="block text-sm font-medium text-gray-700">Nuevo Año:</label>
                                <input type="number" id="anio_actualizar" name="anio" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="color_actualizar" class="block text-sm font-medium text-gray-700">Nuevo Color:</label>
                                <input type="text" id="color_actualizar" name="color" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="placa_actualizar" class="block text-sm font-medium text-gray-700">Nueva Placa:</label>
                                <input type="text" id="placa_actualizar" name="placa" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="motor_actualizar" class="block text-sm font-medium text-gray-700">Nuevo Motor:</label>
                                <input type="text" id="motor_actualizar" name="motor" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="chasis_actualizar" class="block text-sm font-medium text-gray-700">Nuevo Chasis:</label>
                                <input type="text" id="chasis_actualizar" name="chasis" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="tipo_actualizar" class="block text-sm font-medium text-gray-700">Nuevo Tipo de vehículo:</label>
                                <input type="text" id="tipo_actualizar" name="tipo" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="Actualizar" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-300 ease-in-out">
                        </div>
                    </form>
                </div>

                <!-- Eliminar -->
                <div x-show="activeTab === 'eliminar'">
                    <h2 class="text-2xl font-semibold mb-6 text-center text-indigo-800">Eliminar Automóvil</h2>
                    <form action="procesar_registro.php" method="post" class="space-y-4">
                        <input type="hidden" name="action" value="eliminar">
                        <div>
                            <label for="id_eliminar" class="block text-sm font-medium text-gray-700">ID del automóvil a eliminar:</label>
                            <input type="number" id="id_eliminar" name="id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <input type="submit" value="Eliminar" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 | Desarrollado por Gaspar De Gracia</p>
        <p>Cedula: 8-986-1856</p>
        <p>Grupo: 1LS133</p>
    </footer>
</body>
</html>
