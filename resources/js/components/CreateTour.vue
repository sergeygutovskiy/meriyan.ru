<template>
    <section>
        <form class="card mb-5" @submit="on_form_submited">
            <div class="card-body">
                <h2 class="mb-3">Создать тур</h2>
                
                <input type="hidden" name="_token" :value="csrf">
                
                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input class="form-control" type="text" name="title" placeholder="Заголовок" v-model="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">Описание</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="6" placeholder="Описание" v-model="description"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Цена</label>
                    <input class="form-control" type="number" name="price" placeholder="Цена" v-model="price">
                </div>
                <div class="mb-3">
                    <label class="form-label">Цена по скидке</label>
                    <input class="form-control" type="number" name="discount_price" placeholder="Цена по скидке" v-model="discount_price">
                </div>
                <div class="mb-3">
                    <label class="form-label">Карточка</label>
                    <input class="form-control" type="file" name="image" 
                        ref="card_image" 
                        v-on:change="on_card_image_changed()"
                        >
                </div>
                <div v-if="card_image_path" class="mb-3">
                    <img :src="card_image_path">
                </div>
                <div>
                    <button class="btn btn-success" type="submit">Создать тур</button>
                </div>
            </div>
        </form>
        <create-tour-locations />
    </section>
</template>

<script>
    import CreateTourLocations from './CreateTourLocations.vue';

    export default {
        components: {
            CreateTourLocations
        },

        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                
                title: null,
                description: null,
                price: null,
                discount_price: null,

                card_image: null,
                card_image_path: null,

                create_tour_endpoint_url: '/api/tours'
            }   
        },

        methods: {
            on_card_image_changed() {
                this.card_image = this.$refs.card_image.files[0];
                this.card_image_path = URL.createObjectURL(this.card_image);
            },
            
            on_form_submited(event) {
                let form_data = new FormData();

                form_data.append('_token', this.csrf);
                form_data.append('title', this.title);
                form_data.append('description', this.description);
                form_data.append('price', this.price);
                form_data.append('discount_price', this.discount_price);
                form_data.append('card_image', this.card_image);
                
                axios.post(this.create_tour_endpoint_url, form_data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                })
                ;

                event.preventDefault();
            }
        }
    }
</script>

<style scoped>
    img {
        max-width: 600px;
        object-fit: contain;
    }
</style>