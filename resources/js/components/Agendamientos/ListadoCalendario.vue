<template>
    <vue-cal style="height:400px; width:70%;margin:auto" small locale="es" active-view="month" :disable-views="['years','week']" :time="false"/>
</template>
<script>
import VueCal from 'vue-cal';
import 'vue-cal/dist/i18n/es';
import 'vue-cal/dist/vuecal.css';
import './theme.css';
export default {
    components:{
        VueCal
    },
    data:{

    },
    watch:{
        
    },
    methods:{

    },

}
</script>