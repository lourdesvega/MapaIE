@extends('layouts.tabla')

@section('nomtabla')
Edificios
@endsection

@section('agregar')


@include('admin.altaEdificio')



@endsection

@section('cuerpo')



<tr>
	<td>1</td>
	<td>Thomas Hardy</td>
	<td>89 Chiaroscuro Rd.</td>
	<td>Portland</td>
	<td>97219</td>
	<td>USA</td>
	<td>
		<a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
		<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
		
	</td>

</tr>


@endsection