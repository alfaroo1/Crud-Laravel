<section class="bg-white dark:bg-gray-800 py-20 lg:py-[120px]">
  <div class="container">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full px-4">
        <div class="max-w-full overflow-x-auto p-5">
          <button class="bg-purple-500 rounded-md text-white p-2 w-[150px] mb-4"
            wire:click="openModal">
            Nueva tarea</button>
          <table class="table-auto w-full">
            <thead class="bg-purple-500">
              <tr class="bg-primary text-center">
                <th
                  class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           border-l border-transparent
                           rounded-tl-md
                           ">
                  Nombre
                </th>
                <th
                  class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           ">
                  Descripcion
                </th>
                <th
                  class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           rounded-tr-md
                           ">
                  Opciones
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tasks as $task)
                <tr>
                  <td
                    class="
                           text-center 
                           text-black
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-[#F3F6FF]
                           rounded-bl-md
                           ">
                    {{ $task->title }}
                  </td>
                  <td
                    class="
                           text-center 
                           text-black
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           ">
                    {{ $task->description }}
                  </td>
                  <td
                    class="
                           text-center 
                           text-black
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-[#F3F6FF]
                           rounded-br-md
                           ">
                    <button
                      class="bg-yellow-500 rounded-md text-white p-2 w-[100px]">Editar</button>
                    <button
                      class="bg-red-500 rounded-md text-white p-2 w-[100px]">Borrar</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- MODAL --}}
@if ($modal)
  <div
    class="fixed left-0 top-0 flex h-full w-full items-center justify-center text-black bg-black bg-opacity-50 py-10">
    <div
      class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
      <div class="w-full">
        <div class="m-8 my-20 max-w-[400px] mx-auto">
          <div class="mb-8">
            <h1 class="mb-4 text-3xl font-extrabold text-center">Crea
              un
              componente
            </h1>
            <form>
              <div class="flex flex-col">
                <label>Titulo</label>
                <input class="rounded-sm" type="text" name="title"
                  id="title">
              </div>
              <div class="flex flex-col">
                <label>Descripcion</label>
                <input class="rounded-sm" type="text" name="descripcion"
                  id="descripcion">
              </div>
            </form>
          </div>
          <div class="flex justify-between ">
            <button
              class="p-3 bg-black rounded-full text-white w-full font-semibold">Crear
              tarea</button>
            <button
              class="p-3 bg-white border rounded-full w-full font-semibold">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

