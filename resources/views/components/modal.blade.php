<div class="hidden flex justify-center  items-center h-screen select-none" id={{$id}}>
<div class="fixed left-0 top-0 bg-black bg-opacity-50 w-screen h-screen flex justify-center items-center z-50">
    <div class="bg-white rounded shadow-md p-8 w-[40%] flex flex-col">
        <section class="relative flex items-center justify-between p-2 border-b border-gray-200">
            <div class="flex align-center">
                <h2 class="absolute inset-0 flex items-center justify-center text-lg font-semibold">{{$modalTitle}}</h2>
            </div>
            <button class="p-2 rounded-full hover:bg-gray-200 relative z-10" onclick="hideDialog('{{$id}}')" aria-label="Cerrar">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
        </section>
    {{$modalMain}}
    </div>
</div>
</div>