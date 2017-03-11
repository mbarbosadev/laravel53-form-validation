@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
	    <h3>Novo cliente</h3>
	    <h4>{{ $pessoa ==  \App\Client::PESSOA_FISICA ? 'Pessoa Física' : 'Pessoa Jurídica' }}</h4>
	
	    <a href="{{ route('clients.create', ['pessoa' => \App\Client::PESSOA_FISICA]) }}">Pessoa Física</a> |
	    <a href="{{ route('clients.create', ['pessoa' => \App\Client::PESSOA_JURIDICA]) }}">Pessoa Jurídica</a>
	    <br/><br/>
	    
	    @if($errors->any())
	    
	    <ul class="alert alert-danger">
	    	@foreach($errors->all() as $error)
	    		<li>{{ $error }}</li>
	    	@endforeach
	    </ul>
	    
	    @endif
	    
	    
	    <form method="POST" action="{{ route('clients.store') }}" accept-charset="UTF-8" class="form">
	    	
	    	<input name="_token" type="hidden" value="{{ csrf_token() }}">
	
	        <input name="pessoa" type="hidden" value="{{ $pessoa }}">
	
	        <div class="form-group {{ in_array('nome', $errors->getBag('default')->keys()) ? 'has-error' : '' }}">
	            <label for="nome" class="control-label">Nome</label>
	            <input class="form-control" name="nome" type="text" id="nome">
	        </div>
	
	        <div class="form-group {{ in_array('documento', $errors->getBag('default')->keys()) ? 'has-error' : '' }}">
	            <label for="documento" class="control-label">{{ $pessoa == \App\Client::PESSOA_FISICA ? 'CPF' : 'CNPJ' }}</label>
	            <input class="form-control" name="documento" type="text" id="documento">
	        </div>
	
	        <div class="form-group {{ in_array('email', $errors->getBag('default')->keys()) ? 'has-error' : '' }}">
	            <label for="email" class="control-label">E-mail</label>
	            <input class="form-control" name="email" type="email" id="email">
	        </div>
	
			@if($pessoa == \App\Client::PESSOA_FISICA)
	
	        <div class="form-group {{ in_array('telefone', $errors->getBag('default')->keys()) ? 'has-error' : '' }}">
	            <label for="telefone" class="control-label">Telefone</label>
	            <input class="form-control" name="telefone" type="text" id="telefone">
	        </div>
	        <div class="form-group {{ in_array('estado_civil', $errors->getBag('default')->keys()) ? 'has-error' : '' }}">
	            <label for="estado_civil" class="control-label">Estado Civil</label>
	            <select class="form-control" id="estado_civil" name="estado_civil"><option value="0">Selecione</option><option value="1">Solteiro</option><option value="2">Casado</option><option value="3">Divorciado</option></select>
	        </div>
	
	        <div class="form-group {{ in_array('data_nasc', $errors->getBag('default')->keys()) ? 'has-error' : '' }}">
	            <label for="data_nasc" class="control-label">Data Nascimento</label>
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
	
	        <div class="form-group {{ in_array('deficiencia_fisica', $errors->getBag('default')->keys()) ? 'has-error' : '' }}">
	            <label for="deficiencia_fisica" class="control-label">Defici&ecirc;ncia F&iacute;sica</label>
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
