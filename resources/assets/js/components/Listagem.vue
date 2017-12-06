<template>

    <div>

        <div class="form-inline">

            <a v-bind:href="novo" class="btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Nova</a>

            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>

        <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th v-for="titulo in titulos">{{titulo}}</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in lista /** itens */">
                <td v-for="i in item">{{i}}</td>
                <td v-if="detalhe || editar || deletar">

                    <a v-bind:href="detalhe + item.id" class="btn-sm btn-info"><i class="glyphicon glyphicon-search"></i> Detalhes</a>
                    <a v-bind:href="editar + item.id + '/edit'" class="btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    <a v-bind:href="deletar + item.id" class="btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i> Deletar</a>

                </td>
            </tr>
            </tbody>

        </table>
    </div>

</template>

<script>
    export default {
        props: ['titulos', 'itens', 'novo', 'detalhe', 'editar', 'deletar', 'token'],
        data: function () {
            return {
                buscar: ''
            }
        },
        computed: {
            lista: function () {

                let lista = this.itens.data;
                if (this.buscar) {
                    return lista.filter(res => {
                        res = Object.values(res);

                        for (let i = 0; i < res.length; i++) {
                            if ((res[i] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0) {
                                return true;
                            }
                        }
                        return false;
                    });
                }
                return lista;
            }
        }
    }
</script>
