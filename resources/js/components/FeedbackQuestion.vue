<template>
    <section>
        <table class="table table-striped table-bordered" v-if="list">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Вопрос</th>
                    <th scope="col">Получено</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in list" :key="item.id">
                    <th scope="row">{{ list.indexOf(item) + 1 }}</th>
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.description }}</td>
                    <td>
                        {{ 
                            (new Date(item.created_at)).toLocaleDateString('ru-RU', { 
                                    weekday: 'long', 
                                    year: 'numeric', 
                                    month: 'long', 
                                    day: 'numeric'
                                }) 
                        }}
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
                let response = await axios.get("/feedback/questions");
                this.list = response.data;
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>