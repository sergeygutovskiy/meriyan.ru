<template>
    <form class="card mb-4" @submit="send_form">
        <div class="card-body">
            <div class="mb-3">
                <vue-editor v-model="edited_description"></vue-editor>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">
                        Включено в стоимость
                    </span>
                    <select class="form-select" v-model="edited_is_in_price">
                        <option 
                            :value="false" 
                            :selected="!edited_is_in_price"
                            >
                            Нет
                        </option>
                        <option 
                            :value="true" 
                            :selected="edited_is_in_price"
                            >
                            Да
                        </option>  
                    </select>
                </div>
            </div>
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
                Услуга обновлена
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
        'description',
        'is_in_price',
    ],

    data() {
        return {
            messages: {
                updated: null,
            },

            edited_description: this.description,
            edited_is_in_price: this.is_in_price,

            endpoint_url: `/api/v1/tours/${this.tour_id}/services/${this.id}`,
            delete_endpoint_url: `/api/v1/tours/${this.tour_id}/services/${this.id}`,
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
                'description': this.edited_description,
                'is_in_price': this.edited_is_in_price
            }));

            this.reset_messages();

            try {
                let response = await axios.post(this.endpoint_url, form_data);
                
                this.messages.updated = true;

            } catch (error) { console.error(error); }
        },

        async remove() {
            this.reset_messages();

            try {
                let response = await axios.delete(this.delete_endpoint_url);
                this.$emit('deleted', this.id);

            } catch (error) { console.error(error); }
        },
    },
}
</script>