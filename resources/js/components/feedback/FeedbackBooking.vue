<template>
    <section>
        <table class="table table-striped table-bordered" v-if="list">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Тур</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Получено</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in list" :key="item.id">
                    <th scope="row">{{ list.indexOf(item) + 1 }}</th>
                    <td>{{ item.tour.title }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.phone }}</td>
                    <td>
                        {{ (new Date(item.created_at)).toLocaleDateString('ru-RU') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>

<script>
export default {
    data() {
        return {
            list: null
        }
    },
    
    created() {
        this.get_methods();
    },

    methods: {
        async get_methods() {
            try {
                let response = await axios.get("/feedback/booking");
                this.list = response.data;
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>