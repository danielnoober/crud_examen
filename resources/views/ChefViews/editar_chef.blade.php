<x-layouts.app :title="__('Dashboard')">

    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
            class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">MODIFICAR</span> CHEF
    </h1>


    <form class="max-w-sm mx-auto" action="{{ route('actualizar_chef',$chef->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
            <input type="text" id="text" name="nombres" value="{{ $chef->nombres }}"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                required />
            @error('nombres')
                <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
            <input type="text" id="text" name="apellidos" value="{{ $chef->apellidos }}"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                required />
            @error('apellidos')
                <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                Nacimiento</label>
            <input type="date" id="date" name="fecha_nacimiento" value="{{ $chef->fecha_nacimiento }}"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                required />
            @error('fecha_nacimiento')
                <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matrícula</label>
            <input type="text" id="text" name="matricula" value="{{ $chef->matricula }}"
                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                required />
            @error('matricula')
            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
            Chef</button>
    </form>


</x-layouts.app>