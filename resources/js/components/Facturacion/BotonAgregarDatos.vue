<template>
    <button @click="agregarDatosFacturacion" class="btn btn-lg btn-block btn-success">
        Agregar datos de facturacion
    </button>
</template>
<script>
export default {
    data:function(){
        return{}
    },
    methods:{
        agregarDatosFacturacion:function(){
            this.$emit("agregar",{})
        }
    }
}
</script>