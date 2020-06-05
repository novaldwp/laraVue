<template>
    <div class="row">
        <div class="col-md-12">

            <br><br>
            <h4>Update Data</h4>
            <br>
            <!-- prevent from reload data when click update-->
            <form @submit.prevent="updateData()">

                <div class="form-group">
                    <div class="col-md-4">
                        <label>First Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="firstname" id="firstname" class="form-control" v-model="form.firstName" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label>Last Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="lastname" id="lastname" class="form-control" v-model="form.lastName" required>
                    </div>
                </div>
                <button class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form : {
                firstName : "",
                lastName : ""
            }
        };
    },
    created() {
        // load data when first time opened
        this.loadData();
    },
    methods: {
        loadData() {
            // load data from id
            axios.get('http://localhost:8000/api/person/'+this.$route.params.id)
            .then ( response => {
                //pass value from response to form
                this.form.firstName = response.data.first_name;
                this.form.lastName  = response.data.last_name;
            });
        },
        updateData() {
            axios.put('http://localhost:8000/api/person/'+this.$route.params.id, {
                first_name : this.form.firstName,
                last_name : this.form.lastName
            })
            .then ( response => {
                // get to read.vue
                this.$router.push('/');
            })
        }
    }
};
</script>
