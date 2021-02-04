<template>
    <div>
        <h3 class="text-center">Изменить данные о пластинке</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateBook">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" v-model="record.name">
                    </div>
                    <div class="form-group">
                        <label>Размер</label>
                        <input type="text" class="form-control" v-model="record.size">
                    </div>
                    <div class="form-group">
                        <label>Год</label>
                        <input type="text" class="form-control" v-model="record.year">
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            record: {}
        }
    },
    created() {
        this.axios
            .get(`/api/record/edit/${this.$route.params.id}`)
            .then((response) => {
                this.record = response.data;
            });
    },
    methods: {
        updateBook() {
            this.axios
                .post(`/api/record/update/${this.$route.params.id}`, this.record)
                .then((response) => {
                    this.$router.push({name: 'home'});
                });
        }
    }
}
</script>
