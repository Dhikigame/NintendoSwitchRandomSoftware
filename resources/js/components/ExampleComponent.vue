<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        <ul>
                            <!-- <li v-for="i in list">{{ i }}</li> -->
                            <li v-for="name in myname">{{ name }}</li>
                            <!-- <li>{{ myname }}</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:["myname"],
        data(){
            return {
                list: [1,2,4]
            }
        },
        // props:["test"],
        mounted() {
            console.log(this.myname)
            // console.log("Component mounted.")
            // axios.get('/switch_software_releasemaker_gamecount').then(response => this.switch_software_releasemaker_gamecount = response.data)
        }
    }
</script>