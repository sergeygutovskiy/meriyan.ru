<template>
    <section>
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Туры</h1>

                <router-link class="btn btn-success" :to="{ name: 'add_tour' }">
                    добавить
                </router-link>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <table class="table table-striped" v-if="!loading">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Картинка</th>
                            <th scope="col">Стоиомсть</th>
                            <th scope="col">Скидка</th>
                            <th scope="col">Добавлен</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="tour in tours" :key="tour.id">
                            <th scope="row">{{ tours.indexOf(tour) + 1 }}</th>
                            <td>
                                <a :href="'/tours/' + tour.id" target='_blank'>
                                    {{ tour.title }}
                                </a>
                            </td>
                            <td>
                                <img class="img-fluid"
                                    width="100"
                                    height="30"
                                    :src="'/images/storage/tours/' + tour.id + '/' + tour.image_path"
                                    >
                            </td>
                            <td>{{ tour.price + ' ₽' }}</td>
                            <td>{{ tour.discount_price ? tour.discount_price + ' ₽' : 'нет' }}</td>
                            <td>
                                {{ 
                                    tour.created_at ? 
                                        get_formated_date(tour.created_at)
                                        : 
                                        'нет' 
                                }}
                            </td>
                            <td>
                                <router-link
                                    target='_blank' 
                                    :to="{ 
                                        name: 'edit_tour', 
                                        params: { 'id': tour.id } 
                                    }" 
                                    class="card-link text-warning"
                                    >
                                    редактировать
                                </router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center" v-else>
                    <div class="spinner-border text-success" role="status"></div>
                </div>
            </div>
        </div>

        <!-- <div class="row row-cols-3">
            <div class="col mb-4" v-for="tour in tours" :key="tour.id">
                <div class="card">
                    <img class="card-img-top"
                        :src="'/images/storage/tours/' + tour.id + '/' + tour.image_path"
                        >
                    <div class="card-body">
                        <a class="card-title" :href="'/tours/' + tour.id">
                            {{ tour.title }}
                        </a>
                    </div>
                    <div class="card-body">
                        <router-link :to="{ name: 'edit_tour', params: { 'id': tour.id } }" class="card-link text-warning">
                            Редактировать
                        </router-link>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
</template>

<script>
export default {
    data() {
        return {
            tours: [],

            loading: true,
        }
    },

    created() {
        this.get_tours();
    },

    methods: {
        get_formated_date(date_text) {
            const date = new Date(date_text);
            const current_date = new Date();

            if (date.toDateString() === current_date.toDateString())
                return 'сегодня'

            return (new Date(date)).toLocaleDateString('ru-RU', {
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric'
            });
        },

        async get_tours() {
            try {
                let response = await axios.get("/api/v1/tours");
                this.tours = response.data.sort((a, b) => {
                    if (!a.created_at && b.created_at) return 1;
                    else if (a.created_at && !b.created_at) return -1;
                    else if (!a.created_at && !b.created_at) return 0;
                    else return new Date(b.created_at) - new Date(a.created_at);
                });

                this.loading = false;

            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>