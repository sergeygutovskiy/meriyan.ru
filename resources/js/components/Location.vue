<template>
    <form class="card mb-4" @submit="send_form">
        <img 
            v-if="!new_image"
            :src="`/images/storage/tours/${this.tour_id}/locations/${image_path}`" 
            class="card-img-top"
            style="max-height: 320px; object-fit: cover"
            >
        <img
            v-if="new_image" 
            :src="new_image_path"
            class="card-img-top"
            style="max-height: 320px; object-fit: cover"
            >
        <div class="card-body">
            <p>
                <input 
                    class="form-control" 
                    type="file" 
                    @change="new_image_changed" 
                    :ref="'new_image_file'"
                    >
            </p>
            <p class="card-text">
                <input type="text" class="form-control mb-3" v-model="edited_name">
                <vue-editor v-model="edited_description"></vue-editor>
            </p>
            <div class="d-flex justify-content-between">
                <button class="btn btn-success" type="submit">
                    Обновить
                </button>
                <button 
                    class="btn btn-outline-danger" 
                    type="button"
                    @click="remove"
                    >
                    Удалить
                </button>
            </div>
            <div 
                v-if="messages.updated" 
                class="alert alert-success mt-3 mb-0" 
                role="alert"
                >
                Локация обновлена
            </div>
        </div>
    </form>
</template>

<script>
import { VueEditor } from 'vue2-editor';

export default {
    components: {
        VueEditor
    },

    props: [
        'id',
        'tour_id',
        'name',
        'description',
        'image_path',
    ],

    data() {
        return {
            messages: {
                updated: null,
            },

            edited_name: this.name,
            edited_description: this.description,
            new_image: null,

            endpoint_url: `/api/v1/tours/${this.tour_id}/locations/${this.id}`,
            delete_endpoint_url: `/api/v1/tours/${this.tour_id}/locations/${this.id}`,
        }
    },

    methods: {
        reset_messages() {
            this.messages.updated = null;
        },

        async send_form(e) {
            e.preventDefault();

            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                'name': this.edited_name,
                'description': this.edited_description
            }));
            form_data.append('new_image', this.new_image ? this.new_image : '');

            this.reset_messages();

            try {
                let response = await axios.post(this.endpoint_url, form_data);

                this.messages.updated = true;

            } catch (error) { console.error(error); }
        },

        new_image_changed() {
            this.new_image = this.$refs.new_image_file.files[0];
            this.new_image_path = URL.createObjectURL(this.new_image);
        },

        async remove() {
            this.reset_messages();

            try {
                let response = await axios.delete(this.delete_endpoint_url);
                this.$emit('deleted', this.id);

            } catch (error) { console.error(error); }
        }
    },
}
</script>