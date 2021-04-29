@include('layouts.validacao')
<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-12">
        <div class="form-group">
            <label for="nome_receita" class="control-label">Nome da Receita:</label>
            <input type="text" 
                name="nome_receita" 
                id="nome_receita" 
                value="{{ isset( $registro->nome_receita ) ? $registro->nome_receita : ''  }}"
                class="form-control @error('nome_receita') is-invalid @enderror" />
                @error('nome_receita')
                    <div>
                        <span><strong>{{ $message }}</strong></span>
                    </div>                    
                @enderror
        </div>       
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-12">
        <div class="form-group">
            <label for="descricao" class="control-label">Descrição:</label>
            <input type="text" 
                name="descricao" 
                id="descricao" 
                value="{{ isset( $registro->descricao ) ? $registro->descricao : ''  }}"
                class="form-control @error('descricao') is-invalid @enderror" />
                @error('descricao')
                    <div>
                        <span><strong>{{ $message }}</strong></span>
                    </div>                    
                @enderror
        </div>       
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-12">
        <div class="form-group">
            <label for="tempo_preparo" class="control-label">Tempo de Preparo:</label>
            <input type="text" 
                name="tempo_preparo" 
                id="tempo_preparo" 
                value="{{ isset( $registro->tempo_preparo ) ? $registro->tempo_preparo : '' }}"
                class="form-control @error('tempo_preparo') is-invalid @enderror" />
                @error('tempo_preparo')
                    <div>
                        <span><strong>{{ $message }}</strong></span>
                    </div>                    
                @enderror
        </div>       
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-12">
        <div class="form-group">
            <label for="rendimento" class="control-label">Rendimento:</label>
            <input type="text" 
                name="rendimento" 
                id="rendimento" 
                value="{{ isset( $registro->rendimento ) ? $registro->rendimento : ''  }}"
                class="form-control @error('rendimento') is-invalid @enderror" />
                @error('rendimento')
                    <div>
                        <span><strong>{{ $message }}</strong></span>
                    </div>                    
                @enderror
        </div>       
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-12">
        <div class="form-group">
            <label for="lista_ingredientes" class="control-label">Lista de Ingredientes:</label>
            <input type="text" 
                name="lista_ingredientes" 
                id="lista_ingredientes" 
                value="{{ isset( $registro->lista_ingredientes ) ? $registro->lista_ingredientes : '' }}"
                class="form-control @error('lista_ingredientes') is-invalid @enderror" />
                @error('lista_ingredientes')
                    <div>
                        <span><strong>{{ $message }}</strong></span>
                    </div>                    
                @enderror
        </div>       
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-12">
        <div class="form-group">
            <label for="cadastro_id" class="control-label">Autor da Receita:</label>
            <select type="text" name="cadastro_id" id="cadastro_id"> 
                @foreach ($cadastros as $cadastro)
                    <option value="{{$cadastro->id}}">{{cadastro->nome}}</option>                    
                @endforeach
            </select>      
            @error('cadastro_id')
            <div>
                <span><strong>{{ $message }}</strong></span>
            </div>                    
        @enderror        
        </div>       
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-12">
        <div class="form-group">
            <label for="metodo_preparo" class="control-label">Metodo de Preparo:</label>
            <input type="text" 
                name="metodo_preparo" 
                id="metodo_preparo" 
                value="{{ isset( $registro->metodo_preparo ) ? $registro->metodo_preparo : '' }}"
                class="form-control @error('metodo_preparo') is-invalid @enderror" />
                @error('metodo_preparo')
                    <div>
                        <span><strong>{{ $message }}</strong></span>
                    </div>                    
                @enderror
        </div>       
    </div>
</div>