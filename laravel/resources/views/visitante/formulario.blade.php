@extends('layouts.app')

@section('title')
    <title>Criar Morador</title>
@endsection

@section('style')
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .red {
            color: red;
        }
    </style>
@endsection

@section('formulario')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-dark">
                <div class="card-header">
                    Morador
                </div>
                <div class="card-body">
                    <div>
                        @if(count($errors) > 0)
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <form action="salvar" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$area->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome"><i class="red">*</i> Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome" onclick="input()"
                                       name="nome" value="{{$visitante->nome}}" maxlength="150">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="rg"><i class="red">*</i> RG</label>
                                <input type="text" class="form-control" id="rg" placeholder="RG" onclick="input()"
                                       name="rg" value="{{$visitante->rg}}" maxlength="150">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email"><i class="red">*</i> E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                       onclick="input()"
                                       name="email" value="{{$visitante->email}}" maxlength="150">
                                <div class="alert alert-danger" id="mensagemEmail" style="display: none;">
                                    O E-mail já está cadastrado !
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telefone"><i class="red">*</i> Telefone</label>
                                    <input type="text" class="form-control" id="telefone" placeholder="(00)00000-0000"
                                           maxlength="14"
                                           minlength="13"
                                           onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;"
                                           name="telefone" onclick="input()" value="{{$visitante->telefone}}"
                                           maxlength="150">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="data"><i class="red">*</i> Data</label>
                                    <input type="date" class="form-control" id="data" name="data"
                                           value="{{$visitante->data}}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="condominio_id">Selecione o Condominio</label>
                                    <select class="form-control" name="condominio_id">
                                        <option>-- Selecione o Condominio --</option>
                                        @foreach($condominio as $cond)
                                            @if($visitante->condominio_id == $cond->id)
                                                <option value="{{$cond->id}}" selected>{{$cond->nome}}</option>
                                            @else
                                                <option value="{{$cond->id}}">{{$cond->nome}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-0">
                                    <input type="submit" class="btn btn-primary" value="Salvar">
                                </div>
                                <div class="form-group col-md-1">
                                    <a class="btn btn-primary" href="{{ route('home') }}">Voltar</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function input() {
            var control = 0;

            if (control = 0) {
                control++;
            } else {
                document.getElementById("cpf").style.background = "#484848";
                document.getElementById("cpf").style.color = "#ffffff";

                document.getElementById("email").style.background = "#484848";
                document.getElementById("email").style.color = "#ffffff";

                document.getElementById("nome").style.background = "#484848";
                document.getElementById("nome").style.color = "#ffffff";

                document.getElementById("telefone").style.background = "#484848";
                document.getElementById("telefone").style.color = "#ffffff";

                document.getElementById("marca").style.background = "#484848";
                document.getElementById("marca").style.color = "#ffffff";

                document.getElementById("veiculo").style.background = "#484848";
                document.getElementById("veiculo").style.color = "#ffffff";

            }
        }
    </script>
@endsection
