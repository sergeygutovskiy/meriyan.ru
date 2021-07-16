<template>
    <form id="info-form" class="card mb-4" @submit="send_form">
        <div class="card-body">
            <div class="mb-3">
                <h3>Подробная информация</h3>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Полное описание</label>
                <vue-editor v-model="edited_description"></vue-editor>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Длительность</label>
                <input type="number" :min="0" class="form-control" v-model="edited_duration">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Кол-во людей</label>
                <input type="number" :min="0" class="form-control" v-model="edited_people">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ссылка на youtube видео</label>
                <input type="text" class="form-control" v-model="edited_video_href">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text">Сезон</label>
                <select v-model="edited_season" class="form-select">
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
                <select v-model="edited_complexity" class="form-select">
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
                <label for="" class="form-label">
                    PDF документ
                    <a
                        v-if="edited_is_pdf_document && pdf_document_path"
                        :href="`/images/storage/tours/${id}/${pdf_document_path}`" 
                        target="_blank" 
                        rel="noopener noreferrer">
                        (посмотреть текущий файл)
                    </a>
                </label>
                <div class="input-group">
                    <select class="form-select" v-model="edited_is_pdf_document">
                        <option 
                            :value="false" 
                            :selected="!edited_is_pdf_document"
                            >
                            Нет
                        </option>
                        <option 
                            :value="true" 
                            :selected="edited_is_pdf_document"
                            >
                            Есть
                        </option>
                    </select>
                    <input 
                        type="file"
                        class="form-control"
                        ref="pdf_document"
                        :disabled="!edited_is_pdf_document"
                        @change="pdf_document_changed"
                        >
                </div>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Обновить</button>
            </div>
            <div 
                v-if="messages.updated" 
                class="alert alert-success mt-3 mb-0" 
                role="alert"
                >
                Подробная информация обновлена
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
        'description',
        'people',
        'duration',
        'season',
        'complexity',
        'video_href',
        'pdf_document_path'
    ],

    data() {
        return {
            messages: {
                updated: null,
            },

            edited_description: this.description,
            edited_people: this.people,
            edited_duration: this.duration,
            edited_season: this.season,
            edited_complexity: this.complexity,
            edited_video_href: this.video_href,

            edited_is_pdf_document: !!this.pdf_document_path,
            new_pdf_document: null,

            seasons: [],
            seasons_endpoint_url: '/api/v1/seasons',

            complexities: [],
            complexities_endpoint_url: '/api/v1/complexities',

            endpoint_url: `/api/v1/tours/${this.id}/info`,
        }
    },

    watch: {
        edited_is_pdf_document: function (val) {
            if (!val) {
                this.$refs.pdf_document.value = null;
                this.new_pdf_document = null;
            }
        },
    },

    created() {
        this.get_seasons();
        this.get_complexities();
    },

    methods: {
        reset_messages() {
            this.messages.updated = null;
        },

        pdf_document_changed() {
            this.new_pdf_document = this.$refs.pdf_document.files[0];
        },

        async send_form(e) {
            e.preventDefault();  
        
            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                description: this.edited_description,
                duration: this.edited_duration,
                people: this.edited_people,
                video_href: this.edited_video_href,
                season: this.edited_season,
                complexity: this.edited_complexity,
                is_pdf_document: this.edited_is_pdf_document, 
            }));
            form_data.append('new_pdf_document', this.new_pdf_document ? this.new_pdf_document : '');

            this.reset_messages();

            try {
                let response = await axios.post(this.endpoint_url, form_data);
                this.messages.updated = true;

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