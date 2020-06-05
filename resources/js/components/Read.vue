<template>
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-10">
                    <h4>Persons</h4>
                </div>
                <div class="col-md-2">
                    <!-- going to add data -->
                    <router-link class="btn btn-primary w-100" to="/create">+ Tambah</router-link>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- menampilkan data ke table -->
                    <tr v-for="person in persons" :key="person.id">
                        <td style="width:40%;">{{ person.first_name }}</td>
                        <td style="width:40%;">{{ person.last_name }}</td>
                        <td style="width:20%;">
                            <router-link class="btn btn-warning" :to="'/detail/'+person.id">Update</router-link>
                            <button class="btn btn-danger" v-on:click="deleteData(person.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


<!-- JS Script -->
<script>
export default {
    data() {
        return {
            persons: []
        };
    },
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            // fetch from api url using axios
            axios.get('http://localhost:8000/api/person').then(response => {
                this.persons = response.data;
            });
        },
        deleteData(id) {
            // delete data
            axios.delete('http://localhost:8000/api/person/'+id).then(response => {
                this.loadData();
            })
        }
    }
}
</script>
