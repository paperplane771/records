<template>
    <div>
        <h4 class="text-center">Добавить пластинку</h4>
        <div class="row">
            <div class="col">
                <form @submit.prevent="addRecord">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" v-model="record.name">
                    </div>
                    <div class="form-group">
                        <label>Год</label>
                        <input type="text" class="form-control" v-model="record.year">
                    </div>
                    <div class="form-group">
                        <label>Размер</label>
                        <input type="text" class="form-control" v-model="record.size">
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить пластинку</button>
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
    methods: {
        addRecord() {
            this.axios
                .post('/api/record/add', this.record)
                .then(response => (
                    this.$router.push({name: 'home'})
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        }
    }
}
</script>
