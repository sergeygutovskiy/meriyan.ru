<template>
    <section id="services-form" class="mb-4">
        <div class="card mb-4">
            <div class="card-body">
                <div>
                    <h3 class="mb-0">Услуги</h3>
                </div>
            </div>
        </div>

        <form class="card mb-4" @submit="send_form">
            <div class="card-body">
                <div class="mb-3">
                    <h4 class="mb-0">Добавить</h4>
                </div>
                <div class="mb-3">
                    <vue-editor v-model="new_description"></vue-editor>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            Включено в стоимость
                        </span>
                        <select class="form-select" v-model="new_is_in_price">
                            <option 
                                :value="false" 
                                :selected="!new_is_in_price"
                                >
                                Нет
                            </option>
                            <option 
                                :value="true" 
                                :selected="new_is_in_price"
                                >
                                Да
                            </option>  
                        </select>
                    </div>
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
                    Услуга создана
                </div>
                <div 
                    v-else-if="messages.created == false" 
                    class="alert alert-danger mt-3 mb-0" 
                    role="alert"
                    >
                    Не все поля заполнены
                </div>
            </div>
        </form>

        <div class="card mb-4">
            <div class="card-body">
                <div>
                    <h4 class="mb-0">Список</h4>
                </div>
            </div>
        </div>

        <service 
            v-for="service in services"
            :key="service.id" 
            v-on:deleted="on_deleted"
            :id="service.id"
            :tour_id="id"
            :description="service.description"
            :is_in_price="!!service.is_included_in_price"
            />

        <div 
            v-if="messages.deleted" 
            class="alert alert-success mt-3 mb-0" 
            role="alert"
            >
            Услуга удалена
        </div>
    </section>
</template>

<script>
import Service from '../../Service'; 
import { VueEditor } from 'vue2-editor';

export default {
    props: [
        'id'
    ],

    components: {
        Service,
        VueEditor,
    },

    data() {
        return {
            messages: {
                created: null,
                deleted: null,
            },
            
            services: [],

            new_description: '',
            new_is_in_price: true,

            services_endpoint_url: `/api/v1/tours/${this.id}/services`,
            endpoint_url: `/api/v1/tours/${this.id}/services`,
        }
    },

    created() {
        this.get_services();
    },

    methods: {
        reset_messages() {
            this.messages.created = null;
            this.messages.deleted = null;
        },

        on_deleted(id) {
            this.services = this.services.filter(s => {
                return s.id != id;
            });

            this.reset_messages();

            this.messages.deleted = true;
        },

        validate() {
            return (
                this.new_description.length > 0
            );
        },

        async send_form(e) {
            e.preventDefault();

            if ( !this.validate() ) {
                this.messages.created = false;
                return;
            }

            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                'description': this.new_description,
                'is_in_price': this.new_is_in_price
            }));

            this.reset_messages();

            try {
                let response = await axios.post(this.endpoint_url, form_data);
                this.services.push(response.data.data.service);

                this.messages.created = true;

            } catch (error) { console.error(error); }
        },

        async get_services() {
            try {
                let response = await axios.get(this.services_endpoint_url);
                this.services = response.data.data.services;

            } catch (error) { console.error(error); }
        },
    },
}
</script>