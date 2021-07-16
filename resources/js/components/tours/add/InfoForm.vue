<template>
    <form class="card mb-4" @submit="send_form">
        <div class="card-body">
            <div class="mb-3">
                <h3>Подробная информация</h3>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Полное описание</label>
                <vue-editor v-model="description"></vue-editor>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Длительность</label>
                <input type="number" :min="0" class="form-control" v-model="duration">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Кол-во людей</label>
                <input type="number" :min="0" class="form-control" v-model="people">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ссылка на youtube видео</label>
                <input type="text" class="form-control" v-model="video_href">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text">Сезон</label>
                <select v-model="season" class="form-select">
                    <option :value="null" selected>
                        Выберете сезон
                    </option>
                    <option 
                        v-for="season in seasons" 
                        :key="season.id" 
                        :value="season.id"
                        >
                        {{ season.name }}
                    </option>
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text">Сложность</label>
                <select v-model="complexity" class="form-select">
                    <option :value="null" selected>
                        Выберете сложность
                    </option>
                    <option 
                        v-for="complexity in complexities" 
                        :key="complexity.id" 
                        :value="complexity.id"
                        >
                        {{ complexity.name }}
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">PDF документ</label>
                <div class="input-group">
                    <select class="form-select" v-model="is_pdf_document">
                        <option 
                            :value="false" 
                            :selected="!is_pdf_document"
                            >
                            Нет
                        </option>
                        <option 
                            :value="true" 
                            :selected="is_pdf_document"
                            >
                            Есть
                        </option>
                    </select>
                    <input 
                        type="file"
                        class="form-control"
                        ref="pdf_document"
                        :disabled="!is_pdf_document"
                        @change="pdf_document_changed"
                        >
                </div>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Создать тур</button>
            </div>
            <div 
                v-if="messages.created" 
                class="alert alert-success mt-3 mb-0" 
                role="alert"
                >
                Подробная информация добавлена, тур создан.
                Теепрь можно 
                <router-link :to="{ name: 'edit_tour', params: { 'id': created_tour_id } }">
                    перейти в редактирование
                </router-link>
                , чтобы добавить категории, локации и услуги,
                либо обновить данные
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
        'created_tour_id'
    ],

    data() {
        return {
            messages: {
                created: null,
            },

            description: '',
            duration: 0,
            people: 0,
            video_href: '',

            is_pdf_document: false,
            pdf_document: null,

            season: null,
            complexity: null,

            endpoint_url: '/api/v1/tours/info',
            created_tour_info_id: null,

            seasons: [],
            seasons_endpoint_url: '/api/v1/seasons',

            complexities: [],
            complexities_endpoint_url: '/api/v1/complexities',
        }
    },

    watch: {
        is_pdf_document: function (val) {
            if (!val) {
                this.$refs.pdf_document.value = null;
                this.pdf_document = null;
            }
        }
    },

    created() {
        this.get_seasons();
        this.get_complexities();
    },

    methods: {
        pdf_document_changed() {
            this.pdf_document = this.$refs.pdf_document.files[0];
            console.log(this.pdf_document);
        },

        async send_form(e) {
            e.preventDefault();  
        
            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                tour_id: this.created_tour_id,
                description: this.description,
                duration: this.duration,
                people: this.people,
                video_href: this.video_href,
                season: this.season,
                complexity: this.complexity  
            }));
            form_data.append('pdf_document', this.pdf_document ? this.pdf_document : '');

            try {
                let response = await axios.post(this.endpoint_url, form_data);
                this.created_tour_info_id = response.data.data.id;
                
                this.messages.created = true;

            } catch (error) { console.error(error); }
        },

        async get_seasons() {
            try {
                let response = await axios.get(this.seasons_endpoint_url);
                this.seasons = response.data.data.seasons;

            } catch (error) { console.error(error); }
        },

        async get_complexities() {
            try {
                let response = await axios.get(this.complexities_endpoint_url);
                this.complexities = response.data.data.complexities;

            } catch (error) { console.error(error); }
        },
    },
}
</script>