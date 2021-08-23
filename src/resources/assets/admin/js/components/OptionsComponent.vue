<template>
    <div>
        <div class="row">
            <div class="col col-sm-12">
                <br><br>
            </div>
        </div>
        <div class="row">
            <div class="col col-sm-3">
                <div class="row">
                    <div class="col col-sm-12">
                        <table class="table table-bordered">
                            <tr v-for="(option, index) in itens" :key="index" >
                                <td>
                                    <a href="javascript:;" @click="selectOption(index)" v-bind:class="[ index == selected ? 'btn btn-primary': 'btn' ]">{{ option.name }}</a>
                                </td>
                                <td>
                                    <a href="javascript:;" @click="removeOption(index)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" placeholder="Digite a opção" id="textOption"></td>
                                <td><a href="javascript:;" class="btn btn-primary" @click="addOption()"><i class="fa fa-plus"></i></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="col col-sm-9">
                <table class="table table-bordered" v-if="selected !== null">
                    <thead>
                        <tr>
                            <th>Valor</th>
                            <th>Quantidade</th>
                            <th>Reduzir Estoque</th>
                            <th>Preço</th>
                            <th>Pontos</th>
                            <th>Peso</th>
                            <th>
                                <a href="javascript:;" class="btn btn-primary" @click="addValue()"><i class="fa fa-plus"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(option, index) in itens[selected].values" :key="index">
                            <td><input type="text" class="form-control" v-model="option.value"></td>
                            <td><input type="text" class="form-control" v-model="option.quantity" size='3'></td>
                            <td>
                                <select v-model="option.reduce" class="form-control">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" v-model="option.price"></td>
                            <td><input type="text" class="form-control" v-model="option.points"></td>
                            <td><input type="text" class="form-control" v-model="option.weight"></td>
                            <td>
                                <a href="javascript:;" class="btn btn-danger"><i class="fa fa-trash" @click="removeValue(index)"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <textarea name="options" id="options" cols="30" rows="10"  style="visibility:hidden"  >{{dataExtract}}</textarea>
    </div>
</template>

<script>
    export default {
        props:['options'],
        data(){
            return {
                itens:[],
                selected:null,
            }
        },
        mounted() {
            if(this.options != ""){
                this.itens = JSON.parse(this.options);
            }
        },
        computed:{
            dataExtract:function(){
                return JSON.stringify(this.itens);
            }
        },
        methods:{
            addOption:function(){
                let name = document.getElementById('textOption').value;
                this.itens.push({"name":name,"values":[]});
                document.getElementById('textOption').value = "";
                this.selected = this.itens.length - 1;
            },
            removeOption:function(index){
                this.itens.splice(index, 1);
                this.selected = null;
            },
            selectOption:function(index){
                this.selected = index;
            },
            addValue:function(){
                this.itens[this.selected].values.push({'reduce':'0'});
            },
            removeValue:function(index){
                this.itens[this.selected].values.splice(index, 1);
            }
        }
    }
</script>
