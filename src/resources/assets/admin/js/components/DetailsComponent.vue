<template>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:300px">Tipo</th>
                    <th>Descrição</th>
                    <th class='text-center' style="width:80px">
                        <a href="javascript:;" class="btn btn-primary" @click="add()"><i class="fa fa-plus"></i></a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(detail, index) in itens" :key="index">
                    <td><input type="text" class="form-control" v-model="detail.field"></td>
                    <td><textarea name="" id="" cols="30" rows="10" class="form-control" v-model="detail.description"></textarea></td>
                    <td>
                        <a href="javascript:;" class="btn btn-danger" @click="remove()"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <textarea name="details" id="details" cols="30" rows="10" style="visibility:hidden"  >{{ dataExtract }}</textarea>
    </div>
</template>

<style scoped>
td{
    padding:25px!important;
}
</style>

<script>
    export default {
        props : ['details'],
        data(){
            return {
                itens: []
            };
        },
        mounted() {
            this.itens = JSON.parse(this.details);
        },
        computed:{
            dataExtract:function(){
                return JSON.stringify(this.itens);
            }
        },
        methods:{
            add:function(){
                this.itens.push({'field':'','description':''});
            },
            remove:function(index){
                this.itens.splice(index, 1);
            }
        }

    }
</script>
