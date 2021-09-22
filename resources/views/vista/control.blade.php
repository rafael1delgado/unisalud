@extends('layouts.app')

@section('content')

<h3 class="mb-3"><i class="fas fa-clipboard-list"></i> Lista de Controles</h3>

<div class="row mb-4">
    <div class="col-12 col-md-6">
        <form method="GET" class="form-horizontal" action="">
            <div class="input-group mb-sm-0">
                <input class="form-control" type="text" name="search" autocomplete="off" id="for_search"
                    style="text-transform: uppercase;"
                    placeholder="NOMBRE" value="" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>
    
</div>
<div class="table-responsive">
    <table class="table table-sm table-bordered table-striped small">
        <thead>
            <tr class="text-center table-info">
                <th>RUT</th>
                <th>NOMBRE</th>
                <th>TELÉFONO</th>
                <th>ESPECIALIDAD</th>
                <th>CONTROL</th>
                <th>VER</th>
                <th>CITAR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>10225368-k</td>
                <td>Sofia Valencia</td>
                <td>+56945455252</td>
                <td>Medicina General</td>
                <td> 27-09-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>10552236-k</td>
                <td>Camila Reyes</td>
                <td>+56923233336</td>
                <td>Oftanmologia</td>
                <td>29-09-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>26335352-5</td>
                <td>Jesus Carlos Cantero</td>
                <td>+56956622636</td>
                <td>Medicina General</td>
                <td>15-10-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>15556525-8</td>
                <td>Daniel Benavidez</td>
                <td>+56925255656</td>
                <td>Medicina Genereal </td>
                <td>20-10-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>23225525-k</td>
                <td>Kathalina Morales</td>
                <td>+5699999898</td>
                <td>Medicina General</td>
                <td>20-10-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>10225361-2</td>
                <td>Juan Perez</td>
                <td>+56945455250</td>
                <td>Dermatología</td>
                <td>08-10-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>2633535-6</td>
                <td>Agustin Reyes</td>
                <td>+56956566362</td>
                <td>Traumatología</td>
                <td>01-11-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>16665523-7</td>
                <td>Rodrigo Contreras</td>
                <td>+56966332322</td>
                <td>Medicina General</td>
                <td>20-11-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>10225368-k</td>
                <td>Sofia Valencia</td>
                <td>+56945455252</td>
                <td>Medicina General</td>
                <td>20-11-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            <tr>
                <td>10225368-k</td>
                <td>Sofia Valencia</td>
                <td>+56945455252</td>
                <td>Medicina General</td>
                <td>20-11-2021</td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="{{ route('vista.attention') }}" class="text-light" >Ver</a></button></td>
                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>
            </tr>
            
        </tbody>
    </table>
</div>

@endsection
