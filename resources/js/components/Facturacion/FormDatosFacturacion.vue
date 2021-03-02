<template>
    <div>
        <div v-if="!userWithDatosFacturacion">
            <boton-agregar-datos v-show="!agregarDatosFacturacion" @agregar="handleAgregarDatosFacturacion"/>
            <campos-datos-facturacion @saved="getAllDatosFacturacion" v-show="agregarDatosFacturacion" />
        </div>
        <mostrar-datos-facturacion v-else :datos-facturacion="datosFacturacion"/>
    </div>

</template>
<script>
import BotonAgregarDatos from './BotonAgregarDatos.vue'
import CamposDatosFacturacion from './CamposDatosFacturacion.vue'
import MostrarDatosFacturacion from './MostrarDatosFacturacion.vue'
export default {
    data:function(){
        return{
            agregarDatosFacturacion:false,
            userWithDatosFacturacion:false,
            datosFacturacion:[]
        }
    },
    components:{
        BotonAgregarDatos,
        CamposDatosFacturacion,
        MostrarDatosFacturacion
    },
    mounted:function(){
        this.getAllDatosFacturacion()
    },
    methods:{
        handleAgregarDatosFacturacion:function(){
            this.agregarDatosFacturacion = true
        },
        getAllDatosFacturacion:function(){
            axios.get('/api/facturacion/all').then((response)=>{
                return response.data
            }).then((json)=>{
                this.datosFacturacion = json.data
                this.userWithDatosFacturacion = true
            })
        }
    }
}
</script>