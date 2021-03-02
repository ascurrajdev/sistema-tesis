<template>
    <div>
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="razon_social">Razon Social:</label>
                <input type="text" id="razon_social" required class="form-control" v-model="razonSocial" />
            </div>
            <div class="form-group col-lg-3">
                <label for="ruc">Ruc:</label>
                <input type="text" id="ruc" required class="form-control" v-model="ruc" />
            </div>
            <div class="form-group col-lg-3">
                <label for="cedula">Cedula:</label>
                <input type="text" id="cedula" required class="form-control" v-model="cedula" />
            </div>
            <div class="form-group col-lg-12">
                <label for="direccion">Direccion:</label>
                <textarea id="direccion" required class="form-control" v-model="direccion"></textarea>
            </div>
            <div class="form-group col-lg-6">
                <label for="ciudad">Ciudad:</label>
                <input type="text" required class="form-control" v-model="ciudad" />
            </div>
            <div class="form-group col-lg-6">
                <label for="telefono">Telefono:</label>
                <input type="text" required class="form-control" v-model="telefono" />
            </div>
            <button @click="handleRegistrarDatosFacturacion" class="btn btn-lg btn-block btn-success">
                <i class="fas fa-save"></i>
                Guardar
            </button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data:function(){
        return{
            razonSocial:'',
            ruc:'',
            cedula:'',
            direccion:'',
            ciudad:'',
            telefono:''
        }
    },
    methods:{
        handleRegistrarDatosFacturacion:function(){
            let formData = this.getFormDataFromDatosFacturacion()
            axios.post('/api/facturacion/nuevo',formData).then((response)=>{
                return response.data
            }).then((json)=>{
                this.$toast.open(json.data)
                this.$emit('saved',{})
            })
        },
        getFormDataFromDatosFacturacion:function(){
            let formData = new FormData()
            formData.append('cedula',this.cedula)
            formData.append('ruc',this.ruc)
            formData.append('direccion',this.direccion)
            formData.append('ciudad',this.ciudad)
            formData.append('razon_social',this.razonSocial)
            formData.append('telefono',this.telefono)
            return formData
        }
    }
}
</script>