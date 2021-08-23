<template>
<div>
    <table class='table table-bordered
'>
    <thead>
        <tr>
            <th>Tipo Cliente</th>
            <th>Preço</th>
            <th>Data Inicial</th>
            <th>Data Final</th>
            <th class='text-center'>
                <a href="javascript:;" class="btn btn-primary"  @click="add()"><i class='fa fa-plus'></i></a>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(promotion, index) in itens" :key="index">
            <td>
                <select class="form-control" v-model="promotion.client_type_id">
                    <option value="0">Default</option>
                </select>
                </td>
            <td><input type="text" class="form-control" v-model="promotion.price"></td>
            <td><input type="date" class="form-control" v-model="promotion.start"></td>
            <td><input type="date" class="form-control" v-model="promotion.end"></td>
            <td class='text-center'>
                <a href="javascript:;"  @click="up(index)" class="btn btn-primary"><i class='fa fa-arrow-up'></i></a>
                <a href="javascript:;"  @click="down(index)" class="btn btn-primary"><i class='fa fa-arrow-down'></i></a>
                <a href="javascript:;"  @click="remove(index)" class="btn btn-danger"><i class='fa fa-trash'></i></a>
            </td>
        </tr>
    </tbody>
</table>
<textarea name="promotions" id="promotions" cols="30" rows="10" style="visibility:hidden" >{{ dataExtract }}</textarea>
</div>
</template>

<script>
    export default {
        props:['promotions'],
        data(){
            return {
                itens:[]
            }
        },
        mounted() {
            console.log('Component mounted.')
            if(this.promotions != ""){
                this.itens = JSON.parse(this.promotions);
            }
        },
        computed:{
            dataExtract:function(){
                return JSON.stringify(this.itens);
            }
        },
        methods:{
            add: function(){
                this.itens.push({"client_type_id":"0"});
            },
            remove:function(index){
                this.itens.splice(index, 1);
            },
            up:function(index){
                if(index > 0){
                    let newIndex = (index - 1);
                    this.itens.splice(newIndex, 0, this.itens.splice(index, 1)[0]);
                }else{
                    swal('Atenção', 'já é o primeiro item', 'error');
                }
            },
            down:function(index){
                if(index < (this.itens.length -1)){
                    let newIndex = (index + 1);
                    this.itens.splice(newIndex, 0, this.itens.splice(index, 1)[0]);
                }else{
                    swal('Atenção', 'já é o ultimo item', 'error');
                }
            }
        }
    }
</script>