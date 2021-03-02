<template>
    <div>
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="razon_social">Razon Social:</label>
                <input type="text" id="razon_social" disabled class="form-control" :value="datosFacturacion.razon_social" />
            </div>
            <div class="form-group col-lg-3">
                <label for="ruc">Ruc:</label>
                <input type="text" id="ruc" disabled class="form-control" :value="datosFacturacion.ruc" />
            </div>
            <div class="form-group col-lg-3">
                <label for="cedula">Cedula:</label>
                <input type="text" id="cedula" disabled class="form-control" :value="datosFacturacion.cedula" />
            </div>
            <div class="form-group col-lg-12">
                <label for="direccion">Direccion:</label>
                <textarea id="direccion" disabled class="form-control" :value="datosFacturacion.direccion"></textarea>
            </div>
            <div class="form-group col-lg-6">
                <label for="ciudad">Ciudad:</label>
                <input type="text" disabled class="form-control" :value="datosFacturacion.ciudad" />
            </div>
            <div class="form-group col-lg-6">
                <label for="telefono">Telefono:</label>
                <input type="text" disabled class="form-control" :value="datosFacturacion.telefono" />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['datosFacturacion'],
    data:function(){
        return{
            
        }
    },
}
</script>