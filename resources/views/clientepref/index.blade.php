<x-app-layout>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="flex justify-between">
                        <div class="flex space-x-8">
                            <!--buscador clientes especiales-->
                            <div class="-order-2">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" name="search" class="input input-bordered input-sm" placeholder="Buscar No.Cliente/Nombre cliente">
                                        <button type="submit" value="Buscar" class="btn btn-square btn-sm" >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                        </button>
                                    </div>
                                    <br>
                                </form>
                            </div>
                            <!--Botón asignar precio especial-->
                            <div>
                                <button class="btn btn-sm leading-normal flex items-center justify-between bg-lime-600">
                                    <a href="{{route('clientepref.create')}}"  class="text-blue-900">Asignar precio</a>
                                </button>
                            </div>
                        </div>   
                    </div>
                    @if (session()->has('message'))
                    <div class="alert alert-success shadow-lg">
                        <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>                            <span>{{ session()->get('message')}}</span>
                        </div>
                    </div>
                    @endif
                    <!--tabla clientes preferenciales-->
                    <div class="overflow-x-auto h-96">
                        <table class="table-auto table-zebra">
                            <thead>
                                <tr>
                                <th scope>No.Cliente</th>
                                <th scope>Nombre</th>
                                <th scope>Código Barras</th>
                                <th scope>Precio</th>
                                <th scope>Precio crédito</th>
                                <th scope>crédito</th>
                                <th scope>clave ruta</th>
                                <th scope>Acciones</th>
                                <th></th>
                                </tr>
                            </thead>
                            @foreach($precios as $precio )
                        
                            <tr class="border-b border-gray-200 tx-sm w-auto">
                                <td class="px-1 py-1"><b>{{$precio->NoCliente}}</b></td>
                                <td class="px-1 py-2">{{$precio->nombre}}</td>
                                <td class="px-2 py-2">{{$precio->CodigoBarras}}</td>
                                <td class="px-2 py-2">{{$precio->Precio}}</td>
                                <td class="px-2 py-2">{{$precio->PrecioCredito}}</td>
                                <td class="px-2 py-4">{{$precio->Credito}}</td>
                                <td class="px-2 py-4">{{$precio->claveruta}}</td>

                            <!--Botones acciones editar y eliminar-->
                                <td class="px-6 py-4">
                                    <button class="btn btn-sm leading-normal flex items-center justify-between bg-lime-600">
                                       <a href="{{route('clientepref.edit',$precio)}}">Editar</a>
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('clientepref.destroy',$precio)}}" method="POST">
                                   <!-- <form action="{{ route('clientepref.destroy', $precio)}}" method="POST">-->
                                        @csrf
                                        @method('DELETE')
                                       <input 
                                        type="submit" 
                                        value="Eliminar"
                                        class="btn btn-sm leading-normal flex items-center justify-between bg-lime-600"
                                        onclick="return confirm('¿Desea eliminar?')">
                                    
                                    </form>
                                </td>
                            </tr>
                        
                            @endforeach
                        </table>
                    </div>
                    {{ $precios->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
