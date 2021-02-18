<template>
    <div>
        <file-pond name="archivo" allow-multiple="true" accepted-file-types="image/*" server="/api/servicios/upload" @processfile="handleAddFile"/>
        <input type="hidden" name="files" v-model="myFiles">
    </div>
</template>
<script>
import vueFilePond from 'vue-filepond'
import 'filepond/dist/filepond.min.css'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'
export default {
    components:{
        FilePond:vueFilePond(FilePondPluginImagePreview)
    },
    data:function(){
        return {
            myFiles:[]
        }
    },
    methods:{
        handleAddFile:function(e,fileUpload){
            let filePath = JSON.parse(fileUpload.serverId).file
            this.myFiles.push(filePath)
        }
    }
      
}
</script>