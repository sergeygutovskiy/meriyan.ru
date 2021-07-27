<template>
    <section class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="mb-0">Редактировать тур</h1>
                </div>
            </div>
        </div>

        <div class="col-8">
            <main-form 
                v-if="tour"
                :id="tour.id"
                :title="tour.title"
                :description="tour.description"
                :image_path="tour.image_path"
                :card_image_path="tour.card_image_path"
                :price="tour.price"
                :discount_price="tour.discount_price"
                />
            
            <info-form 
                v-if="tour"
                :id="tour.id"
                :description="info.description"
                :people="info.people_amount"
                :duration="info.duration"
                :season="info.season_id"
                :complexity="info.complexity_id"
                :video_href="info.video_path"
                :pdf_document_path="info.document_path"
            />

            <tags-form 
                v-if="tour"
                :id="tour.id"
            />

            <locations-form 
                v-if="tour"
                :id="tour.id"
            />

            <services-form 
                v-if="tour"
                :id="tour.id"
            />

            <div class="text-center" v-if="!tour">
                <div class="spinner-border text-success" role="status"></div>
            </div>
        </div>
        <div class="col-4">
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="#main-form">
                    Основная информация
                </a>
                <a class="list-group-item list-group-item-action" href="#info-form">
                    Подробная информация
                </a>
                <a class="list-group-item list-group-item-action" href="#tags-form">
                    Категории
                </a>
                <a class="list-group-item list-group-item-action" href="#locations-form">
                    Локации
                </a>
                <a class="list-group-item list-group-item-action" href="#services-form">
                    Услуги
                </a>
            </div>
        </div>
    </section>
</template>

<script>
import MainForm from './MainForm';
import InfoForm from './InfoForm';
import TagsForm from './TagsForm';
import LocationsForm from './LocationsForm';
import ServvicesForm from './ServicesForm';

export default {
    components: {
        'main-form': MainForm,
        'info-form': InfoForm,
        'tags-form': TagsForm,
        'locations-form': LocationsForm,
        'services-form': ServvicesForm,
    },

    props: [
        'id'
    ],

    data() {
        return {
            tour: null,
            info: null,

            tour_endpoint_url: '/api/v1/tours/' + this.id
        }
    },

    created() {
        this.get_tour_with_info();
    },

    methods: {
        async get_tour_with_info() {
            try {
                let response = await axios.get(this.tour_endpoint_url);
                this.tour = response.data.data.tour;
                this.info = response.data.data.info;

            } catch (error) { console.error(error); }
        },
    },
}
</script>