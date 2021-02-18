<template>
    <div>
        <vue-phone-number-input v-model="number" @update="getAllDataOfNumber"/>
        <input type="hidden" name="telefono" :value="numberUpdate">
    </div>
</template>
<script>

import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

export default {
    components:{
        VuePhoneNumberInput
    },
    data:function(){
        return {
            number:null,
            numberUpdate:null,
        }
    },
    methods:{
        getAllDataOfNumber:function(data){
            if(data){
                if(data.formattedNumber!=undefined && data.formattedNumber != null){
                    this.numberUpdate = data.formattedNumber;
                }
            }
        }
    }
}
</script>