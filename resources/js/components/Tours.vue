<template>
    <section>
        <h1 class="mb-3">Туры</h1>
        
        <div class="mb-4">
            <router-link :to="{ name: 'add_tour' }">
                добавить
            </router-link>
        </div>
        
        <div class="row row-cols-3">
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
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            tours: []
        }
    },

    created() {
        this.get_tours();
    },

    methods: {
        async get_tours() {
            try {
                let response = await axios.get("/api/tours");
                this.tours = response.data;
                console.log(this.tours);
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>