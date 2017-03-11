@extends('layouts.app')

@section('content')

<div class="container">

	{{ dd($errors) }}

	<div class="row">
	    <h3>Novo cliente</h3>
	    <h4>{{ $pessoa ==  \App\Client::PESSOA_FISICA ? 'Pessoa Física' : 'Pessoa Jurídica' }}</h4>
	
	    <a href="{{ route('clients.create', ['pessoa' => \App\Client::PESSOA_FISICA]) }}">Pessoa Física</a> |
	    <a href="{{ route('clients.create', ['pessoa' => \App\Client::PESSOA_JURIDICA]) }}">Pessoa Jurídica</a>
	    <br/><br/>
	    <form method="POST" action="{{ route('clients.store') }}" accept-charset="UTF-8" class="form">
	    	
	    	<input name="_token" type="hidden" value="{{ csrf_token() }}">
	
	        <input name="pessoa" type="hidden" value="{{ $pessoa }}">
	
	        <div class="form-group">
	            <label for="nome">Nome</label>
	            <input class="form-control" name="nome" type="text" id="nome">
	        </div>
	
	        <div class="form-group">
	            <label for="documento">{{ $pessoa == \App\Client::PESSOA_FISICA ? 'CPF' : 'CNPJ' }}</label>
	            <input class="form-control" name="documento" type="text" id="documento">
	        </div>
	
	        <div class="form-group">
	            <label for="email">E-mail</label>
	            <input class="form-control" name="email" type="email" id="email">
	        </div>
	
			@if($pessoa == \App\Client::PESSOA_FISICA)
	
	        <div class="form-group">
	            <label for="telefone">Telefone</label>
	            <input class="form-control" name="telefone" type="text" id="telefone">
	        </div>
	        <div class="form-group">
	            <label for="estado_civil">Estado Civil</label>
	            <select class="form-control" id="estado_civil" name="estado_civil"><option value="0">Selecione</option><option value="1">Solteiro</option><option value="2">Casado</option><option value="3">Divorciado</option></select>
	        </div>
	
	        <div class="form-group">
	            <label for="data_nasc">Data Nascimento</label>
	            <input class="form-control" name="data_nasc" type="date" id="data_nasc">
	        </div>
	
	        <div class="radio">
	            <label>
	                <input checked="checked" name="sexo" type="radio" value="m"> Masculino
	            </label>
	        </div>
	
	        <div class="radio">
	            <label>
	                <input name="sexo" type="radio" value="f"> Feminino
	            </label>
	        </div>
	
	        <div class="form-group">
	            <label for="deficiencia_fisica">Defici&ecirc;ncia F&iacute;sica</label>
	            <input class="form-control" name="deficiencia_fisica" type="text" id="deficiencia_fisica">
	        </div>
		
			@endif
	
			@if($pessoa == \App\Client::PESSOA_JURIDICA)
			<div class="form-group">
		        <label for="fantasia">Fantasia</label>
		        <input class="form-control" name="fantasia" type="text" id="fantasia">
		    </div>
			@endif
	
		
	
	        <div class="checkbox">
	            <label>
	                <input name="inadimplente" type="checkbox" value="inadimplente"> Inadimplente?
	            </label>
	        </div>
	        <div class="form-group">
	            <input class="btn btn-primary" type="submit" value="Criar cliente">
	        </div>
	    </form>
	</div>
</div>

@endsection
