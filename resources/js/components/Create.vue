<template>
    <div class="row">
        <div class="col-md-12">
            <br><br>
            <h4>Create New Data</h4>
            <br>

            <form @submit.prevent="addData()">

                <div class="form-group">
                    <div class="col-md-4">
                        <label for="label">First Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="first_name" id="first_name" class="form-control" v-model="form.firstName" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <label for="label">Last Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="last_name" id="last_name" class="form-control" v-model="form.lastName" required>
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
            form: {
                firstName : '',
                lastName : '',
            }
        }
    },
    methods: {
        addData() {
            //post data to api with axios
            axios.post("http://localhost:8000/api/person", {
                first_name : this.form.firstName,
                last_name : this.form.lastName
            })
            .then ( response => {
                // push to read data if success
                this.$router.push("/");
            });
        }
    }
};
</script>
