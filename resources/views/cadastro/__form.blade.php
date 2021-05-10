<div class="row">
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div id="drop-zone">
                        <div id="fotoBanco">
                            <input type="hidden" id="profile_pic" name="profile_pic">
                            @if (isset($registro->profile_pic))
                                <img scr="{{ url('/imagem', $registro->profile_pic) }}" class="avatar" />
                            @else
                                <img id="imageUpload" scr="{{ url('/imagem', 'boy.png') }}" class="avatar" />
                            @endif
                        </div>
                        <div id="clickHereLeft" style="float: left">
                            <input type="file" accept=".jpg, .jpeg, .png" id="fileInput"
                                class="form-control hide btn-responsive">
                            <div style="text-align: center;">
                                <label for="fileInput"><i class="fa fa-upload fa-lg"></i></label>
                            </div>
                        </div>
                        <div id="clickHereRight" style="float: right">
                            <input type="button" id="fileExcuir" class="form-control hide btn-responsive">
                            <div style="text-align: center;">
                                <label for="fileExcluir"><i class="fa fa-trash fa-lg"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nome" class="control-label">Nome:</label>
                    <input type="text" name="nome" id="nome"
                        value="{{ isset($registro->nome) ? $registro->nome : '' }}"
                        class="form-control @error('nome') is-invalid @enderror" />
                    @error('nome_receita')
                        <div>
                            <span><strong>{{ $message }}</strong></span>
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input type="text" name="email" id="email"
                        value="{{ isset($registro->email) ? $registro->email : '' }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="idade" class="control-label">Idade:</label>
                    <input type="text" name="idade" id="idade"
                        value="{{ isset($registro->idade) ? $registro->idade : '' }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="senha" class="control-label">Senha:</label>
                    <input type="text" name="senha" id="senha"
                        value="{{ isset($registro->senha) ? $registro->senha : '' }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="confirmar_senha" class="control-label">Confirmar a Senha:</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha"
                        class="form-control @error('confirmar_senha') is-invalid @enderror" />
                    @error('confirmar_senha')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</span></strong>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
