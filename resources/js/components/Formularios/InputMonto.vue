<template>
<div>
    <input type="text" :name="name" :id="id" v-model="montoTotal" class="form-control"/>
    <span class="text-success h3">Gs {{montoTotalFormat}}</span>
</div>
</template>
<script>
export default {
    props:{
        name:{
            type:String,
            default:'precio'
        },
        id:{
            type:String,
            default:'precio'
        },
        value:{
            validator:function(value){
                return Number.isInteger(parseInt(value)) 
            },
            default:0,
        }
    },
    data:function(){
        return {
            montoTotal:this.value
        }
    },
    computed:{
        montoTotalFormat:function(){
            return new Intl.NumberFormat("de-DE").format(this.montoTotal)
        }
    },
}
</script>