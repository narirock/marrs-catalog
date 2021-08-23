<template>
    <div class='col col-sm-12'>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Endereço</th>
                    <th>Numero</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th class='text-center'><a href="javascript:;" class="btn btn-primary"
                            @click="add()">Novo</a></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(address, index) in itens" :key="index">
                    <td>{{address.logradouro}}</td>
                    <td>{{address.numero}}</td>
                    <td>{{address.complemento}}</td>
                    <td>{{address.bairro}}</td>
                    <td>{{address.cidade}}</td>
                    <td>{{address.estado}}</td>
                    <td>
                        <a href="javascript:;" class="btn btn-success"  @click="edit(index)"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" class="btn btn-danger" @click="remove(index)"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <textarea :name="fieldname" style="visibility:hidden" >{{dataExtract}}</textarea>

        <div class="modal fade" :id="fieldname" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Endereço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="form-row">
                        <input type="hidden" class="form-control" v-model="current.index" >
                        <div class="col col-sm-4">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control cep" v-model="current.cep" @blur="changeCEP()" >
                        </div>
                        <div class="col col-sm-6">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" class="form-control logradouro" v-model="current.logradouro">
                        </div>
                        <div class="col col-sm-2">
                            <label for="cep">Numero</label>
                            <input type="text" class="form-control numero" v-model="current.numero">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col col-sm-4">
                            <label for="cep">Complemento</label>
                            <input type="text" class="form-control complemento" v-model="current.complemento">
                        </div>
                        <div class="col col-sm-4">
                            <label for="logradouro">Bairro</label>
                            <input type="text" class="form-control bairro" v-model="current.bairro">
                        </div>
                        <div class="col col-sm-4">
                            <label for="cep">Cidade</label>
                            <input type="text" class="form-control cidade" v-model="current.cidade">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col col-sm-4">
                            <label for="cep">Estado</label>
                            <input type="text" class="form-control estado" v-model="current.estado">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" @click="update()">Salvar endereço</button>
            </div>
        </div>
    </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['list', 'fieldname', 'type'],
        data(){
            return {
                itens: [],
                current:{}
            };
        },
        mounted() {
            if(this.list != ""){
                this.itens = JSON.parse(this.list);
            }
        },
        computed:{
            dataExtract:function(){
                return JSON.stringify(this.itens);
            }
        },
        methods:{
            add:function(){
                this.current = {'index':null, 'type':this.type};
                $("#" + this.fieldname).modal('toggle');
                $(".modal-backdrop").hide();
            },
            edit:function(index){
                this.current = JSON.parse(JSON.stringify(this.itens[index]));
                this.current.index = index;
                $("#" + this.fieldname).modal('toggle');
                $(".modal-backdrop").hide();
            },
            remove:function(index){
                this.current = {'type':this.type};
                this.itens.splice(index, 1);
            },
            update:function(){
                if(this.current.index != null){
                    var index = this.current.index 
                    this.itens[index].cep = this.current.cep;
                    this.itens[index].logradouro = this.current.logradouro;
                    this.itens[index].numero = this.current.numero;
                    this.itens[index].complemento = this.current.complemento;
                    this.itens[index].bairro = this.current.bairro;
                    this.itens[index].cidade = this.current.cidade;
                    this.itens[index].estado = this.current.estado;
                    $("#" + this.fieldname).modal('toggle');
                }else{
                    this.itens.push(JSON.parse(JSON.stringify(this.current)));
                    $("#" + this.fieldname).modal('toggle');
                }
            },
            changeCEP:function(){
                var cep = this.current.cep;
                var current = this.current;
                console.log(current);
                if (cep != "") {
                    fetch("https://viacep.com.br/ws/" + cep + "/json")
                    .then(response => response.json())
                    .then(data => (
                        this.current = data, 
                        this.current.numero = this.current.numero, 
                        this.current.logradouro = data.logradouro, 
                        this.current.bairro = data.bairro, 
                        this.current.estado = data.uf, 
                        this.current.cidade = data.localidade
                    ));
                }
            }

        }
    }
</script>
