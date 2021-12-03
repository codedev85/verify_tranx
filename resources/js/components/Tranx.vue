<template>
    <div>
        <div> <span>Amount: </span> : {{amount}}</div>

        <div> <span>Verification Count:{{count}} </span></div>
        <div>
            <form >
                <input type="text" v-model="reference" class="verify">
                <button class="btn btn-success" @click="verify">Verify</button>
            </form>
        </div>
    </div>
</template>

<script>

export default {
    name: "verify",
    data(){
        return {
            error: {},
            amount:[],
            count: 0,
            ref:''
        }
    },
    methods: {

        verify(e){
            e.preventDefault()

          let reference = this.reference
            axios.post('/verify', reference).then(response => {
                if(response.status === 200) {
                    console.log('worked')
                }
            }).catch(error => {
                // code here when an upload is not valid
                this.uploading = false
                this.error = error.response
                console.log('check error: ', this.error)
            });

        }
    }
}

</script>
