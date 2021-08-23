<template>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="5" class='text-center'>Produtos</th>
                </tr>
                <tr class="text-center">
                    <th>Item</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>
                        <a href="#" class="btn btn-primary" @click="add()"><i class="fa fa-plus"></i></a>
                    </th>
                </tr>
            </thead>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-sm-6">
                        <label for="produto">Produto</label>
                        <select name="" id="" class="form-control">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    <div class="col col-sm-1">
                        <label for="produto">Qtd</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col col-sm-2">
                        <label for="produto">Valor</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col col-sm-3">
                        <label for="produto">Total</label><br>
                        <h3>R$ {{ total }}</h3>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Adicionar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                total:0,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            add:function(){
                $('#productModal').modal('show')
            }
        }
    }
</script>
