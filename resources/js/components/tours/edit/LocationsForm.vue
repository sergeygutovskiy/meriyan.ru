<template>
    <section id="locations-form" class="card mb-4">
        <div class="card-body">
            <div class="mb-3">
                <h3>Локации</h3>
            </div>

            <form class="card mb-4" @submit="send_form">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Название</label>
                        <input type="text" class="form-control" v-model="new_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <vue-editor v-model="new_description"></vue-editor>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Картинка</label>
                        <img
                            v-if="new_image"
                            :src="new_image_path"
                            class="card-img-top mb-3"
                            style="max-height: 320px; object-fit: cover;"
                            >
                        <input 
                            class="form-control" 
                            type="file" 
                            @change="new_image_changed" 
                            :ref="'new_image_file'"
                            >
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">
                            Добавить
                        </button>
                    </div>
                    <div 
                        v-if="messages.created" 
                        class="alert alert-success mt-3 mb-0" 
                        role="alert"
                        >
                        Локация создана
                    </div>
                </div>
            </form>

            <location 
                v-for="location in locations"
                :key="location.id"
                v-on:deleted="on_deleted"
                :id="location.id"
                :tour_id="id"
                :name="location.name"
                :description="location.description"
                :image_path="location.image_path"   
            />

            <div 
                v-if="messages.deleted" 
                class="alert alert-success mt-3 mb-0" 
                role="alert"
                >
                Локация удалена
            </div>
        </div>
    </section>
</template>

<script>
import Location from '../../Location';
import { VueEditor } from 'vue2-editor';

export default {
    components: {
        VueEditor,
        Location,
    },

    props: [
        'id'
    ],

    data() {
        return {
            messages: {
                created: null,
                deleted: null,
            },

            new_name: '',
            new_description: '',
            new_image: null,
            new_image_path: '',

            locations: [],
            locations_endpoint_url: `/api/v1/tours/${this.id}/locations`,

            endpoint_url: `/api/v1/tours/${this.id}/locations`,
        }
    },

    created() {
        this.get_locations();
    },

    methods: {
        reset_messages() {
            this.messages.created = null;
            this.messages.deleted = null;
        },

        on_deleted(id) {
            this.locations = this.locations.filter(l => {
                return l.id != id;
            });

            this.reset_messages();

            this.messages.deleted = true;
        },

        async send_form(e) {
            e.preventDefault();

            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                'name': this.new_name,
                'description': this.new_description
            }));
            form_data.append('new_image', this.new_image ? this.new_image : '');

            this.reset_messages();

            try {
                let response = await axios.post(this.endpoint_url, form_data);
                this.locations.push(response.data.data.location);

                this.messages.created = true;

            } catch (error) { console.error(error); }
        },

        new_image_changed() {
            this.new_image = this.$refs.new_image_file.files[0];
            this.new_image_path = URL.createObjectURL(this.new_image);
        },

        async get_locations() {
            try {
                let response = await axios.get(this.locations_endpoint_url);
                this.locations = response.data.data.locations;

            } catch (error) { console.error(error); }
        },
    },
}
</script>