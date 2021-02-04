<template>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Размер</th>
                <th>Год</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="record in recordsData" :key="record.id">
                <td>{{ record.id }}</td>
                <td>{{ record.name }}</td>
                <td>{{ record.size }}"</td>
                <td>{{ record.year }}</td>
                <td>
                    <router-link :to="{name: 'edit', params: { id: record.id }}" class="btn btn-primary mr-2">
                        Редактировать
                    </router-link>
                    <button class="btn btn-danger" @click="deleteRecord(record.id)">Удалить</button>
                </td>
            </tr>
            </tbody>
        </table>
        <button class="btn btn-outline-primary" :disabled="pageNumber === 0" @click="prevPage">
            Назад
        </button>
        <button class="btn btn-outline-primary" :disabled="pageNumber >= pageCount -1" @click="nextPage">
            Вперёд
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            records: [],
            pageNumber: 0
        }
    },
    created() {
        this.axios
            .get('/api/records')
            .then(response => {
                this.records = response.data;
            });
    },
    props: {
        size: {
            type: Number,
            required: false,
            default: 10
        }
    },
    methods: {
        deleteRecord(id) {
            this.axios
                .delete(`/api/record/delete/${id}`)
                .then(response => {
                    this.$router.go(0);
                });
        },
        nextPage() {
            this.pageNumber++;
        },
        prevPage() {
            this.pageNumber--;
        }
    },
    computed: {
        pageCount() {
            let l = this.records.length,
                s = this.size;
            return Math.ceil(l / s);
        },
        recordsData() {
            const start = this.pageNumber * this.size,
                end = start + this.size;
            return this.records
                .slice(start, end);
        }
    }
}
</script>
