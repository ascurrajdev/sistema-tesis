<template>
    <div class="form-row">
        <div class="form-group col-lg-4">
            <label for="">Fechas de entrada y salida:</label><br/>
            <vc-date-picker v-model="fecha" :disabled-dates="fechasAgendadas" mode="dateTime" value="range" is-range />
            <input type="hidden" name="start" :value="range.start" />
            <input type="hidden" name="end" :value="range.end" />
        </div>  
        <div class="form-group col-lg-6">
            <div class="form-row">
                <div class="form-group col-lg-12">
                    <label for="">Servicios:</label>
                    <multiselect v-model="serviciosSeleccionado" :options="servicios" track-by="id" label="titulo"/>
                    <input type="hidden" name="servicio_id" :value="servicioId"/>
                </div>
                <div class="form-group col-lg-12">
                    <label for="">Cantidad de personas:</label>
                    <input type="text" class="form-control" name="cantidad_personas" v-model="cantidadPersonas">
                    <small class="form-text text-muted">
                        Obs. Capacidad maxima de 150 personas. Todos deben ser mayores de 13 años
                    </small>
                </div>
                <div class="form-group col-lg-12">
                    <label for="">Motivo de la reserva:</label>
                    <textarea class="form-control" name="motivo"></textarea>
                </div>
                <div class="form-group">
                    <h2 class="lead text-success">Precio estimado: Gs, {{new Intl.NumberFormat('de-DE').format(cantidadPersonas * precioServicio * cantidadDias)}}</h2>
                </div>
                <div class="form-group col-lg-12">
                    <label for="">Telefono:</label>
                    <vue-phone-number-input @update="phoneNumberUpdate" v-model="numberTelefonico"/>
                    <input type="hidden" name="numero_telefono" :value="nroTelefono"/>
                </div>
            </div>
        </div>
        <button class="btn btn-success btn-block" type="submit">Reservar</button>
    </div>  
</template>
<script>
import axios from 'axios'
import {DateTime as DateTimeLuxon,Interval} from 'luxon';
import VuePhoneNumberInput from 'vue-phone-number-input';
import Multiselect from 'vue-multiselect';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';
import 'vue-multiselect/dist/vue-multiselect.min.css';
export default {
    components:{
        VuePhoneNumberInput,
        Multiselect
    },
    data:function(){
        return {
            fecha:null,
            cantidadPersonas:0,
            numberTelefonico:null,
            range:{
                start:new Date(),
                end:new Date(),
            },
            servicios:[],
            serviciosSeleccionado: null,
            servicioId:null,
            cantidadDias:0,
            precioServicio:0,
            nroTelefono:null,
            fechasAgendadas:[]
        }
    },
    mounted:function(){
        this.getAllServicios();
        this.getAllAgendamientosRealizados()
    },
    watch:{
        fecha:function(nuevoRango){
            this.range.start = DateTimeLuxon.fromISO(nuevoRango.start.toISOString()).toSQL({ includeOffset: false })
            this.range.end = DateTimeLuxon.fromISO(nuevoRango.end.toISOString()).toSQL({ includeOffset: false })
            let cantidadDias = Interval.fromDateTimes(nuevoRango.start,nuevoRango.end).toDuration('days').toObject()
            this.cantidadDias = Math.round(cantidadDias.days)
        },
        serviciosSeleccionado:function(nuevoServicio){
            this.precioServicio = nuevoServicio.precio
            this.servicioId = nuevoServicio.id
        },
    },
    methods:{
        phoneNumberUpdate:function(update){
            this.nroTelefono = update?.formattedNumber
        },
        getAllAgendamientosRealizados:function(){
            axios.get('/api/agendamientos/list').then((response)=>{
                return response.data.data
            })
            .then((agendamientos)=>{
                agendamientos = this.formatearFechasAgendadas(agendamientos)
                this.fechasAgendadas = agendamientos
            });
        },
        getAllServicios:function(){
            axios.get('/api/servicios').then((response)=>{
                this.servicios = response.data
            });
        },
        formatearFechasAgendadas:function(fechas){
            fechas.forEach((rangoActual)=>{
                rangoActual.start = new Date(`${rangoActual.start}`)
                rangoActual.end = new Date(`${rangoActual.end}`)
            })
            return fechas
        }
    },
}
</script>