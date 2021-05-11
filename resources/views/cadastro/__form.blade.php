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
    </div>

    <div class="col-xs-4 col-sm-6 col-md-8">
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

@section('javascript')

    <script>
         $("#fileInput").change(function(e)){
             e.preventDefault();
             enviarFoto(this)
         });

         $("#fileExcluir").click(function(e){
             e.preventDefault();
             excluirFoto(this);
         });

         //preparar um pacote
         function enviarFoto(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                var filename = $('#fileInput').val();
                filename = filename.substring(filename.lastIndexOf('\\')+1);
                reader.onload = function(e){
                    $('#imageUpload').attr('src', e.target.result);
                    $('#imageUpload').hide();
                    $('#imageUpload').fadeIn(500);
                }
                reader.readAsDataURL(input.files[0])
                sendToServer(input.files[0])
            }
        }

        function sendToServer(foto){
            var formData = new FormData();
            formData.append('image',foto);
            formData.append('id',$('#id').val());
            $.ajax({
                url: "{{ url('/store') }}",
                method: 'POST',
                data:formData,
                dataType:'JSON',
                cache:false, 
                contentType:false,
                processData: false,
                beforeSend: function(xhr, type) {
                    if (!type.crossDomain) {
                        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    }
                },
                success : function(response){
                    console.log(response.nomeArquivo);
                    $('#profile_pic').val(response.nomeArquivo);
                },
                error:function(data){
                    console.log("erro de upload "+data)
                    //alert(data)
                }
            })   
         }

         function excluirFoto(e){

         }
    </script>
   
@endsection