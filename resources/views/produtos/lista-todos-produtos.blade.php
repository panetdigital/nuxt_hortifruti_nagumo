@extends('layouts.app')



@section('title') {{'Lista todos produtos'}} @endsection

@section('content')
    
	
		    <style>
			.navbar-brand {margin-left: 37%;}	
            </style>

        <!--css de img bd-->
          <style>
            .img200-200{
                width: 110px;
            } 
            </style> 

<div class="container">
     <h3 align="center">Lista de todos produtos </h3> <br />

     <button class="btn btn-warning btn-sm" onclick="goBack()">Retorno</button>

     <div class="row">
     <div class="col-12">
         <div class="table-responsive">
             <table class="table  table-bordered">
             <thead>
                 <tr>
                    <th>CodeProd </th>    
                    <th>CodEtiq </th>
                    <th>Nome </th>
                    <th>imagem </th>
                 </tr>
             </thead>
             <tbody>
            @if(!empty($data) && $data->count())
                @foreach($data as $rs)
                 <tr>
                     <td>{{ $rs->cod }} </td>
                     <td>{{ $rs->coditem }} </td>
                     <td>{{ $rs->nome }} </td>
                    
                     <td>

											<div class='row justify-content-center mt-3'>
												@if ($rs->imagem)
													<!-- Verifica se há um link válido para a imagem -->
													<img src="{{ $rs->imagem }}" class='img-fluid mb-3 d-block img200-200' alt="Imagem do Item">
												@else
													<!-- Caso não haja um link válido, use um link estático de imagem -->
													
													<img src="{{ asset('vendor/img/fotoilustrada.jpg') }}" class='img-fluid mb-3 d-block img200-200' alt="Image ilustrada" />
												@endif
											</div>

									</td>
								</tr>
                 </tr>
                @endforeach
            @else
                 <tr>
                     <td colspan="6">Nenhum resultado. </td>
                 </tr>
            @endif   
             </tbody>
             </table><div class="">{{ $data->onEachSide(1)->links() }} </div>
         </div>
     </div>    
     </div>
     

     <!-- botão de retorno-->               
<script>
    function goBack(){ window.history.back()  }
</script> 
 </div>       
      

 @endsection



